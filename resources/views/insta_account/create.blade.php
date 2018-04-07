@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register Account Instagram</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('instaaccount.store') }}">
                        {{ csrf_field() }}

                       @include('insta_account._form')
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
