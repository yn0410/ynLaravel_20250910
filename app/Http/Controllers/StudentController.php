<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::all();
        // dd($data);
        return view('student.index', ['data' => $data]);

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
        // $input = $request;
        $input = $request->except('_token');
        // dd($input);

        $data = new Student;
        $data->name = $input['name'];
        $data->save();
        // return redirect('/students');
        return redirect()->route('students.index');
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
        // $data = [
        //     'id' => $id
        // ];
        $data = Student::find($id);

        // dd("student id = $id edit ok");
        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // form input
        $input = $request->except('_token');

        // 抓id 單筆資料
        $data = Student::find($id);

        // 存資料
        $data->name = $input['name'];
        $data->save();

        // 回首頁
        return redirect()->route('students.index');
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

    public function child(){
        // dd("child ok");
        return view("child");
    }

    public function html(){
        // dd("html ok");
        return view("page.html");
    }

    public function js(){
        // dd("js ok");
        return view("page.js");
    }

    public function php(){
        // dd("php ok");
        return view("page.php");
    }

    public function python(){
        // dd("python ok");
        return view("page.python");
    }
}
