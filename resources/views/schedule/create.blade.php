@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Schedule Upload</div>

                <div class="panel-body">
                    <form class="form-horizontal" enctype='multipart/form-data' method="POST" action="{{ route('schedule.store') }}">
                        {{ csrf_field() }}

         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Tanggal</label>

                            <div class="col-md-6">
                               <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="time" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Akun</label>

                            <div class="col-md-6">
                                <select name="insta_account_id" class="form-control" id="">
                                    <option value="">Select Akun</option>
                                    @foreach(App\Models\InstaAccount::all() as $account)
                                        <option value="{{ $account->id }}">{{ $account->user_id }}</option>
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
                                <textarea name="caption" class="form-control"></textarea>
                            </div>
                        </div>

            
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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


@push('scripts')
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format:'YYYY-MM-DD HH:mm'
                });
            });
        </script>
@endpush

