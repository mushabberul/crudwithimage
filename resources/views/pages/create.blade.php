@extends('layouts.master')
@section('title','Profile Create')

@section('content')
<div class="container">
    <div class="col-md-8 m-auto mt-2">
        <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('store')}}">
                  @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name">
                      @error('name')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" id="email">
                      @error('email')
                        <div class="text-danger">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="number" class="form-label">Number</label>
                      <input type="number" name="number" class="form-control" id="number">
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