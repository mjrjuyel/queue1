@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                   <h4>User</h4>
                   <a class="btn btn-primary float-end" href="{{route('user.create')}}">Add User</a>
                </div>
                @if(session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{ route('user.edit', $data->id) }}">Edit</a>
                                                <li>
                                                  <form action="{{route('user.delete',$data->id)}}" method="post">
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
