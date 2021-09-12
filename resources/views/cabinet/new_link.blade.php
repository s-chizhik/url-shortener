@extends('base')

@section('content')
    <div class="row">
        <div class="col-8 offset-2">

            <div class="card">
                <div class="card-header">
                    <h5>New Link</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{route('dashboard.links.new')}}">
                        @csrf

                        <div class="form-floating mb-3 is-invalid">
                            <input type="url" class="form-control @error('url') is-invalid @enderror" id="inputUrl"
                                   placeholder="https://google.com" required name="url" value="{{old('url')}}">
                            <label for="inputUrl">Destination URL</label>
                            @error('url')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3 is-invalid">
                            <input type="datetime-local" class="form-control @error('ttl') is-invalid @enderror" id="inputTtl"
                                   name="ttl" value="{{old('ttl')}}">
                            <label for="inputTtl">Time to live</label>
                            @error('ttl')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <em class="fas fa-save"></em>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
