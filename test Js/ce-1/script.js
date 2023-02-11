
let updated_at = "2022-08-16T19:47:10.000000Z";
// let updated_at = "2022-08-16T16:30:12.000000Z";
let convertTimeJson = new Date(updated_at);
console.log(convertTimeJson)

let h1, m1, s1;
let h2, m2, s2;

h1 = convertTimeJson.getHours()
m1 = convertTimeJson.getMinutes()
s1 = convertTimeJson.getSeconds()

let currentTime = new Date()
h2 = currentTime.getHours()
m2 = currentTime.getMinutes()
s2 = currentTime.getSeconds()


function getTimeDiff(h1, m1, s1, h2, m2, s2) {
    return diff = toSeconds(h2, m2, s2) + toSeconds(h1, m1, s1);
}

function toSeconds(h, m, s) {
    return h * 3600 + m * 60 + s * 1;
}

var count = getTimeDiff(h1, m1, s1, h2, m2, s2);
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




// getTimeDiff()









// function getTimeDiff(h1, m1, s1, h2, m2, s2) {
//     return diff = toSeconds(h2, m2, s2) - toSeconds(h1, m1, s1);
// }

// function toSeconds(h, m, s) {
//     return h * 3600 + m * 60 + s * 1;
// }

// function secondsToHMS(secs) {
//     function z(n) { return (n < 10 ? '0' : '') + n }
//     return z(secs / 3600 | 0) + ':' +
//         z((secs % 3600) / 60 | 0) + ':' +
//         secs % 60;
// }

// // Tests
// [[4, 23, 15, 5, 5, 8],    // 04:23:15 vs 05:05:08
//     [4, 23, 15, 4, 25, 8]].  // 04:23:15 vs 04:25:08
//     forEach(function (arr) {
//         var diff = getTimeDiff(...arr);
//         console.log(diff)
//         console.log(`Diff of ${secondsToHMS(diff)} is ${diff > 600 ? 'more' : 'less'} than 10 minutes`);
//     });