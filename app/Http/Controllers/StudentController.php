<?php

namespace App\Http\Controllers;

use App\Helper\DeleteAction;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\Tuteur;

class StudentController extends Controller
{
    use DeleteAction;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Student::all();
        $tuteur = Tuteur::all();

        return view('student.index', compact('rows', 'tuteur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $item = Student::create($request->validated());
        $item->generateId('ET');
        toastr()->success('etudiant ajouter avec success!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $tuteur = Tuteur::all();

        return view('student.update', compact('student', 'tuteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student)
    {
        $student->update($request->validated());

        toastr()->success('etudiant mise à jour avec success!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $student)
    {
        $delete = Student::findOrFail($student);

        return $this->supp($delete);
    }
}
