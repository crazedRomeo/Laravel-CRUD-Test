<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::latest()->paginate(5);
        $users = DB::table('users')
            ->where('permission', '=', 2)
            ->get();
        return view('tests.index',compact('tests', 'users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required',
            'test_date' => 'required',
            'location' => 'required',
            // 'assessment' => 'required',
            // 'criterion' => 'required',
            // 'manager' => 'required',
        ]);

        Test::create($request->all());

        return redirect()->route('tests.index')->with('success','Test created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        $users = DB::table('users')
            ->where('permission', '=', 2)
            ->get();
        return view('tests.show',compact('test', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        $users = DB::table('users')
            ->where('permission', '=', 2)
            ->get();
        return view('tests.edit',compact('test', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'subject_name' => 'required',
            'test_date' => 'required',
            'location' => 'required',
            // 'assessment' => 'required',
            // 'criterion' => 'required',
            // 'manager' => 'required',
        ]);

        $test->update($request->all());

        return redirect()->route('tests.index')->with('success','Test updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->route('tests.index')->with('success','Test deleted successfully');
    }
}
