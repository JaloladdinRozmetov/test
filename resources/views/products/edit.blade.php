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
                        <h2 class="card-title">Create Product</h2>
                    </div>
                    <form action="{{route('product.update',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control" name="product_name" value="{{ old('product_name',$item->product_name) }}" id="product_name" placeholder="Product Name" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control"  id="price" value="{{ old('price',$item->price) }}" name="price" placeholder="Price" required/>
                            </div>
                            <input type="hidden" value="{{ old('sku_code',$item->sku_code) }}" name="sku_code"/>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" value="{{ old('image',$item->image) }}" name="image" id="image" required>
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
