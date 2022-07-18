@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! $qr !!}
{{--                    <img src="{{ $qr }}">--}}
{{--                    {{ __('You are logged in!') }}--}}

                    <form method="post" action="{{ route('check') }}">
                        @csrf
                        <input type="text" name="code">
                        <button type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
