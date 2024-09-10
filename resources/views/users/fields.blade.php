<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>
    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>
<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Roles:') !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles : null, ['class' => 'form-control select2bs4']) !!}
</div>

<!-- Permission Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Permission:') !!}
    {!! Form::select('permissions[]', $permissions, isset($user) ? $user->permissions : null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>
