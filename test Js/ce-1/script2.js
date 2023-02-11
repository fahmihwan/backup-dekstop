

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;

    let refreshIntervalId = setInterval(function () {

        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(refreshIntervalId);
        }
    }, 1000);
}



window.onload = function () {


    let date = new Date();

    let status = "finish";

    if (status == "finish") {
        var fiveMinutes = 60 * 5,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    }

};