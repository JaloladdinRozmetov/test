@extends('layouts.main')
@push('css')
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <section>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                {{Session::get('success')}}
            </div>
        @endif
            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                <tr><th class="sorting sorting_asc" >Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>SKU Code</th>
                    <th>Image</th></tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr class="odd">
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->sku_code}}</td>
                        <td><img src="{{asset('storage/'.$product->image)}}" width="40" height="40" alt="" /></td>
                        <td>
                            <form action="{{route('buyer-product.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="hidden" name="buyer_id" value="{{$buyer_id}}">
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
    </section>
@endsection



