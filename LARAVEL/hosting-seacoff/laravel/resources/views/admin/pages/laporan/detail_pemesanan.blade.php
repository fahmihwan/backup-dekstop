@extends('admin.layouts.main')


@section('styles')
    <style>
        table.detail-order-class tr th {
            width: 170px
        }

        table.detail-order-class tr td {

            width: 370px
        }
    </style>
@endsection


{{-- @dd($detail_order) --}}
@section('container')
    <div class="row">
        <div class="col-sm-12 mb-xl-0  ">
            <div class="d-flex bd-highlight">
                <div class="me-auto p-2 bd-highlight">
                    <h5 class="text-dark font-weight-bold p-0 m-0">Detail Pemesanan</h5>
                    <p class="text-muted"> Last login was 23 hours ago. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/laporan/penjualan" class="btn btn-primary mb-3">Kembali</a>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-8">
            <div class="bg-white p-2">
                <table class="detail-order-class bg-white">
                    <tr>
                        <th>Nota</th>
                        <td>: {{ $detail_order->nota }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pemesan</th>
                        <td>: {{ $detail_order->nama }}</td>
                    </tr>
                    <tr>
                        <th>Tipe Pembayaran</th>
                        <td>: {{ $detail_order->tipe_pembayaran }}</td>
                    </tr>
                    @if ($detail_order->tipe_pembayaran != 'cash')
                        <tr>
                            <td>Status Pembayaran</td>
                            <td>: {{ $detail_order->status_pembayaran }}</td>
                        </tr>
                        <tr>
                            <td>Id Transaksi</td>
                            <td>: {{ $detail_order->id_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Id Pemesanan</td>
                            <td>: {{ $detail_order->id_pemesanan }}</td>
                        </tr>
                        <tr>
                            <td>Kode Pembayaran</td>
                            <td>:
                                {{ $detail_order->kode_pembayaran == null ? 'tidak tersedia' : $detail_order->kode_pembayaran }}
                            </td>
                        </tr>
                        <tr>
                            <td>Pdf Url</td>
                            <td>:
                                {{ $detail_order->pdf_url == null ? 'tidak tersedia' : $detail_order->pdf_url }}
                            </td>

                        </tr>
                    @endif

                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td>: {{ $detail_order->created_at }}</td>
                    </tr>
                </table>
                <br>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">menu</th>
                            <th scope="col">kategori</th>
                            <th scope="col">qty</th>
                            <th scope="col">harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>{{ $item->qty }}</td>
                                <td> Rp. {{ $item->harga }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">Total : </th>
                            <td> Rp. {{ $detail_order->total_harga }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="detail-order-class bg-white">

                    <tr>
                        <th>PPN (10%)</th>
                        <td>: Rp. {{ $detail_order->ppn }}</td>
                    </tr>

                    @if ($detail_order->tipe_pembayaran == 'cash')
                        <tr>
                            <th>Uang Tunai</th>
                            <td>: Rp. {{ $detail_order->uang_tunai }}</td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td>: Rp. {{ $detail_order->kembalian }}</td>
                        </tr>
                    @endif

                    <tr>
                        <th>Total Bayar</th>
                        <td>:<b> Rp. {{ $detail_order->total_bayar }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
