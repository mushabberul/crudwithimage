@extends('layouts.master')
@section('title','Profile Edit')
@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('content')
<div class="container">
    <div class="col-md-6 m-auto mt-2">
        <div class="card">
            <div class="card-header">
              Profile Edit
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('profile.update',$profile->id)}}" enctype="multipart/form-data">
                  @csrf
                    @method('PUT')
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
                    <input type="file" name="photo" class="imageshow" data-default-file="{{asset('uploads')}}/{{$profile->photo}}" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
          </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
  $('.imageshow').dropify({
      messages: {
          'default': 'Drag and drop a file',
          'replace': 'Drag and drop or click to replace',
          'remove':  'Remove',
          'error':   'Ooops, something wrong happended.'
      }
    });
</script>
@endpush