@extends('layouts.app')


@section('additional-resources')
    <link rel="stylesheet" href="{{ asset('css/pfp.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Function to preview the uploaded image
        function previewImage(event) {
          var reader = new FileReader();
          reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
          }
          reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit your profile</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                    



                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="about me" class="col-md-4 col-form-label text-md-end">About me </label>

                                <div class="col-md-6">
                                    <input id="about_me" type="text" class="form-control @error('about_me') is-invalid @enderror" name="about_me" value="{{ $user->about_me }}" required autofocus>

                                    @error('about me')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Confirm edits
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
