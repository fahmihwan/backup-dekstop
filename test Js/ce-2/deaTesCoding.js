// 1. tukar nilai data dari variable yang tersedia
// function test() {
//     var a = 1;
//     var b = 2;
//     console.log("a awal  = ", a);
//     console.log("b awal  = ", b);

//     //coding
//     console.log("a final  = ", a);
//     console.log("b final  = ", b);
// }
// test()
// jawab :
// function test() {
//     var a = 1;
//     var b = 2;
//     b -= a;
//     a += b;
//     console.log("a final  = ", a);
//     console.log("b final  = ", b);
// }
// test();

// kelipatan 3 fizz, kelipatan 5 buzz. both fizzbuzz
// function fizzBuzz(number) {
//     for (let i = 1; i <= number; i++) {
//         if (i % 3 == 0 && i % 5 == 0) {
//             console.log("fizz buzz");
//         } else if (i % 3 == 0) {
//             console.log("fizz");
//         } else if (i % 5 == 0) {
//             console.log("buzz");
//         } else {
//             console.log(i);
//         }
//     }
// }

// fizzBuzz(20);

// function triangleLeft(number) {
//     let result = "";
//     for (let i = 0; i <= number; i++) {
//         for (let j = 0; j <= i; j++) {
//             result += "*";
//         }
//         result += "\n";
//     }
//     console.log(result);
// }
// console.log(triangleLeft(30));

function triangleRight(number) {
    let result = "";
    for (let i = 0; i <= number; i++) {
        for (let j = i; j <= number; j++) {}
        result += " ";

        // result += "\n";
    }
    console.log(result);
}
triangleRight(10);
