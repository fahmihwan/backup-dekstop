<?php

namespace App\Http\Controllers;

use App\Http\Resources\DashboardDetailOrders;
use App\Http\Resources\DetailOrders as ResourcesDetailOrders;
use App\Models\DetailOrders;
use App\Models\Order;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard.index', [
            'current_date' => date('Y-m-d'),
        ]);
    }

    public function listOrder()
    {

        $Order =  DetailOrders::whereDate('created_at', date('Y-m-d'))->count();
        $transaksi = DetailOrders::select('total_bayar')->whereDate('created_at', date('Y-m-d'))->sum('total_bayar');

        $quary = "
        detail_orders.nota,
        detail_orders.id,
        detail_orders.nama AS nama,
        mejas.nama AS meja,
        sum(orders.qty) AS qty,
        status_pemesanan,
        status_pembayaran,
        tipe_pembayaran,
        detail_orders.created_at
        ";


        $detailOrder = DetailOrders::selectRaw($quary)
            ->join('orders', 'orders.detail_orders_id', '=', 'detail_orders.id')
            ->join('mejas', 'detail_orders.meja_id', '=', 'mejas.id')
            ->whereDate('detail_orders.created_at', date('Y-m-d'))
            ->groupBy('detail_orders.id')
            ->latest('id')
            ->get();

        return response()->json([
            'listOrder' => DashboardDetailOrders::collection($detailOrder),
            'jml_order' => $Order,
            'jml_transaksi' => "Rp " . number_format($transaksi, 0, ',', '.'),
        ]);
    }

    public function showModal($id)
    {
        $detailOrder = DetailOrders::select(['detail_orders.meja_id', 'detail_orders.id', 'status_pemesanan', 'menus.nama AS nama', 'kategori', 'qty'])
            ->join('orders', 'detail_orders.id', '=', 'orders.detail_orders_id')
            ->join('menus', 'orders.menu_id', '=', 'menus.id')
            ->where('detail_orders.id', $id)
            ->get();
        return $detailOrder;
    }

    public function updateOrder(Request $request)
    {
        DetailOrders::where('id', $request->id)->update(['status_pemesanan' => $request->status]);
    }
}
