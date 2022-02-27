@extends('layouts.main')
@section('content')
    <section>
        <div class="col-md-12">
            {!! $dataTable->table() !!}
        </div>
    </section>
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush



