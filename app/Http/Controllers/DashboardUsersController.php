<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index',[
            'users'=>User::all()
        ]);
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
    public function show($user)
{
    $user = User::where('id',$user)->first();
    return view('dashboard.user.show', [
        'user' => $user
    ]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user)
    {
        $user = User::where('id',$user)->first();

        $user->delete();
        session()->flash('delete', 'Pengguna berhasil dihapus.');
        return redirect('/dashboard/pengguna');
    }
}
