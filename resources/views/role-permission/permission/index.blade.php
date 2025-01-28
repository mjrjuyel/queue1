@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                   <h4>Permision</h4>
                   <a class="btn btn-primary float-end" href="{{route('permission.create')}}">Add Permission</a>
                </div>
                @if(session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card-body">
                    <div class="col-8 offset-2">
                        <table class="table">
                            <thead>
                                <th>Id</th>
                                <th>Permission Title</th>
                                <th>Guard Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($permission as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->guard_name }}</td>
                                        <td>
                                            <ul>
                                                <li><a href="{{ route('permission.edit', $data->id) }}">Edit</a>
                                                <li>
                                                  <form action="{{route('permission.delete',$data->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">Delete</button>
                                                  </form>
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
