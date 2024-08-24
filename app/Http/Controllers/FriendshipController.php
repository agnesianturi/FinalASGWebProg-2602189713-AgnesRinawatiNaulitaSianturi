<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class FriendshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user()->id;
        $allFriends = Friendship::where('user_id', '=', $currentUser)->join('users', 'users.id', '=', 'friendships.friend_id')
        ->get(['users.*']);

        $loc = session()->get('locale');
        App::setLocale($loc);

        return view('friends', compact('allFriends'));
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
        $currentUser = Auth::user()->id;
        $friend = $request->input('friend_id');
        $request_id = $request->input('request_id');

        $friendship = Friendship::create([
            'user_id' => $currentUser,
            'friend_id' => $friend,
        ]);

        $friendship2 = Friendship::create([
            'user_id' => $friend,
            'friend_id' => $currentUser,
        ]);

        $updateRequest = Requests::find($request_id);
        $updateRequest->status = 'accepted';
        $updateRequest->save();

        $loc = session()->get('locale');
        App::setLocale($loc);

        return redirect()->route('requests.index')->with('success', 'Friend request accepted');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
