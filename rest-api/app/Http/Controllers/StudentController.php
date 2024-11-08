<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {

        /**
         * Method untuk mengambil semua data di table students
         */
        $students = Student::all();

        /**
         * Data untuk dikembalikan ke user setelah request berhasil
         */

         if(count($students)){
             $data = [
                 "message" => "Get All Students",
                 "data" => $students,
             ];
         } else {
            $data = [
                "message" => "Student is empty",
            ];
         }
        
        /**
         * Mengembalikan data json ke user
         */
        return response()->json($data, 200);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "nim" => "numeric|required",
            "email" => "email|required",
            "jurusan" => "required",
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'validation errors', 
                'error' => $validator->errors()
            ], 422);
        }

        $student = Student::create($request->all());
        
        /**
         * Data untuk dikembalikan ke user setelah request berhasil
         */
        $data = [
            "message" => "Student is created successfully",
            "data" => $student,
        ];

        
        return response()->json($data, 201);
    }

    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Show student',
            'data' => $student
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id) {

        $student = Student::find($id);

        if(!$student) {
            $data = [
                'message' => "data not found",
            ];

            return response()->json($data, 404);
        }

        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ];

        $student->update($input);

        $data = [
            "message" => "Student is updated",
            "data" => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

        Student::destroy($id);
        $students = Student::all();
        $data = [
            'message' => 'Student was successfully deleted',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
}