@extends('base')

@section('content')
    <div class="row">
        <div class="col-2 offset-5 d-grid gap-2">
            <a href="{{route('oauth.google')}}" class="btn btn-danger">
                <em class="fab fa-google"></em>
                Google
            </a>
        </div>
    </div>
@endsection
