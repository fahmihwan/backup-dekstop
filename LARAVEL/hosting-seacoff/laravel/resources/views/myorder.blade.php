{{-- @dd($data) --}}
@extends('layout.landingPage')
@section('styles')
    <style>
        body {
            background-color: rgb(246, 246, 246)
        }

        .btn-group ul li a.scanQr {
            color: white;
            border: 8px solid rgb(246, 246, 246);
            /* background-color: rgb(157, 135, 135); */
            background-color: rgb(233, 132, 8);
            height: 80px;
            width: 80px;
            border-radius: 80px;
            display: block;
            font-size: 30px;
            transform: translateY(-40px);
            line-height: 60px;
        }

        table tr td.name {
            width: 160px;
        }


        #accordionExample {
            width: 100px;

        }

        .steps {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }


        .step-button {
            margin-bottom: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            /* background-color: #ffc106; */
            color: white;
            background-color: rgb(225, 225, 225);
            transition: .4s;
        }

        .step-title {
            margin-left: 380px;
            transform: translateY(-74px);
            width: 300px;
            /* width: 100%; */
            text-align: left;
        }

        /* .step-button[aria-expanded="true"] {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                width: 60px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                height: 60px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                background-color: #ffc106;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                color: #fff;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            } */

        .proses {
            width: 60px;
            height: 60px;
            background-color: #ffc106;
            color: #fff;
        }

        .done {
            background-color: #ffc106;
            color: #fff;
        }

        .step-item {
            z-index: 3;
            text-align: center;
            /* height: 20px; */
        }



        .progress {
            transform: rotate(90deg);
            -webkit-appearance: none;
            position: absolute;
            top: 130px;
            width: 180px;
            z-index: 2;
            height: 10px;
            margin-left: 0px;
            /* margin-bottom: 18px; */
        }

        /* to customize progress bar */
        .progress::-webkit-progress-value {
            background-color: #ffc106;
            transition: .5s ease;
        }

        .progress::-webkit-progress-bar {
            background-color: rgb(237, 237, 237);

        }
    </style>
@endsection

