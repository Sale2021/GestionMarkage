<?php

namespace App\Http\Controllers;

use App\Helper\DeleteAction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use DeleteAction;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = User::all();

        return view('user.index', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        User::create($data);

        toastr()->success('Utilisateur créé avec success!');

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
        ]));

        toastr()->success('Utilisateur modifié avec success!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $user)
    {
        $delete = User::findOrFail($user);

        return $this->supp($delete);
    }
}
