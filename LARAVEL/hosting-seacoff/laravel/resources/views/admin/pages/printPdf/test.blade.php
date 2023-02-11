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
            background-color: grey;
            transition: .4s;
        }

        .step-title {
            margin-left: 380px;
            transform: translateY(-74px);
            width: 300px;
            /* width: 100%; */
            text-align: left;
        }

        .step-button[aria-expanded="true"] {
            width: 60px;
            height: 60px;
            background-color: blue;
            color: #fff;
        }

        .done {
            background-color: blue;
            color: #fff;
        }

        .step-item {
            z-index: 10;
            text-align: center;
            /* height: 20px; */
        }



        #progress {
            transform: rotate(90deg);
            -webkit-appearance: none;
            position: absolute;
            top: 130px;
            width: 180px;
            /* z-index: 5; */
            height: 10px;
            margin-left: 0px;
            /* margin-bottom: 18px; */
        }

        /* to customize progress bar */
        #progress::-webkit-progress-value {
            background-color: blue;
            transition: .5s ease;
        }

        #progress::-webkit-progress-bar {
            background-color: rgb(211, 211, 211);

        }
    </style>
@endsection

@section('container')
    <div class="container" style="padding-bottom: 200px">
        <div class="row" style="background-color: white">
            <div class="col-md-12 d-flex justify-content-between ">
                <div class="top-bar py-2">My Order</div>

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


                        <!-- Vertical Steppers -->
                        {{-- <div class="container"> --}}
                        <div class="accordion" id="accordionExample">
                            <div class="steps">
                                <progress id="progress" value=0 max=100></progress>
                                <div class="step-item">
                                    <button class="step-button text-center " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        1
                                    </button>
                                    <div class="step-title">
                                        Pesanan anda dalam antrian
                                    </div>
                                </div>
                                <div class="step-item" style="">
                                    <button class="step-button text-center collapsed " type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        2
                                    </button>
                                    <div class="step-title">
                                        Pesanan Anda dalam proses dibuat
                                    </div>
                                </div>
                                <div class="step-item" style="height: 70px; ">
                                    <button class="step-button text-center collapsed " type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        3
                                    </button>
                                    <div class="step-title">
                                        Pesanan Siap di Antarkan
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div id="headingOne">
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        your content goes here...
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingTwo">

                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        your content goes here...
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div id="headingThree">

                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        your content goes here...
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- </div> --}}
                        <!-- /.Vertical Steppers -->



                    </div>
                    <div class="tab-pane fade" id="d-p-tabs" role="tabpanel" aria-labelledby="daftar-pemesanan">

                    </div>

                </div>
            </div>
        </div>


    </div>
    </div>
@endsection

@section('script')
    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <!-- Stepper JavaScript -->
    <script>
        const stepButtons = document.querySelectorAll('.step-button');

        const progress = document.querySelector('#progress');

        Array.from(stepButtons).forEach((button, index) => {


            button.addEventListener('click', () => {
                progress.setAttribute('value', index * 100 / (stepButtons.length -
                    1)); //there are 3 buttons. 2 spaces.



                stepButtons.forEach((item, secindex) => {
                    if (index > secindex) {
                        item.classList.add('done');
                    }
                    if (index < secindex) {
                        item.classList.remove('done');
                    }
                })
            })
        })
    </script>
@endsection
