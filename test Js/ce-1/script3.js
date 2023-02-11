let h1, m1, s1, h2, m2, s2;
let updated_at = "2022-08-16T19:47:10.000000Z";


let update = new Date(updated_at);

h1 = update.getHours() + 1;
m1 = update.getMinutes()
s1 = update.getSeconds()


h2 = update.getHours()
let currentTime = new Date()

let current = toSeconds(currentTime.getHours(), currentTime.getMinutes(), currentTime.getMinutes())

var count = getTimeDiff(h1, m1, s1, current);

function getTimeDiff(a, b, c, d) {
    return diff = toSeconds(a, b, c) - d;
}

function toSeconds(h, m, s) {
    return h * 3600 + m * 60 + s * 1;
}

var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

function timer() {
    count = count - 1;
    if (count == -1) {
        clearInterval(counter);
        return;
    }
    var seconds = count % 60;
    var minutes = Math.floor(count / 60);
    var hours = Math.floor(minutes / 60);
    minutes %= 60;
    hours %= 60;
    let tes = `${hours}:${minutes}:${seconds}`
    console.log(tes)
}