@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    {!! Form::open(['route' => 'permissions.store']) !!}

                            <!-- Name Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::label('name', 'Permission:') !!}
                                {!! Form::text('name', null, ['class' => 'form-control-sm','maxlength' => 255,'maxlength' => 255]) !!}
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('permissions.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

