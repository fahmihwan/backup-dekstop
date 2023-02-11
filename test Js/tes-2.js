var baris = 1;
var kolom = 0;
var qty = 10;
var bintang = "";

while (baris <= qty) {
    kolom = baris;
    while (kolom > 0) {
        bintang += "*";
        kolom -= 1;
    }
    bintang += "\n";
    baris += 1;
}
console.log(bintang);
