<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user()->id;
        $requests = Requests::where('requests.receiver_id', '=', $currentUser)->where('requests.status', '=', 'Pending')->join('users', 'users.id', '=', 'requests.sender_id')
        ->get(['requests.id as request_id', 'users.*']);

        return view('requests', compact('requests'));
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
        $sender_id = Auth::user()->id;
        $receiver_id = $request->input('receiver_id');

        $requests = Requests::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
        ]);

        if($requests){
            return redirect()->route('user.index')->with('success', 'Friend Request Sent');
        };

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
    public function destroy(string $request_id)
    {
        $deleteRequest = Requests::destroy($request_id);

        return redirect()->route('requests.index')->with('success', 'Request Deleted');
    }
}
