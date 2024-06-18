<?php

namespace App\Http\Controllers;

use App\Helper\DeleteAction;
use App\Http\Requests\StoreTuteurRequest;
use App\Models\Tuteur;

class TuteurController extends Controller
{
    use DeleteAction;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Tuteur::all();

        return view('tuteur.index', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTuteurRequest $request)
    {
        Tuteur::create($request->validated());
        toastr()->success('Parent ajouter avec success!');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tuteur $tuteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tuteur $tuteur)
    {
        return view('tuteur.update', compact('tuteur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTuteurRequest $request, Tuteur $tuteur)
    {
        $tuteur->update($request->validated());

        toastr()->success('parent mise à jour avec success!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $tuteur)
    {
        $delete = Tuteur::findOrFail($tuteur);

        return $this->supp($delete);
    }
}
