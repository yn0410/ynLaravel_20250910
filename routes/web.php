<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


// students
Route::get('/pages_python', [StudentController::class, 'python'])->name("pages.python");
Route::get('/pages_php', [StudentController::class, 'php'])->name("pages.php");
Route::get('/pages_js', [StudentController::class, 'js'])->name("pages.js");
Route::get('/pages_html', [StudentController::class, 'html'])->name("pages.html");

Route::get('/students_test', [StudentController::class, 'test']);
Route::get('/students_child', [StudentController::class, 'child']);
Route::get('/students_excel', [StudentController::class, 'excel']);
Route::resource('students', StudentController::class);

Route::get('/', function () {
    // return view('welcome');
    // 轉址
    return redirect()->route('students.index');
});





