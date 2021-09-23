@extends('layouts.applay')

@section('content')

<div class="container">
<table class="table table-stripped">
{!! $dataTable->table([],true) !!}
</table>
</div>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
{!! $dataTable->scripts() !!}
@endpush