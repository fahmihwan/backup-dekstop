<?php

namespace App\Http\Controllers;

use App\Models\DetailOrders;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class DashboardPenjualanController extends Controller
{

    public function index()
    {
        return view('admin.pages.penjualan.index', [
            'all_menu' => Menu::latest()->get(),
            'kategori_meja' => Meja::all(),
        ]);
    }

    public function get_penjualan()
    {
        return Menu::latest()->get();
    }

    public function store(Request $request)
    {
        $cart = json_decode($request->cart, true);
        $total = json_decode($request->total, true);

        $kembalian = json_decode($request->kembalian, true);
        DB::beginTransaction();
        try {

            $notaDB = DetailOrders::select('nota')->latest()->first();
            if ($notaDB == null) {
                $nota = 'SC' . date('m') . '-' . date('Y') . '0001' . date('d') . 'C';
            } elseif (substr($notaDB->nota, 2, 2) != date('m')) {
                $nota = 'SC' . date('m') . '-' . date('Y') . '0001' . date('d') . 'C';
            } else {
                $cut =  substr($notaDB->nota, 10, -3);
                $number = str_pad($cut + 1, 4, "0", STR_PAD_LEFT);;
                $nota = 'SC' . date('m') . '-' . date('Y') . $number . date('d') . 'C';
            }

            $detailOrder =  DetailOrders::create([
                'kasir' => auth()->user()->nama,
                'nama' => $request->nama,
                'nota' => $nota,
                'meja_id' => 1,
                'status_pemesanan' => 'order',
                'status_pembayaran' => 'success',
                'id_transaksi' => 0,
                'tipe_pembayaran' => 'cash',
                'id_pemesanan' => 0,
                'kode_pembayaran' =>  null,
                'pdf_url' =>   null,
                'ppn' => $total['hargaPPn'],
                'total_harga' => $total['harga'],
                'total_bayar' => $total['totalBayar'],
                'uang_tunai' => $kembalian['uangTunai'],
                'kembalian' => $kembalian['kembalian'],
            ]);

            foreach ($cart as $menu) {
                Order::create([
                    'detail_orders_id' => $detailOrder->id,
                    'menu_id' => $menu['id'],
                    'meja_id' => 1,
                    'qty' => $menu['qty'],
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        $lastDetailOrder = DetailOrders::select([
            'mejas.nama as nama_mejas',
            'detail_orders.id',
            'detail_orders.tipe_pembayaran',
            'detail_orders.nota',
            'detail_orders.nama',
            'detail_orders.total_harga',
            'detail_orders.ppn',
            'detail_orders.total_bayar',
            'detail_orders.uang_tunai',
            'detail_orders.kembalian',
            'detail_orders.created_at',
        ])
            ->join('mejas', 'mejas.id', '=', 'detail_orders.meja_id')
            ->where('detail_orders.id', $detailOrder->id)
            ->first();

        $order = Order::select('*')
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->where('detail_orders_id', $lastDetailOrder->id)->get();

        $data = [
            'detail_order' => $lastDetailOrder,
            'orders' => $order
        ];

        $pdf = PDF::loadView('admin.pages.printPdf.nota', $data);

        return $pdf->download('invoice seacoff.pdf');


        // return redirect()->to('/admin/penjualan');
    }


    public function get_category($category)
    {
        if ($category == 'all') {
            return Menu::all();
        }
        return Menu::where('kategori', $category)->get();
    }
}
