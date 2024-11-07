<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['kucing', 'ayam', 'ikan'];

    public function index()
    {
        $result = [];
        foreach ($this->animals as $animal) {
            $result[] = $animal;
        }
        return response()->json($result);
    }

    public function store(Request $request)
    {
        array_push($this->animals, 'musang');
        return response()->json($this->animals);
    }

    public function update(Request $request, $id)
    {
        if ($id == 1 && isset($this->animals[$id])) {
            $this->animals[$id] = 'burung';
        }
        return response()->json($this->animals);
    }

    public function destroy($id)
    {
        if ($id == 2 && isset($this->animals[$id])) {
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals);
        }
        return response()->json($this->animals);
    }
}