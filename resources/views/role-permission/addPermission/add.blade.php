@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>{{$role->name}}</h4>
                    <a class="btn btn-primary float-end" href="{{ route('role') }}">Role</a>
                </div>
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-8 offset-2">
                                    <form action="{{ route('getPerRole.insert') }}" method="post">
                                        @csrf
                                        @if (Session::has('success'))
                                            <div class="alert alert-primary">
                                                <h5 class="text-dark">{{ Session::get('success') }}</h5>
                                            </div>
                                        @endif
                                        @csrf
                                            <input type="hidden" class="form-control" id="exampleInputEmail1"
                                                name="id" value="{{$role->id}}">
                                        <div class="mb-3">
                                           <div class="row">
                                            @foreach($permissions as $permission)
                                            <div class="col-md-3">
                                                <label for="exampleInputEmail1" class="form-label">{{$permission->name}}</label>
                                                <input type="checkbox" id="exampleInputEmail1"
                                                    name="permission[]" value="{{$permission->name}}" {{ in_array($permission->id,$rolePermission,TRUE) ?'Checked' : ' '}}>
                                            </div>
                                            @endforeach
                                           </div>
                                         
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