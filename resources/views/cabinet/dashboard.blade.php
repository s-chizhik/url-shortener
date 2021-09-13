@extends('base')

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Your links</h5>
                    <a class="btn btn-sm btn-primary" href="{{route('dashboard.links.new')}}">
                        <em class="fas fa-plus"></em>
                    </a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>URL</th>
                            <th>TTL</th>
                            <th>Visits</th>
                            <th>Share link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>{{$link->url}}</td>
                                <td>
                                    @if($link->ttl)
                                        {{$link->ttl->format('Y-m-d H:i')}}
                                    @else
                                        <em class="text-muted">not set</em>
                                    @endif
                                </td>
                                <td>{{$link->visits}}</td>
                                <td>{{route('redirect', ['shortLink' => $link->name])}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
