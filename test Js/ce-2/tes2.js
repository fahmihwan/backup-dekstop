// 1. Pisahkan Genap dan ganjil dari angka 1 s/d 100, 7
// let ganjil = [];
// let genap = [];
// for (let i = 1; i <= 100; i++) {
//     if (i % 2 == 0) {
//         ganjil.push(i);
//     } else {
//         genap.push(i);
//     }
// }
// console.log(ganjil);
// console.log(genap);

// console.log(arr.length);

// let prima = [];
// let notPirme = [];
// for (let i = 1; i <= 20; i++) {
//     let bill = 0;
//     for (let j = 1; j <= i; j++) {
//         if (i % j == 0) {
//             bill = bill + 1;
//         }
//     }

//     if (bill == 2) {
//         prima.push(i);
//     } else {
//         notPirme.push(i);
//     }
// }

let fibonanci = [];
let n1 = 0;
let n2 = 1;

for (let i = 1; i <= 19; i++) {
    if (i === 1 || i === 1) {
        fibonanci.push(i);
    } else {
        let total = n1 + n2;
        fibonanci.push(total);
        n1 = n2;
        n2 = total;
    }
}
console.log(fibonanci);

// bob = [3, 4, 6, 10, 11, 15]
// alice = [1, 5, 8, 12, 14, 19]
// print merge_list(bob, alice)
// # prints [1, 3, 4, 5, 6, 8, 10, 11, 12, 14, 15, 19]

// gabungkan array dan urutkan gaboleh sort()
// let bob = [3, 4, 6, 10, 11, 15];
// let alice = [1, 5, 8, 12, 14, 19];
// let result = [];

// for (let i = 0; i < bob.length; i++) {
//     if (bob[i] > alice[i]) {
//         result.push(alice[i]);
//     }
//     if (bob[i] < alice[i]) {
//         result.push(bob[i]);
//     }
// }

// console.log(result);
