@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Créer un Type Document</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => 'typeDocuments.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('type_documents.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('typeDocuments.index') }}" class="btn btn-default">Annuler</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
