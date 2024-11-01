<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

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
        $data = [
            "msg" => "Get All Students",
            "data" => $students,
        ];
        
        /**
         * Mengembalikan data json ke user
         */
        return response()->json($data, 200);
    }

    public function store(Request $request) {

        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $student = Student::create($input);

        /**
         * Data untuk dikembalikan ke user setelah request berhasil
         */
        $data = [
            "msg" => "Student is created successfully",
            "data" => $student,
        ];

        
        return response()->json($data, 201);
    }

    // TODO create show method, with parameter id

    /**
     * find student data
     * handle student not found and return response with status code 404
     * create data response
     * return data response with status code 200
     */

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
                'msg' => "data not found",
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
            "msg" => "Student is updated",
            "data" => $student,
        ];

        return response()->json($data, 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'msg' => 'Student not found'
            ];

            return response()->json($data, 404);
        }

        Student::destroy($id);
        $students = Student::all();
        $data = [
            'msg' => 'Student was successfully deleted',
            'data' => $students
        ];

        return response()->json($data, 200);
    }
}