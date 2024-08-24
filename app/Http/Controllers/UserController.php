<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $currentUser = Auth::user()->id;

        $searchTerm = $request->input('search');
        $selectedGender = $request->input('gender');
        $selectedFields = $request->input('fields');

        $query = User::query();

        if(Auth::check()){
    
            $sentRequest = DB::table('requests')
                ->where('sender_id', '=', $currentUser)->pluck('receiver_id');
    
            $friendUser = DB::table('friendships')
                ->where('user_id', '=', $currentUser)->pluck('friend_id');
    
            $query->whereNotIn('id', $sentRequest)
                ->whereNotIn('id', $friendUser)
                ->where('id', '!=', $currentUser);
            
        }

        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }
    
        if ($selectedGender) {
            $query->where('gender', $selectedGender);
        }
    
        if ($selectedFields) {
            $query->where('fieldsOfWork', $selectedFieldsOfWork);
        }

        $allUsers = $query->get();

        $loc = session()->get('locale');
        App::setLocale($loc);

        return view('home', compact('allUsers'));
    }

    public function profile(){
        // $user = User::findOrFail(Auth::user()->id);

        // $loc = session()->get('locale');
        // App::setLocale($loc);

        $user = Auth::user();

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
