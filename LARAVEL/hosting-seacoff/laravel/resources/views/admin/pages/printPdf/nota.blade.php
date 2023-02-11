<!DOCTYPE html>
<html>

<head>
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table tr td,
        th {
            padding: 0px;
            margin: 0px;
        }

        table tr td.sub-list {
            width: 200px;
            height: 30px;
        }
    </style>
</head>


<body>
    <div class="container pt-2">
        <h1 class="text-center">Seacoff</h1>
        <p class="text-center">Jl.Kartini No.5 Madiun</p>

        <br>
        <h5 class="text-center">TAX INVOICE</h5>
        <hr>

        <div class="row pb-2">
            <div class="col-md-12">
                <table class="">
                    <tr>
                        <td class="sub-list">Nota</td>
                        <td>: {{ $detail_order->nota }}</td>
                    </tr>
                    <tr>
                        <td class="sub-list">Nama</td>
                        <td>: {{ $detail_order->nama }}</td>
                    </tr>
                    <tr>
                        <td class="sub-list">Meja </td>
                        <td>: {{ $detail_order->nama_mejas }}</td>
                    </tr>
                    <tr>
                        <td class="sub-list">Tanggal </td>
                        <td>: {{ $detail_order->created_at }}</td>
                    </tr>
                    @if ($detail_order->tipe_pembayaran !== 'cash')
                        <tr>
                            <td class="sub-list">Tipe Pembayaran </td>
                            <td>: {{ $detail_order->tipe_pembayaran }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" style="">
                    <tr>
                        <th style="width: 60px">qty</th>
                        <th>item</th>
                        <th>total</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->qty }}</td>
                            <td>{{ $order->nama }} - {{ $order->kategori }}</td>
                            <td>Rp .{{ $order->harga }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="2">Total</th>
                        <th>Rp. {{ $detail_order->total_harga }}</th>
                    </tr>
                </table>
            </div>
        </div>

        <table>
            <tr>
                <td class="sub-list">Pajak (10%)</td>
                <td>: Rp. {{ $detail_order->ppn }}</td>
            </tr>
            @if ($detail_order->tipe_pembayaran == 'cash')
                <tr>
                    <td class="sub-list">Uang Tunai </td>
                    <td>: Rp. {{ $detail_order->uang_tunai }}</td>
                </tr>
                <tr>
                    <td class="sub-list">Kembalian </td>
                    <td>: Rp. {{ $detail_order->kembalian }}</td>
                </tr>
            @endif
            <tr>
                <th class="sub-list">Total Bayar </th>
                <th>: Rp. {{ $detail_order->total_bayar }}</th>
            </tr>
        </table>
        <br>

        <h1 class="mt-5">Silakan duduk, Kami akan antar Pesanan Anda...</h1>
    </div>

</body>

</html>
