<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = [
        ["name" => "Dog"],
        ["name" => "Cat"],
        ["name" => "Anjing"],
        ["name" => "Kucing"],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo "Data Hewan : ";
        foreach ($this->animals as $animal) {
            echo "\n$animal[name]";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        array_push($this->animals, $request);
        $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->animals[$id - 1];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->animals[$id - 1] = $request;
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        unset($this->animals[$id - 1]);
        $this->index();
    }
}
