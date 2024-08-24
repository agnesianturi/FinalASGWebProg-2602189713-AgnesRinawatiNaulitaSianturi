@extends('layout.master')

@section('title', 'Profile Page')

@section('content')
        <div class="profile-area">
                <img src="images/profile-photo.png" style="width: 5rem; height:5rem; border-radius: 100%; margin-bottom: 1rem" alt="">
                <h4>{{ $user->name }}</h4>
                <h6 style="font-weight: normal; font-style: italic">{{ $user->fieldsOfWork }}</h6>
                <p>{{ $user->linkedinUsername }}</p>
                <div class="friends-counter" style="color: white">
                    100+ friends
                </div>
        </div>

        {{-- <div class="profile-area" style="margin-top: 5rem; margin-bottom:6rem">
            <img src="images/profile-photo.png" style="width: 5rem; height:5rem; border-radius: 100%; margin-bottom: 1rem" alt="">
            <h4>Nama</h4>
            <h6 style="font-weight: normal; font-style: italic">Fields</h6>
            <p>http://linkedin.com</p>
        </div> --}}

        <br>
        
        {{-- <div class="friends-area">
            <h5>My Friend's List</h5>
            <br>
            <div class="detail-friends-area mb-1">
                <img src="images/photo1.png" class="friends-photo" alt="">
                <div class="profile-friends-area">
                    <h6>Jeno Lee</h6>
                    <p>Entertainment & Arts</p>
                </div>
            </div>
            <div class="detail-friends-area mb-1">
                <img src="images/photo1.png" class="friends-photo" alt="">
                <div class="profile-friends-area">
                    <h6>Puti Renata Ratnasari Moeloek</h6>
                    <p>Food & Beverages</p>
                </div>
            </div>
            <div class="detail-friends-area mb-1">
                <img src="images/photo1.png" class="friends-photo" alt="">
                <div class="profile-friends-area">
                    <h6>Jerome Polin Sijabat</h6>
                    <p>Education</p>
                </div>
            </div>
        </div> --}}
@endsection