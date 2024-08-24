@extends('layout.master')

@section('title', 'Message Page')

@section('content')

        <div class="container-fluid" style="padding: 0; background-color: rgb(217, 224, 231)">

            <div class="title-area" style="display: flex; justify-content: center; align-items: center; height: 5rem">
                <h3>@lang('translation.Message')</h3>
            </div>

            <div class="card" style="margin-top:0; margin-left:3rem; margin-right:3rem; margin-bottom: 1rem">
                <div class="card-body">
                    <div class="chat-messages" style="height: 400px; overflow-y: auto;">
                        @foreach ($messages as $m)
                        <div
                        class="d-flex {{ $m->sender_id === auth()->user()->id ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                        <div class="message p-3 rounded-3 {{ $m->sender_id === auth()->user()->id ? 'bg-info text-white' : 'bg-light' }}"
                                        style="max-width: 75%;">
                                        <p class="mb-0">{{ $m->message }}</p>
                                        @if ($m->created_at)
                                            <p class="text-muted">{{ $m->created_at->format('H:i') }}</p>
                                        @else
                                            <p class="text-muted">--</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('message.store') }}" class="" style="padding-bottom:3rem; margin-left:3rem; margin-right:3rem; margin-top: 0">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="new_message" class="form-control" placeholder="Enter your message"
                        required>
                        <input type="hidden" name="friend_id" value="{{ $friend->id }}">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
    </div>
@endsection
                