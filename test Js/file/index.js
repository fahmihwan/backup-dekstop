function konversiNilai(nama, nilai) {
    if (nilai >= 80 && nilai <= 100) return nama + ` nilai A`;
    if (nilai >= 60 && nilai <= 79) return nama + ` nilai B`;
    if (nilai >= 40 && nilai <= 59) return nama + ` nilai C`;
    if (nilai >= 20 && nilai <= 39) return nama + ` nilai D`;
    if (nilai >= 0 && nilai <= 19) return nama + ` nilai E`;
}

console.log(konversiNilai("dimas", 90));
// console.log(konversiNilai("faisal", 30));
// console.log(konversiNilai("sulthon", 70));
// console.log(konversiNilai("alfian", 50));
// console.log(konversiNilai("rahman", 30));
// console.log(konversiNilai("dea", 30));
// console.log(konversiNilai("edwin", 30));
