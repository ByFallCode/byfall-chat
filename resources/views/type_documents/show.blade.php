@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details du Type Document </h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('typeDocuments.index') }}">
                        <i class="fa fa-th-list text-light"></i> liste
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-6 border">
                        {!! Form::label('name', "Crée par l'utilisateur:") !!}
                        <p>{{ $typeDocument->created_by !=null ? ucfirst($typeDocument->created_by->name ) : '---'}}</p>
                    </div>
                    <div class="col-sm-6 text-right border">
                        {!! Form::label('etat', "Nombre de document de ce type: ") !!}
                        <p> <span class="badge-success font-weight-bold px-3 h5">{{ $typeDocument->documents->count() }}</span></p>
                    </div>
                </div>
                @include('type_documents.show_fields')
            </div>
        </div>
    </div>
@endsection
