@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Document Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('documents.index') }}">
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
                        {!! Form::label('name', "Enregistré par l'utilisateur:") !!}
                        <p>{{ $document->created_by!= null ? ucfirst($document->created_by->name) : '----'}}</p>
                    </div>
                    <div class="col-sm-6 text-right border">
                        {!! Form::label('etat', "Date :") !!}
                        <p> <span class="badge-success font-weight-bold px-3 h5">{{date_format( $document->date , 'd-M-Y')  }}</span></p>
                    </div>
                </div>
                @include('documents.show_fields')
            </div>
        </div>
    </div>
@endsection
