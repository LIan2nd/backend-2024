<?php

# membuat class Animal
class Animal
{
  // TODO: Create a property animals

  // TODO: Create method constructor - mengisi data awal
  //* parameter: data hewan (array)
  public function __construct($data) {}
  
  // TODO: Create method index - menampilkan data animals
  public function index() {}
  
  // TODO: Create method store - menambahkan hewan baru
  //* parameter: hewan baru
  public function store($data) {
    //* hint: gunakan method array_push untuk menambahkan data baru
  }

  // TODO: Create method update - mengupdate hewan
  //* parameter: index dan hewan baru
  public function update($index, $data) {}

  // TODO Create method delete - menghapus hewan
  //* parameter: index
  public function destroy($index) {
    //* hint: gunakan method unset atau array_splice untuk menghapus data array
  }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animals = ["Dog", "Kucing", "Anjing", "Cat"];
$animal = new Animal($animals);

echo "Index - Menampilkan seluruh hewan <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru <br>";
$animal->store('Burung');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan <br>";
$animal->update(0, 'Kucing Anggora');
$animal->update(10, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";

?>