<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rs = User::all();
        return view('member.index', ['rs' => $rs]);
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
    public function store(Request $request)
    {
        //
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
        //
        $rs = $user;
        return view('member.formedit', compact('rs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $updatedData = $user;
        $updatedData->name = $request->name;
        $updatedData->email = $request->email;
        $updatedData->save();
        return redirect()->route('user.index')->with('status', 'Data anda sudah terupdate!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        try {
            $user->trasaction()->detach();
            $user->delete();

            return redirect()->route('User.index')->with('status', 'User deleted successfully!');
        } catch (\Exception $e) {
            // Handle exceptions if deletion fails
            return redirect()->route('user.index')->with('statusEror', 'Failed to delete User.');
        }
    }
}
