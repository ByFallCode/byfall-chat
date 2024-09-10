@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documents</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-success float-right"
                       href="{{ route('documents.create') }}">
                        Ajouter <i class="fa fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('documents.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

