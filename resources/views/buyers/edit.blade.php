@extends('layouts.main')

@section('content')

    <div class="container-fluid">
        @if (Session::has('errors'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <ul class="list-unstyled">
                    @foreach (Session::get('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h2 class="card-title">Create Buyer</h2>
                    </div>
                    <form action="{{ route('buyer.update',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" value="{{ old('first_name',$item->first_name) }}" id="first_name" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" value="{{ old('last_name',$item->last_name) }}" id="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email',$item->email) }}" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" value="{{ old('phone_number',$item->phone_number) }}" name="phone_number" placeholder="Phone Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label><br>
                                <img src="{{asset('storage/'.$item->image)}}" class="image m-1" width="40" height="40" alt="">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" value="{{ old('image',$item->image) }}" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
