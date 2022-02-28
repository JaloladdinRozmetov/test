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
        <div>
            <a href="{{route('product.create')}}" class="btn btn-success m-2">Create</a>
        </div>
        <div class="col-md-12">
            {!! $dataTable->table() !!}
        </div>
    </section>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush



