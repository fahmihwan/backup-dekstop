<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        @csrf
        <input type="text" name="menu" placeholder="menu" autocomplete="off" id="menu"><br>
        <input type="number" name="harga" placeholder="harga" autocomplete="off" id="harga"><br>
        <button type="submit">submit</button>
    </form>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const menu = document.getElementById('menu')
            const harga = document.getElementById('harga')
            const form = document.querySelector('form')

            form.addEventListener('submit', function(e) {
                e.preventDefault()

                let data = [{
                    menu: menu.value,
                    harga: harga.value,
                }]

                const xhttp = new XMLHttpRequest();
                xhttp.open('POST', '/ppost', true)
                xhttp.setRequestHeader("Content-Type", "application/json");
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 2) {
                        console.log(this.status)
                        // window.location.href = '/cobaa'
                    } else {
                        console.log(this.status)
                    }
                }
                xhttp.send(JSON.stringify(data));



                // xhttp.open('POST', '/ppost', true)
                // xhttp.setRequestHeader("Content-Type", "application/json");
                // xhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //         var response = this.status;
                //         console.log(response)
                //         window.location.href = '/ppost'
                //     } else {
                //         var response = this.responseXML;
                //         console.log(response)
                //     }
                // }
                // xhttp.send(JSON.stringify(data))


            })


        })
    </script>
</body>

</html>