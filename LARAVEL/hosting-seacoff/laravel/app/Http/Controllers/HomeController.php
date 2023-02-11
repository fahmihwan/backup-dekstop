<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailOrders as ResourcesDetailOrders;
use App\Mail\SendNotaCustomer;
use App\Models\DetailOrders;
use App\Models\Event;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Symfony\Component\ErrorHandler\Debug;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function event()
    {
        $events = Event::all();
        return view('event', [
            'events' => $events
        ]);
    }

    // public function myorderrr()
    // {
    //     if (Session::has('token')) {
    //         $meja = Meja::where('qrcode', Session::get('token'));
    //         if ($meja->count() != 0) {
    //             $data = $meja->select(['id', 'qrcode', 'nama'])->first();
    //             $status = 1;
    //         }
    //     } else {
    //         $data = 'silahkan scan QRcode di meja anda';
    //         $status = 0;
    //     }

    //     return view('myorder', [
    //         'status' => $status,
    //         'data' => $data
    //     ]);
    // }


    // public function myOrder()
    // {

    //     if (Session::has('token')) {
    //         $meja = Meja::where('qrcode', Session::get('token'));
    //         if ($meja->count() != 0) {
    //             $data = $meja->select(['id', 'qrcode', 'nama'])->first();
    //             $status = 1;
    //         }

    //         $selectDetailOrders = [
    //             'detail_orders.nota as nota',
    //             'detail_orders.nama as nama',
    //             'menus.nama as menu',
    //             'menus.kategori as kategori',
    //             'menus.gambar as gambar',
    //         ];
    //         $detailOrder = DetailOrders::select($selectDetailOrders)
    //             ->join('orders', 'orders.detail_orders_id', '=', 'detail_orders.id')
    //             ->join('mejas', 'mejas.id', '=', 'detail_orders.meja_id')
    //             ->join('menus', 'menus.id', '=', 'orders.menu_id')
    //             ->where('mejas.qrcode', '=', $meja->first()->qrcode)
    //             ->where('detail_orders.updated_at', '>', Carbon::now()->subMinutes(160)->toDateTimeString())
    //             ->whereDate('detail_orders.created_at', date('Y-m-d'))
    //             ->where('detail_orders.created_at', '>', Carbon::now()->subMinutes(160)->toDateTimeString())
    //             ->get();

    //         return view('myorder', [
    //             'detail_menu' => $detailOrder,
    //             'status' => $status,
    //             'data' => $data
    //         ]);
    //     } else {
    //         $data = 'silahkan scan QRcode di meja anda';
    //         $status = 0;
    //     }

    //     return view('myorder', [
    //         'status' => $status,
    //         'data' => $data
    //     ]);
    // }

    public function myOrder()
    {
        if (Session::has('token')) {
            $meja = Meja::where('qrcode', Session::get('token'));
            if ($meja->count() != 0) {
                $data = $meja->select(['id', 'qrcode', 'nama'])->first();
                $status = 1;
            }

            $detailOrder = DetailOrders::with('orders')
                ->where('meja_id', $meja->first()->id)
                ->where('updated_at', '>', Carbon::now()->subMinutes(60)->toDateTimeString())
                ->whereDate('created_at', date('Y-m-d'))
                ->where('created_at', '>', Carbon::now()->subMinutes(60)->toDateTimeString())
                ->get();

            return view('myorder', [
                'detail_menu' => $detailOrder,
                'status' => $status,
                'data' => $data
            ]);
        } else {
            $data = 'silahkan scan QRcode di meja anda';
            $status = 0;
        }

        return view('myorder', [
            'status' => $status,
            'data' => $data
        ]);
    }



    public function list_notification()
    {

        if (Session::has('token')) {

            $meja = Meja::where('qrcode', Session::get('token'));
            if ($meja->count() != 0) {

                $selectDetailOrders = [
                    'detail_orders.nama as nama',
                    'status_pemesanan',
                    'detail_orders.updated_at'
                ];
                $detailOrder = DetailOrders::select($selectDetailOrders)
                    ->join('mejas', 'mejas.id', '=', 'detail_orders.meja_id')
                    ->where('mejas.qrcode', '=', $meja->first()->qrcode)
                    ->where('detail_orders.updated_at', '>', Carbon::now()->subMinutes(60)->toDateTimeString())
                    ->whereDate('detail_orders.created_at', date('Y-m-d'))
                    ->where('detail_orders.created_at', '>', Carbon::now()->subMinutes(60)->toDateTimeString())
                    ->groupBy('detail_orders.id')
                    ->latest('detail_orders.id')
                    ->get();


                return response()->json([
                    'detailOrders' => $detailOrder,
                ]);
            }
        } else {
            abort(404);
        }
    }

    public function qrcode()
    {
        return view('scanQr');
    }

    public function scan(Request $request)
    {
        Session::put('token', $request->qrcode);
        return redirect()->to('/menu');
    }

    public function pindah_meja(Request $request)
    {
        if ($request->qrcode && Session::has('token')) {
            Session::forget('token');
            Session::flush();
            return redirect()->to('/home/my-order');
        }
        return redirect()->to('/home/my-order');
    }
}
