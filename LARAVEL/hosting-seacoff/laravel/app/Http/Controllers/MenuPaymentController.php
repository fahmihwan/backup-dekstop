<?php

namespace App\Http\Controllers;

use App\Mail\SendNotaCustomer;
use App\Models\DetailOrders;
use App\Models\Meja;
use App\Models\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class MenuPaymentController extends Controller
{
    public function index()
    {
        return view('cart', [
            'meja' => Session::get('meja')->nama
        ]);
    }

    public function payment(Request $request)
    {

        // $json_name = json_decode($request->json_name, true);
        // dd($json_name);

        $json_menu = json_decode($request->json_menu, true);


        $last_array = end($json_menu);

        $total_harga  = $last_array['total_harga'];
        $ppn  = $last_array['ppn'];
        $gross_amount  = $last_array['gross_amount'];


        array_pop($json_menu);



        // dd($json_menu);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $gross_amount,
            ),
            "item_details" => $json_menu,
            "enabled_payments" => [
                "gopay",
                "shopeepay",
                "permata_va",
                "bca_va",
                "bni_va",
                "bri_va",
                "danamon_online",
                "mandiri_clickpay",
                "bca_klikbca",
                "bca_klikpay",
                "bri_epay",
                "akulaku"
            ],
            'customer_details' => array(
                'first_name' => $request->json_name,
                'email' => $request->json_email,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('midtrans', [
            'snapToken' => $snapToken,
            'nameOrder' => $request->json_name,
            'emailOrder' => $request->json_email,
            'ppn' => $ppn,
            'total_harga' => $total_harga
        ]);
    }

    public function payment_post(Request $request)
    {
        $menuJson = json_decode($request->menu_json, true);
        $midtransJson = json_decode($request->data_json, true);
        $meja_id = Session::get('meja')->id;

        DB::beginTransaction();
        try {

            $notaDB = DetailOrders::select('nota')->latest()->first();
            if ($notaDB == null) {
                $nota = 'SC' . date('m') . '-' . date('Y') . '0001' . date('d') . 'E';
            } elseif (substr($notaDB->nota, 2, 2) != date('m')) {
                $nota = 'SC' . date('m') . '-' . date('Y') . '0001' . date('d') . 'E';
            } else {
                $cut =  substr($notaDB->nota, 10, -3);
                $number = str_pad($cut + 1, 4, "0", STR_PAD_LEFT);;
                $nota = 'SC' . date('m') . '-' . date('Y') . $number . date('d') . 'E';
            }

            $detailOrder =  DetailOrders::create([
                'kasir' => 'customer',
                'email' => $request->email_order_json,
                'nota' => $nota,
                'nama' => $request->name_order_json,
                'meja_id' => $meja_id,
                'status_pemesanan' => 'order',
                'status_pembayaran' => $midtransJson['transaction_status'],
                'id_transaksi' => $midtransJson['transaction_id'],
                'tipe_pembayaran' => $midtransJson['payment_type'],
                'id_pemesanan' => $midtransJson['order_id'],
                'kode_pembayaran' => isset($midtransJson['payment_code']) ? $midtransJson['payment_code'] : null,
                'pdf_url' =>  isset($midtransJson['pdf_url']) ? $midtransJson['pdf_url'] : null,
                'total_bayar' => $midtransJson['gross_amount'],
                'ppn' => $request->ppn,
                'total_harga' => $request->total_harga,
            ]);

            foreach ($menuJson as $menu) {
                Order::create([
                    'detail_orders_id' => $detailOrder->id,
                    'menu_id' => $menu['id'],
                    'meja_id' => $meja_id,
                    'qty' => $menu['quantity'],
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }


        // handle nota
        $lastDetailOrder = DetailOrders::select([
            'mejas.nama as nama_mejas',
            'detail_orders.id',
            'detail_orders.nota',
            'detail_orders.nama',
            'detail_orders.tipe_pembayaran',
            'detail_orders.total_harga',
            'detail_orders.ppn',
            'detail_orders.total_bayar',
            'detail_orders.uang_tunai',
            'detail_orders.kembalian',
            'detail_orders.created_at',
        ])->join('mejas', 'mejas.id', '=', 'detail_orders.meja_id')
            ->where('detail_orders.nota', $nota)
            ->first();

        $order = Order::select('*')
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->where('detail_orders_id', $lastDetailOrder->id)->get();

        $data = [
            'detail_order' => $lastDetailOrder,
            'orders' => $order
        ];

        Mail::to($request->email_order_json)->send(new SendNotaCustomer($data));
        return redirect()->to('/home/my-order');
    }
}
