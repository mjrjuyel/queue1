@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>Permision</h4>
                    <a class="btn btn-primary float-end" href="{{ route('permission') }}">Permission</a>
                </div>
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    <form action="{{ route('permission.insert') }}" method="post">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div id="aleartDiv" class="bg-info text-center"
                                                style="display:block; height:60px; width:100%">
                                                <h5 class="text-dark">{{ Session::get('success') }}</h5>
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Permission Name: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="name" aria-describedby="emailHelp">

                                            @error('name')
                                                <alert class="aleart text-danger">{{ $message }}</alert>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection