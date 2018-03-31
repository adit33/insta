@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Schedule Upload</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('instaaccount.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Akun</label>

                            <div class="col-md-6">
                                <select name="" class="form-control" id="">
                                    <option value="">Select Akun</option>
                                    @foreach(App\Models\InstaAccount::all() as $account)
                                        <option value="{{ $account->user_id }}">{{ $account->user_id }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">photo</label>

                            <div class="col-md-6">
                                <input type="file" name="photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Caption</label>

                            <div class="col-md-6">
                                <input type="text" name="caption" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Tanggal</label>

                            <div class="col-md-6">
                                <input type="text" name="date" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
