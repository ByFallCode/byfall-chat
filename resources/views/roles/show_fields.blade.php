<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Slug Field -->
<div class="col-sm-12">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $role->slug }}</p>
</div>

<h3>Permissions</h3>
<table class="table table-responsive">
    @foreach($role->permissions as $permission)
        <tr>
            <td>{{$permission->name}}</td>
        </tr>
    @endforeach
</table>
