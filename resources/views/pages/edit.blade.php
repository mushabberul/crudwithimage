@extends('layouts.master')
@section('title','Profile Edit')

@section('content')
<div class="container">
    <div class="col-md-6 m-auto mt-2">
        <div class="card">
            <div class="card-header">
              Profile Edit
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('profile.update',$profile->id)}}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input value="{{$profile->name}}" type="text" class="form-control" id="name" name="name">
                      @error('name')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input value="{{$profile->email}}" type="email" class="form-control" name="email" id="email">
                      @error('email')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="number" class="form-label">Number</label>
                      <input value="{{$profile->number}}" type="number" name="number" class="form-control" id="number">
                      @error('number')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    {{-- <div class="mb-3">
                      <label class="form-label" for="photo">Select a photo</label>
                      <input type="file" class="form-control" id="photo" name="photo">
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
    </div>
</div>
@endsection