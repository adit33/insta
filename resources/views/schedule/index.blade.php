@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">List Schedule Upload</div>
                    
                <div class="panel-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
{!! $dataTable->scripts() !!}
@endpush

