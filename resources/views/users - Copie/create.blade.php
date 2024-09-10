@extends('admin.layout')
@section('main')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Enregistrer un nouveau utilisateur</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('sorties.index') }}">
                        <i class="fa fa-th-list text-light"></i> liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

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

        <div class="card">

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

            <div class="card-body">

                <div class="row">
                    @include('users.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('users.index') }}" class="btn btn-default">Annuler</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>


@endsection
