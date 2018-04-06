@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Schedule Upload</div>

                <div class="panel-body">
                    {!! Form::model($schedule,['class'=>'form-horizontal','url'=>route('schedule.update',$schedule->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Jadwal</label>

                            <div class="col-md-6">
                                <div class='input-group date' id='datetimepicker1'>
                                    {!! Form::text('time',null,['class'=>'form-control']) !!}
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
        
                    
                   

    
                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Akun</label>

                            <div class="col-md-6">
                     
                                    {!! Form::select('insta_account_id',App\Models\InstaAccount::pluck('user_id','id'),null,['class'=>'form-control']) !!}

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
                                {!! Form::textarea('caption',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
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

