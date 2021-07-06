@extends('layouts.main')
@section('content')
<div class="container">
    <h1>Welcome to my page</h1>
    @if(count($errors) > 0)
        {{ dd($errors) }}
    @endif

    @if (session('successMsg'))
    <div class="alert alert-success" role="alert">
        {{ session('successMsg') }}
    </div>

    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Nmae</th>
            <th scope="col">Last Nmae</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id }}</th>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td> <a class="btn btn-success btn-sm" href="{{ route('edit',$student->id )}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    || 
                     <a class="btn btn-danger btn-sm" href="{{ route('deleteData',$student->id )}}" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
              </tr>
            @endforeach
          
        </tbody>
    </table>
    {{ $students->links()}}
</div>

@endsection