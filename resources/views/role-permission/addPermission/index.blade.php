@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                   <h4>Role</h4>
                   <a class="btn btn-primary float-end" href="{{route('role.create')}}">Add Role</a>
                </div>
                @if(session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Role Title</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($role as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->guard_name }}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{ route('getPerRole', $data->id) }}">Add Permission</a>
                                                <li><a href="{{ route('role.edit', $data->id) }}">Edit</a>
                                                <li>
                                                  <form action="{{route('role.delete',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">Delete</button>
                                                  </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
