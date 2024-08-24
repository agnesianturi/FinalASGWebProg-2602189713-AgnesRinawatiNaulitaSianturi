<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(Auth::check()){
            $currentUser = Auth::user()->id;
    
            $searchTerm = $request->input('search');
    
            $sentRequest = DB::table('requests')
                ->where('sender_id', '=', $currentUser)->pluck('receiver_id');
    
            $friendUser = DB::table('friendships')
                ->where('user_id', '=', $currentUser)->pluck('friend_id');
    
            $allUsers = User::whereNotIn('id', $sentRequest)
                ->whereNotIn('id', $friendUser)
                ->where('id', '!=', $currentUser)
                ->when($searchTerm, function ($query, $searchTerm) {
                    return $query->where('name', 'like', '%' . $searchTerm . '%');
                })
                ->get();
        }else{
            $allUsers = User::all();
            $searchTerm = $request->input('search');
        }

        return view('home', compact('allUsers'));
    }

    public function profile(){
        $user = User::findOrFail(Auth::user()->id);

        dd($user);

        return view('profile', compact('user'));
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
    public function show(string $id)
    {
        
        
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
