<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function register(Request $request)
    {
        // Register Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|min:18',
            'gender' => 'required|in:Male,Female',
            'linkedinUsername' => ['required', 'regex:/^https:\/\/www\.linkedin\.com\/in\/[a-zA-Z0-9_-]+$/'],
            'mobileNumber' => 'required|digits_between:10,15',
            'fieldsOfWork' => 'required|array|min:3'
        ]);

        $works = implode(',', (array) $request->input('fieldsOfWork'));

        // Add a New User
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'linkedinUsername' => $validatedData['linkedinUsername'],
            'mobileNumber' => $validatedData['mobileNumber'],
            'registerPrice' => rand(100000, 125000),
        ]);

        Auth::login($user);

        return redirect('/payment');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)){
            Auth::login($user);

            return redirect()->route('user.index');
        }

        // If login fails, redirect with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match out records',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function pay(Request $request)
    {
        $validatedData = $request->validate([
            'paymentAmount' => 'required|numeric|min:0',
            'registerPrice' => 'required|numeric',
        ]);

        $paymentAmount = $validatedData['paymentAmount'];
        $registerPrice = $validatedData['registerPrice'];

        $difference = $paymentAmount - $registerPrice;

        $user = Auth::user();

        if ($difference < 0){
            return redirect()->back()->with('underpaid', 'Your payment is still underpaid $' . number_format(-$difference, 2));
        } else if ($difference > 0){
            return redirect()->back()->with('overpaid', 
            ['message' => 'Your payment is overpaid $' . number_format($difference, 2),
             'difference' => $difference,
            ]);
        }else if ($difference == 0){
            $user->paymentStatus = true;
            $user->save();
            return redirect('/login')->with('success', 'Payment success');
        }
    }

    public function keepToWallet(Request $request)
    {
        $difference = $request->input('difference');
        $user = Auth::user();

        $user->coins += $difference;
        $user->paymentStatus = true;
        $user->save();

        return redirect('/login')->with('success', 'Payment successful and remaining amount has been added to your wallet');
    }

    public function index()
    {
        //
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