@section('container')
    <div class="container" style="padding-bottom: 200px">
        <div class="row" style="background-color: white">
            <div class="col-md-12 d-flex justify-content-between ">
                <div class="top-bar py-2">My Order</div>
                @if ($status == 1)
                    <div class="top-bar py-2">
                        <b>{{ $data->nama }}</b>
                    </div>
                    <div class="top-bar py-2">
                        <form action="/home/pindah-meja" method="post" id="form-pidah">
                            @csrf
                            <input type="hidden" value="{{ $data->qrcode }}" name="qrcode">
                            <button type="submit" class="btn btn-warning btn-sm" id="pindah-meja">Pindah Meja</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>


        <div class="row mt-2">
            <div class="col-md-12">
                <div class="nav nav-pills mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a style="width: 48%" class="me-2 active  btn btn-outline-warning rounded-pill" id="status-pemesanan"
                        data-bs-toggle="pill" href="#tabs-status" aria-controls="tabs-status" aria-selected="true">
                        Status Pemesanan</a>
                    <a style="width: 48%" class=" btn btn-outline-warning rounded-pill" id="daftar-pemesanan"
                        data-bs-toggle="pill" href="#d-p-tabs" aria-controls="d-p-tabs" aria-selected="false">Daftar
                        pemesanan</a>
                </div>

                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active " id="tabs-status" role="tabpanel"
                        aria-labelledby="status-pemesanan">


                        <div id="nota-detail-orders">


                            <!-- Vertical Steppers -->
                            {{-- <section class="mb-5">
                                <p class="">Pelanggan atas nama: <b>Daris</b></p>
                                <hr>
                                <div class="accordion" id="accordionExample">
                                    <div class="steps">
                                        <progress class="progress" value=50 max=100></progress>
                                        <div class="step-item">
                                            <button disabled class="step-button text-center " type="button">
                                                <i class="fas fa-user-clock"></i>
                                            </button>
                                            <div class="step-title">
                                                Pesanan anda menunggu antrian
                                            </div>
                                        </div>
                                        <div class="step-item" style="">
                                            <button disabled class="step-button text-center" type="button">
                                                <i class="fas fa-blender"></i>
                                            </button>
                                            <div class="step-title">
                                                Pesanan anda dalam proses dibuat
                                            </div>
                                        </div>
                                        <div class="step-item" style="height: 70px; ">
                                            <button disabled class="step-button text-center" type="button">
                                                <i class="fas fa-mug-hot"></i>
                                            </button>
                                            <div class="step-title">
                                                Pesanan siap di antarkan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section> --}}

                            <!-- .Vertical Steppers -->



                        </div>

                    </div>
                    <div class="tab-pane fade" id="d-p-tabs" role="tabpanel" aria-labelledby="daftar-pemesanan">


                        <div id="list-order-customer">

                            @if ($status == 1)
                                @foreach ($detail_menu as $menu)
                                    <section class="mb-5">
                                        <p class="">Pelanggan : <b>{{ $menu->nama }}</b></p>
                                        <hr>
                                        @foreach ($menu->orders as $order)
                                            <div class="card mb-2">
                                                <div class="clear-fix">
                                                    <div class="float-start">
                                                        <img src="/storage/{{ $order->menu->gambar }}" alt=""
                                                            style="width: 140px">
                                                    </div>
                                                    <div class="float-end pt-2 " style="width: 60%">
                                                        <p class="m-0"> {{ $order->menu->nama }} - <span
                                                                class="text-muted">
                                                                {{ $order->menu->kategori }} </span>
                                                        </p>
                                                        <p class="m-0">Rp. {{ $order->menu->harga }}</p>
                                                        <p class="m-0">qty: <span class="text-muted">
                                                                {{ $order->qty }}</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </section>
                                @endforeach
                            @endif




                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 {{ $status == 0 && 'd-flex justify-content-center align-items-center' }} ">
            @if (Session::has('token'))
                {{-- <div class="d-flex justify-content-center " style="margin-top:200px; ">
                    <p class="me-2 text-muted">tunggu sebenta ...</p>
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> --}}
            @endif

            @if ($status == 0)
                <div class="d-flex flex-column justify-content-center align-items-center " style="height: 80vh">
                    <img src="{{ asset('assets/images/QR Code-pana.png') }}" alt="" style="width: 70%;">
                    <br>
                    <p class="text-muted">{{ $data }}</p>
                </div>
            @endif
        </div>

    </div>
    </div>
    <input type="text" value="{{ Session::has('token') ? 1 : 0 }}" id="cek-session" hidden>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const cekSession = document.getElementById('cek-session');


        async function getApi() {
            const response = await fetch('/json/my-order/notif');
            const json = await response.json();
            return json;
        }
        if (cekSession.value != 0) {
            setInterval(() => {
                getApi().then(data => {
                    getData(data.detailOrders)
                });
            }, 1000);
            sweatalertt()
        }

        function getData(responsee) {

            const notaDetailOrders = document.getElementById('nota-detail-orders');
            let text = ''
            responsee.forEach((e, i) => {
                text += `
            <section class="mb-5 list-notif" data-progress="${e.status_pemesanan}">
            <p class="">Pelanggan atas nama: <b>${e.nama}</b></p>
            <hr>
            <div class="accordion" id="accordionExample">
                <div class="steps">
                    <progress class="progress" value=0 max=100></progress>
                    <div class="step-item">
                        <button disabled class="step-${i} step-button text-center " type="button">
                            <i class="fas fa-user-clock"></i>

                        </button>
                        <div class="step-title">
                            Pesanan anda menunggu antrian
                        </div>
                    </div>
                    <div class="step-item" style="">
                        <button disabled class="step-${i} step-button text-center  " type="button">
                            <i class="fas fa-blender"></i>

                        </button>
                        <div class="step-title">
                            Pesanan anda dalam proses dibuat
                        </div>
                    </div>
                    <div class="step-item" style="height: 70px; ">
                        <button disabled class="step-${i} step-button text-center" type="button">
                            <i class="fas fa-mug-hot"></i>

                        </button>
                        <div class="step-title">
                            Pesanan siap di antarkan
                        </div>
                    </div>
                </div>
            </div>
        </section>`
                notaDetailOrders.innerHTML = text

            });


            notifProgressBar(responsee)
        }



        function notifProgressBar(responsee) {

            let sectionEl = document.querySelectorAll('section.list-notif')


            for (let i = 0; i <= sectionEl.length - 1; i++) {

                let status = sectionEl[i].getAttribute('data-progress')
                if (status == 'order') {
                    sectionEl[i].querySelector('.progress').value = 0
                    if (status === 'order') {
                        document.querySelectorAll(`.step-${i}`)[0].classList.add('done')
                    }
                }
                if (status == 'waiting') {
                    sectionEl[i].querySelector('.progress').value = 50
                    document.querySelectorAll(`.step-${i}`).forEach(e => {
                        if (status === 'waiting') {
                            document.querySelectorAll(`.step-${i}`)[0].classList.add('done')
                            document.querySelectorAll(`.step-${i}`)[1].classList.add('done')
                        }
                    })

                }
                if (status == 'finish') {
                    sectionEl[i].querySelector('.progress').value = 100
                    document.querySelectorAll(`.step-${i}`).forEach(e => {
                        if (status === 'finish') {
                            document.querySelectorAll(`.step-${i}`)[0].classList.add('done')
                            document.querySelectorAll(`.step-${i}`)[1].classList.add('done')
                            document.querySelectorAll(`.step-${i}`)[2].classList.add('done')
                        }
                    })
                }

            }
        }







        function sweatalertt() {
            const btnPindah = document.getElementById('pindah-meja')
            const formPindah = document.getElementById('form-pidah');
            btnPindah.addEventListener('click', function(e) {
                e.preventDefault()
                Swal.fire({
                    title: 'mau pindah meja sekarang?',
                    text: "jika anda memiliki pesanan yang belum selesai di buat, anda tidak dapat memindahkan pesanan anda ke meja lain!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Pindah Sekarang!!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        formPindah.submit();
                    }
                })
            })
        }

        // function realtimeNotif() {
        //     fetch('/json/my-order/notif')
        //         .then(response => response.json())
        //         .then(res => apendOrder(res))
        //         .catch(err => console.log(err))
        // }


        // function apendOrder(res) {

        //     const notaDetailOrders = document.getElementById('nota-detail-orders');
        //     let nota = ''
        //     if (res.detailOrders.length != 0) {

        //         res.detailOrders.forEach((e, i) => {
        //             nota += `
    //         <section class="mb-5" data-progress="${e.status_pemesanan}">
    //                     <p class="">Pelanggan atas nama: <b>${e.nama}</b></p>
    //                     <hr>
    //                     <div class="accordion" id="accordionExample">
    //                         <div class="steps">
    //                             <progress class="progress" value=0 max=100></progress>
    //                             <div class="step-item">
    //                                 <button disabled class="step-button text-center " type="button">
    //                                     <i class="fas fa-user-clock"></i>
    //                                 </button>
    //                                 <div class="step-title">
    //                                     Pesanan anda menunggu antrian
    //                                 </div>
    //                             </div>
    //                             <div class="step-item" style="">
    //                                 <button disabled class="step-button text-center " type="button">
    //                                     <i class="fas fa-blender"></i>
    //                                 </button>
    //                                 <div class="step-title">
    //                                     Pesanan anda dalam proses dibuat
    //                                 </div>
    //                             </div>
    //                             <div class="step-item" style="height: 70px; ">
    //                                 <button disabled class="step-button text-center" type="button">
    //                                     <i class="fas fa-mug-hot"></i>
    //                                 </button>
    //                                 <div class="step-title">
    //                                     Pesanan siap di antarkan
    //                                 </div>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </section>


    //         `;
        //             notaDetailOrders.innerHTML = nota

        //         });
        //         function_notifBar()

        //     }

        // }




        // function function_notifBar() {
        //     let sectionEl = document.querySelectorAll('section')
        //     sectionEl.forEach((e, i) => {
        //         let status = sectionEl[i].getAttribute('data-progress')
        //         if (status == 'order') {
        //             sectionEl[i].querySelector('.progress').value = 0
        //         }
        //         if (status == 'waiting') {
        //             sectionEl[i].querySelector('.progress').value = 50
        //         }
        //         if (status == 'finish') {
        //             sectionEl[i].querySelector('.progress').value = 100
        //         }
        //     })
        // }
    </script>
@endsection
