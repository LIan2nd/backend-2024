const nilai = 90;
let grade = "";

if (nilai > 90) {
  grade = "A";
} else if (nilai > 80) {
  grade = "B";
} else {
  grade = "C";
}

const finalGrade = nilai > 90 ? "A"
  : nilai > 80 ? "B"
    : "C"

console.log(`Nilai anda adalah: ${finalGrade}`);