@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>User</h4>
                    <a class="btn btn-primary float-end" href="{{ route('user') }}">User</a>
                </div>
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    <form action="{{ route('user.insert') }}" method="post">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div class="alert alert-primary">
                                                <h5 class="text-dark">{{ Session::get('success') }}</h5>
                                            </div>
                                        @endif
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">User Name: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="name" aria-describedby="emailHelp">

                                            @error('name')
                                                <alert class="aleart text-danger">{{ $message }}</alert>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">User Email: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="email" aria-describedby="emailHelp">

                                            @error('email')
                                                <alert class="aleart text-danger">{{ $message }}</alert>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">User PAssword: </label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="password" aria-describedby="emailHelp">

                                            @error('password')
                                                <alert class="aleart text-danger">{{ $message }}</alert>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Role Name: </label>
                                            <select type="text" class="form-control" name="role[]" multiple>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('role')
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

    <script>
        $(document).ready(function() {
          $('#multi-select').select2({
            placeholder: "Select options",
            allowClear: true
          });
        });
      </script>
@endsection