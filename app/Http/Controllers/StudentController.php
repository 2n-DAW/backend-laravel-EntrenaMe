<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::all();
    	// return response()->json($students);

        return StudentResource::collection(Student::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    //public function store(Request $request)
    public function store(StoreStudentRequest $request)
    {
        // $student = new Student;
        // $student->fname = $request->fname;
        // $student->lname = $request->lname;
        // $student->email = $request->email;
        // $student->password = $request->password;
        // $student->save();
        // return response()->json([
        //     "message" => "Student record created"
        // ], 201);

        // Student::create($request->validated());
        // return response()->json([
        //     "message" => "Student record created"
        // ], 201);

        // Student::create($request->validated());
        // return response()->json([
        //     "message" => "Student record created"
        // ], 201);

        return StudentResource::make(Student::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // if(Student::where('id', $id)->exists()) {
        //     $student = Student::find($id);
        //     return response()->json([
        //       "message" => $student
        //     ], 202);
        // } else {
        //     return response()->json([
        //       "message" => "Student not found"
        //     ], 404);
        // }

        return StudentResource::make(Student::where('id', $id)->firstOrFail());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $id)
    //public function update(Request $request, string $id)
    {
        // if (Student::where('id', $id)->exists()) {
        //     $student = Student::find($id);
        //     $student->fname = $request->fname;
        //     $student->lname = $request->lname;
        //     $student->email = $request->email;
        //     $student->password = $request->password;
        //     $student->save();
        //     return response()->json([
        //       "message" => "Student updated successfully"
        //     ], 200);
        //   } else {
        //     return response()->json([
        //       "message" => "Student not found"
        //     ], 404);
        //   }

        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->update($request->validated());
            return StudentResource::make($student);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();
            return response()->json([
              "message" => "Student deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Student not found"
            ], 404);
          }
    }
}
