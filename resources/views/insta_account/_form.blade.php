<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">Name</label>
    <div class="col-md-6">
        {!! Form::text('user_id',null,['class'=>'form-control','required'=>'autofocus']) !!}
        @if ($errors->has('user_id'))
        <span class="help-block">
            <strong>{{ $errors->first('user_id') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>
    <div class="col-md-6">
        {!! Form::password('password',['class'=>'form-control']) !!}
        @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
        Register
        </button>
    </div>
</div>