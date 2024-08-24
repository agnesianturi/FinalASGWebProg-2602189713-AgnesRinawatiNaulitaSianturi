@extends('layout.master')

@section('title', 'My Friends')

@section('activeFriends', 'active')

@section('content')
        <div class="title-area">
            <h3>@lang('translation.My Friends')</h3>
        </div>

        <div class="home-area">
            <div class="row">
                @foreach ($allFriends as $u)
                    <div class="col-4">
                        <div class="card card-hover">
                            <div class="card-header">
                                <h6 style="margin:0">{{ $u->name }}</h6>
                                <p style="margin:0; font-size: 0.7rem; font-kerning: auto; padding:0;">{{ $u->fieldsOfWork }}</p>
                            </div>
                            <div class="card-body" style="margin:0; padding:0">
                                <img src="images/photo1.png" style="width: 20vw; height: 40vh" alt="">
                            </div>
                            <div class="card-footer">
                                {{-- <form method="POST" action="{{ route('message.show', $u->id) }}">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $u->id }}">
                                    <button type="submit" style="border: none; background:none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="rgb(50, 107, 198)" class="bi bi-telephone" viewBox="0 0 16 16">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                        </svg>
                                    </button>
                                </form> --}}
                                <a href="{{ route('message.show', $u->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="rgb(50, 107, 198)" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection