@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Role</h4>
                    <a class="btn btn-primary float-end" href="{{ route('role') }}">Role</a>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <form action="{{ route('role.update', $edit->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @if (Session::has('success'))
                                <div class="alert alert-primary">
                                    <h5 class="text-dark">{{ Session::get('success') }}</h5>
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Role Name: </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                                    value="{{ $edit->name }}">
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
    @endsection
