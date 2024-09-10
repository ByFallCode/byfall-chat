@extends('admin.layout')
@section('main')
<div class="row">
    <div class="col-sm-9">
        <h1>Editer le role de l'utilisateur {{ $user->name }}</h1>
    </div>

        <div class="col-sm-3">
            <a class="btn btn-success float-right"
               href="{{ route('users.index') }}">
                <i class="fa fa-th-list text-light"></i> liste
            </a>
        </div>
    @else
        <div class="col-sm-3">
            <a class="btn btn-primary float-right"
               href="/">
                <i class="fa fa-th text-light"></i> Tableau de bord
            </a>
        </div>
    @endif
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div style="display: none">
        {!! Form::text('name', $user->name) !!}
        {!! Form::email('email', $user->email) !!}
        {!! Form::number('id', $user->id) !!}
        {!! Form::text('password', $user->password) !!}
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label class="col-form-label">Assigner role:</label>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control select2bs4')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 offset-3">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</div>
{!! Form::close() !!}

@endsection
