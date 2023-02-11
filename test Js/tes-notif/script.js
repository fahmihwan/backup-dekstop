document.addEventListener('DOMContentLoaded', function () {


    // let status_pemesanan = ['order', 'waiting', 'finish']

    async function getApi() {
        const response = await fetch('api.json');
        const json = await response.json();
        return json;
    }

    getApi().then(data => {
        getData(data)
    });


    function getData(response) {
        const listData = document.getElementById('list-data')
        let text = ''
        response.forEach((e, i) => {
            text += `
            <section class="mb-5" data-progress="${e.status_pemensanan}">
            <p class="">Pelanggan atas nama: <b>${e.nama}</b></p>
            <hr>
            <div class="accordion" id="accordionExample">
                <div class="steps">
                    <progress class="progress" value=0 max=100></progress>
                    <div class="step-item">
                        <button disabled class="step-${i} step-button text-center " type="button">
                            <i class="fas fa-user-clock"></i>
                            order
                        </button>
                        <div class="step-title">
                            Pesanan anda menunggu antrian
                        </div>
                    </div>
                    <div class="step-item" style="">
                        <button disabled class="step-${i} step-button text-center  " type="button">
                            <i class="fas fa-blender"></i>
                            waiting
                        </button>
                        <div class="step-title">
                            Pesanan anda dalam proses dibuat
                        </div>
                    </div>
                    <div class="step-item" style="height: 70px; ">
                        <button disabled class="step-${i} step-button text-center" type="button">
                            <i class="fas fa-mug-hot"></i>
                            finish
                        </button>
                        <div class="step-title">
                            Pesanan siap di antarkan
                        </div>
                    </div>
                </div>
            </div>
        </section>`
            listData.innerHTML = text


        });

        notifProgressBar(response)
    }



    function notifProgressBar(response) {
        let sectionEl = document.querySelectorAll('section')

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













})