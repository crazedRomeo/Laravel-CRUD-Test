<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        // if(!Auth::check())
        // {
        //     return redirect()->route('login')
        //         ->withErrors([
        //         'name' => 'Please login to access the dashboard.',
        //     ])->onlyInput('name');
        // }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'password' => 'required|min:8|confirmed',
            'permission' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            // 'email' => $request->email,
            'email' => $request->name."@User.com",
            'password' => Hash::make($request->password),
            'permission' => $request->permission
        ]);

        return redirect()->route('users.index')->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            // 'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'permission' => 'required'
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success','User deleted successfully');
    }

}
