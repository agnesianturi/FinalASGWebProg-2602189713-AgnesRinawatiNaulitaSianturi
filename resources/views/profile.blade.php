@extends('layout.master')

@section('title', 'Profile Page')

@section('content')
        <div class="profile-area" style="margin-top: 5rem; margin-bottom:7rem">
                <img src="images/profile-photo.png" style="width: 5rem; height:5rem; border-radius: 100%; margin-bottom: 1rem" alt="">
                <h4>{{ $user->name }}</h4>
                <h6 style="font-weight: normal; font-style: italic">{{ $user->fieldsOfWork }}</h6>
                <p>{{ $user->linkedinUsername }}</p>
                <div class="friends-counter" style="color: white">
                    {{ $user->coins }} coins
                </div>
        </div>

        <br>
        
@endsection