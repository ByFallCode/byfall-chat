<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>


{{--
<!-- Permission Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Permission:') !!}
    {!! Form::select('permissions[]', $permissions, isset($role) ? $role->permissions : null, ['class' => 'form-control select2bs4', 'multiple' => 'multiple']) !!}
</div>
--}}
