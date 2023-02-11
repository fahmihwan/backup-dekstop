<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-jzzzQlbkuYuOT2hI"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Hello, world!</title>
    <style>
        #pay-button {
            position: sticky;
            bottom: 0;
            margin-bottom: 20px;
            display: block;
            width: 100%;
        }

        .card {
            margin: 5px;
        }
    </style>
</head>

<body class="bg-dark text-dark">
    <h1>payment</h1>
    <h1 id="tes" style="color: white">ds</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 d-flex flex-wrap" id="menu">

            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex bd-highlight mb-3 text-light">
                    <div class="me-auto p-2 bd-highlight">total</div>
                    <div class="p-2 bd-highlight" id="total">0</div>
                </div>

            </div>
        </div>

        <div class="row ">
            <div class="col-12 ">
                <button id="pay-button" class="btn  btn-danger"> Pay!</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', (event) => {
            const menu = document.getElementById('menu');

            const dummy = [{
                    id: 'a01',
                    menu: 'apem',
                    harga: 5000,
                },
                {
                    id: 'a02',
                    menu: 'lumpia',
                    harga: 6000,
                },
                {
                    id: 'a03',
                    menu: 'nogosari',
                    harga: 8000,
                },
            ];

            loadElements()

            function loadElements() {
                let cards = ''
                for (let i = 0; i <= dummy.length - 1; i++) {
                    cards += `
                <div class="card bg-dark border boder-light text-light p-2" style="width: 16rem;">
                    <input type="hidden" value="${dummy.id}"/>
                    <p class="menu">${dummy[i].menu}</p>
                    <p class="price">${dummy[i].harga}</p>
                    <input type="number" class="form-control jumlah" style="width:80px" min="1" value="1">
                </div>
                `;
                    menu.innerHTML = cards;
                }
                actionPrice()
                changeTotal()
            }


            function actionPrice() {
                let jumlah = document.getElementsByClassName('jumlah')
                for (let i = 0; i <= jumlah.length - 1; i++) {
                    jumlah[i].addEventListener('change', function(e) {
                        let getJumlah = e.target.value;
                        let getPrice = dummy[i].harga
                        changePrice(getJumlah, getPrice, i);
                    })
                }

            }

            function changePrice(getJumlah, getPrice, i) {
                const price = document.getElementsByClassName('price')
                if (getJumlah > 0) {
                    let result = getJumlah * getPrice;
                    price[i].innerText = result;
                }
                changeTotal()

            }


            function changeTotal() {
                const price = document.getElementsByClassName('price')
                const total = document.getElementById('total');
                let result = 0
                for (let i = 0; i < price.length; i++) {
                    result += parseInt(price[i].innerText)
                }
                total.innerText = result;
            }

            const payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {

                const jumlahEl = document.getElementsByClassName('jumlah');
                const totalEl = document.getElementById('total');

                let arr = [];
                for (let i = 0; i <= jumlahEl.length - 1; i++) {
                    arr.push({
                        id: dummy[i].id,
                        price: dummy[i].harga,
                        quantity: parseInt(jumlahEl[i].value),
                        name: dummy[i].menu,
                    })
                }

                passingDataAjax(arr);
                totalEl.innerText

                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("payment success!");
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("wating your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });


            function passingDataAjax(data) {

                const total = parseInt(document.getElementById('total').innerText);
                data.push({
                    totall: total
                })
                const tes = document.getElementById('tes');
                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '/ppost', true)
                xhttp.setRequestHeader("Content-Type", "application/json");
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var response = this.status;
                        console.log(response)
                        // window.location.href = '/ppost'
                    } else {
                        var response = this.status;
                        console.log('ww')
                    }
                }
                xhttp.send(JSON.stringify(data))

            }





        });

        // // For example trigger on button clicked, or any time you need
        // var payButton = document.getElementById('pay-button');
        // payButton.addEventListener('click', function() {
        //     // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token

        // });
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>