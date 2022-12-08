@extends('layouts.master')

@section('title','Profile Lists')
@section('content')
    <div class="div col-md-12">
        <a class="btn btn-primary mt-2" href="{{route('profile.create')}}">Create a new profile</a>
    </div>
    <div class="div col-md-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>
                <th scope="col">Photo</th>
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
                <td><img width="100" height="100" src="{{asset('uploads')}}/{{$profile->photo}}" alt=""></td>
                <td class="">
                  <a href="{{route('profile.edit',$profile->id)}}" class="btn btn-info">Edit</a>
                  <form action="{{route('profile.destroy',$profile->id)}}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
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