<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $users = DB::table('users')->when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->orderBy('id', 'desc')->paginate(6);
        return view('pages.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =  $request->validate([
            'name' => 'required|max:100|min:4',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'roles' => 'required|in:admin,staff,user',
            'password' => 'required|min:8',
        ]);


        // $validate['password'] = Hash::make($request->password);
        User::create($validate);
        return redirect()->route('user.index')->with('success', 'User Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.users.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'required|max:100|min:4',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'roles' => 'required|in:admin,staff,user',
        ]);

        // dd($validate);

        $user->update($validate);
        return redirect()->route('user.index')->with('success', 'User Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Successfully Delete');
    }
}
