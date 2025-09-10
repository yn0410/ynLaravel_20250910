<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo "student controller ok");
        // dd("hello student controller dd");
        $data = [
            [
                'id'=>1,
                'name'=>'amy'
            ],
            [
                'id'=>2,
                'name'=>'bob'
            ],
            [
                'id'=>3,
                'name'=>'cat'
            ],
        ];

        return view('student.index', ['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("hello students create");
        /* $url = route('students.create');
        dd($url); */
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd("student id = $id edit ok");
        return view('student.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function excel()
    {
        dd("student excel ok");
    }

    public function test()
    {
        // dd("student test ok");
        // $data = "student test ok";
        $data = [
            [
                'id'=>1,
                'name'=>'amy'
            ],
            [
                'id'=>2,
                'name'=>'bob'
            ],
            [
                'id'=>3,
                'name'=>'cat'
            ],
        ];

        return view("student.test", ['data'=>$data]);
    }
}
