<?php

namespace App\Http\Controllers;

use App\Models\DetailOrders;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this->model = new DetailOrders();
    }


    public function laporan_date(Request $request)
    {
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            'uang_tunai',
            'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];
        $detailOrders = $this->model->laporanDate($select, $request->date, 'all');
        $data = [
            'title' => 'Laporan Penjualan ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];
        //

        // return view('admin.pages.printPdf.laporan', $data);
        $pdf = PDF::loadView('admin.pages.printPdf.laporan', $data);

        return $pdf->download('seacoff.pdf');
    }

    public function laporan_month(Request $request)
    {

        $date = explode('-', $request->month);
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            'uang_tunai',
            'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];

        $detailOrders = $this->model->laporanMonth($select, $date, 'all');
        $data = [
            'title' => 'Laporan Penjualan Bulanan ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];

        $pdf = PDF::loadView('admin.pages.printPdf.laporan', $data);

        return $pdf->download('seacoff.pdf');
        // return view('admin.pages.printPdf.laporan', $data);
    }

    public function laporan_eMoney_date(Request $request)
    {
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            // 'uang_tunai',
            // 'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];

        $detailOrders = $this->model->laporanDate($select, $request->date, 'e-money');
        $data = [
            'title' => 'Laporan e-money ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];



        return view('admin.pages.printPdf.laporan', $data);
    }
    public function laporan_eMoney_month(Request $request)
    {
        $date = explode('-', $request->month);
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            'uang_tunai',
            'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];

        $detailOrders = $this->model->laporanMonth($select, $date, 'e-money');
        $data = [
            'title' => 'Laporan e-money ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];

        $pdf = PDF::loadView('admin.pages.printPdf.laporan', $data);

        return $pdf->download('seacoff.pdf');
        // return view('admin.pages.printPdf.laporan', $data);
    }

    public function laporan_cash_date(Request $request)
    {
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            'uang_tunai',
            'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];

        $detailOrders = $this->model->laporanDate($select, $request->date, 'cash');
        $data = [
            'title' => 'Laporan e-money ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];

        return view('admin.pages.printPdf.laporan', $data);
    }
    public function laporan_cash_month(Request $request)
    {
        $date = explode('-', $request->month);
        $select = [
            'mejas.nama as meja_id',
            'id_transaksi',
            'id_pemesanan',
            'status_pemesanan',
            'status_pembayaran',
            'tipe_pembayaran',
            'kode_pembayaran',
            'pdf_url',
            'uang_tunai',
            'kembalian',
            'total_bayar',
            'detail_orders.created_at'
        ];

        $detailOrders = $this->model->laporanMonth($select, $date, 'cash');
        $data = [
            'title' => 'Laporan e-money ',
            'date' => $request->date,
            'reports' => $detailOrders
        ];

        return view('admin.pages.printPdf.laporan', $data);
    }


    // ini revisi
    public function export_nota_customer(Request $request)
    {
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
        ])
            ->join('mejas', 'mejas.id', '=', 'detail_orders.meja_id')
            ->where('detail_orders.nota', $request->nota)
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
    }
}
