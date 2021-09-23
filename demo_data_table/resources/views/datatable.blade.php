@extends('layouts.applay')

@section('contents')
    {!! $data_table->table() !!}
@endsection

@push('scripts')
    {!! $data_table->scripts() !!}
@endpush