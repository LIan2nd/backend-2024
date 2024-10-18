<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public $animals = [
        ["name" => "Kucing"],
        ["name" => "Ayam"], 
        ["name" => "Ikan"]
    ];
    
    public function index()
    {
        echo "Menampilkan data animals";
        foreach($this->animals as $animal) {
            echo "\n";
            echo "- " . $animal['name'];
        }
    }

    public function store(Request $animal)
    {
        echo "Menambahkan Hewan baru\n";
        array_push($this->animals, $animal);
        $this->index();
    }
    public function update(Request $animal, string $id)
    {
        echo "Mengupdate Data Hewan id " . $id . "\n";
        $this->animals[$id - 1] = $animal;
        $this->index();
    }
    public function destroy(string $id)
    {
        echo "Menghapus data hewan id " . $id . "\n";
        unset($this->animals[$id - 1]);
        $this->index();
    }
}
