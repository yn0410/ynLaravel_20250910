<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Phone;
use App\Models\Hobby;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Student::all();
        $data = Student::with('phoneRelation', 'hobbiesRelation')->get();
        // $studentHobbies = $data[0]->hobbiesRelation;
        // dd($studentHobbies);
        // dd($data);

        /* 資料格式 示意
        $data = [
            [
                'id' => 1,
                'name' => 'amy',
                'phone' => '09123',
                'hobbies' => ['php','python'],
                'hobbyString' => 'PHP, Python'
            ],
            [
                'id' => 2,
                'name' => 'bob',
                'phone' => '0922',
                'hobbies' => []
            ]
        ]; */


        // 老師code... start
        // 把一位學生的 所有愛好 組成一個string
        // 在前端foreach many(X)
        // 在後端foreach many(O)

        foreach ($data as $key => $value) {
            $dataHobbies = $value->hobbiesRelation;

            // $hobbyString = '';
            $hobbyArray = [];
            foreach ($dataHobbies as $keyHobby => $valueHobby) {
                array_push($hobbyArray, $valueHobby->hobby);
            };

            $hobbyString = join(',', $hobbyArray);
            //  dd($hobbyString);
            $data[$key]['hobbyString'] = $hobbyString;
            // dd($data[$key']
        }
        // 老師code... end


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

        // 主表
        $data = new Student;
        $data->name = $input['name'];
        $data->save();
        
        // phone 子表
        $dataPhone = new Phone;
        $dataPhone->student_id = $data->id;
        $dataPhone->phone = $input['phone'];
        $dataPhone->save();

        // (老師code ... start)
        // hobby 子表
        // "hobbies" => "PHP,JS" 
        // string to array
        $hobbyArray = explode(',', $input['hobbies']);
        // dd($hobbyArray);

        foreach ($hobbyArray as $key => $value) {
            $dataHobby = new Hobby;
            $dataHobby->student_id = $data->id;
            $dataHobby->hobby = $value;
            $dataHobby->save();
        }
        // (老師code ... end)


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
        // dd("student id = $id edit ok");
        // $data = [
        //     'id' => $id
        // ];
        $data = Student::with('phoneRelation', 'hobbiesRelation')->find($id);

        // (老師code ... start)
        $dataHobbies = $data->hobbiesRelation;

        // $hobbyString = '';
        $hobbyArray = [];
        foreach ($dataHobbies as $keyHobby => $valueHobby) {
            array_push($hobbyArray, $valueHobby->hobby);
        };

        $hobbyString = join(',', $hobbyArray);
        //  dd($hobbyString);
        $data['hobbyString'] = $hobbyString;
        // (老師code ... end)

        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // form input
        $input = $request->except('_token', '_method');

        // 主表
        // 抓id 單筆資料
        $data = Student::find($id);
        // 存資料
        $data->name = $input['name'];
        $data->save();

        // 刪除Phone子表
        Phone::where('student_id', $id)->delete();

        // 新增Phone子表
        $dataPhone = new Phone;
        $dataPhone->student_id = $data->id;
        $dataPhone->phone = $input['phone'];
        $dataPhone->save();

        // 老師code start
        // 刪除hobby子表
        Hobby::where('student_id', $id)->delete();

        // 新增hobby子表
        // "hobbies" => "PHP,JS" 
        // string to array
        $hobbyArray = explode(',', $input['hobbies']);
        // dd($hobbyArray);

        foreach ($hobbyArray as $key => $value) {
            $dataHobby = new Hobby;
            $dataHobby->student_id = $data->id;
            $dataHobby->hobby = $value;
            $dataHobby->save();
        }
        // 老師code end

        // 回首頁
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        // 先刪除子表 的 資料
        Phone::where('student_id', $id)->delete();
        Hobby::where('student_id', $id)->delete();
        Student::where('id', $id)->delete();
        /* $data = Student::find($id);
        $data->delete(); */
        return redirect()->route('students.index');
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
