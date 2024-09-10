<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Nom') !!}
    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Email') !!}
    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Mot de passe') !!}
    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Confirmer mot de passe') !!}
    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
</div>

<div class="col-xs-6 col-sm-6 col-md-12">
    <div class="form-group">
        <strong>Role:</strong>
        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select2bs4','multiple')) !!}
    </div>
</div>
