@extends('layout.master')

@section('title', 'Home Page')

@section('activeHome', 'active')

@section('content')
        <div class="title-area">
            <h3>@lang('translation.Find Your Friends')</h3>
        </div>

        <div class="search-area" style="display: flex; justify-content: center;">
            <form method="GET" action="{{ route('user.index') }}">
                <div class="mb-5" style="display: flex; justify-content:center; align-items:center">
                    
                    <div class="mr-3">
                        <!-- Dropdown Filter -->
                        <select name="gender" class="form-select" style="margin-right: 2rem; height:2.3rem">
                            <option value="">@lang('translation.Gender')</option>
                            <option value="Male">@lang('translation.Male')</option>
                            <option value="Female">@lang('translation.Female')</option>
                        </select>
                    </div>

                    <div class="mr-3">
                        <!-- Dropdown Filter -->
                        <select name="fieldsOfWork" class="form-select" style="margin-right: 2rem; height: 2.3rem;">
                            <option value="">@lang('translation.Fields')</option>
                            <!-- Replace the following options with dynamic fields from your database if necessary -->
                            <option value="Business & Management">Business & Management</option>
                            <option value="Food & Beverages">Food & Beverages</option>
                            <option value="Science & Technology">Science & Technology</option>
                            <option value="Education">Education</option>
                            <option value="Entertainment & Arts">Entertainment & Arts</option>
                            <option value="Law & Politic">Law & Politic</option>
                            <option value="Finance & Consulting">Finance & Consulting</option>
                        </select>
                    </div>

                    <div class="" style="display:flex; justify-content:center; align-items:center; margin-right:1rem">
                        <input type="text" class="form-control" style="width: 30rem" id="search" name="search" placeholder="@lang('translation.Search here')" value="{{ request('search') }}">
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">@lang('translation.Search')</button>
                    </div>
                </div>
            </form>

            
        </div>




        <div class="home-area">
            <div class="row">
                @foreach ($allUsers as $u)
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
                                <form method="POST" action="{{ route('requests.store') }}">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $u->id }}">
                                    <button type="submit" style="border: none; background:none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="25" fill="rgb(50, 107, 198)" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection