@extends('layouts.master')

@section('title','Profile Lists')
@section('content')
    <div class="div col-md-12">
        <a class="btn btn-primary mt-2" href="{{route('create')}}">Create a new profile</a>
    </div>
    <div class="div col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($profiles as $profile)
              <tr>
                <th scope="row">{{$profile->id}}</th>
                <td>{{$profile->name}}</td>
                <td>{{$profile->email}}</td>
                <td>{{$profile->number}}</td>
                <td class="d-flex">
                  <a href="{{route('edit',$profile->id)}}" class="btn btn-info">Edit</a>
                  <form action="{{route('destroy',$profile->id)}}" method="post">
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              @empty
                  <td colspan="999" class="text-center">Not Found</td>
              @endforelse
              
            </tbody>
          </table>
    </div>
@endsection