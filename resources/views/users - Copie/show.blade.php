@extends('admin.layout')
@section('main')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Détails de l'utilisateur</h1>
                </div>

                    <div class="col-sm-6">
                        <a class="btn btn-success float-right"
                           href="{{ route('users.index') }}">
                            <i class="fa fa-th-list text-light"></i> liste
                        </a>
                    </div>
                @else
                    <div class="col-sm-6">
                        <a class="btn btn-success float-right"
                           href="/home">
                            <i class="fa fa-th text-light"></i> Tableau de bord
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">

                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/adminlte/img/avatar4.png" alt="user image">
                            <span class="username">
                          <a href="#">{{ $user->name }}.</a>
                        </span>
                            <span class="description">Incrit depuis - {{ $user->created_at }}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            <strong><i class="fa fa-envelope mr-1"></i> Email </strong>

                        <p class="text-muted">
                            {{ $user->email }}
                        </p>

                    </div>
                    <!-- /.post -->



                </div>
            </div>
        </div>
        @if(Auth::user()->id == $user->id)
            <div class="mb-3">
                <a id="change_pass_btn" class="btn btn-outline-success">Changer de mot de pass <i class="fa fa-user-edit"></i></a>
                <a id="not-change_pass_btn" class="btn btn-outline-danger" style="display: none">Annuler</a>
            </div>
        @endif

        <div class="card" id="change_pass" style="display: none">
            <form class="col" method="POST" action="{{ url('changePassword') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                    <div class="row">
                        <div style="display: none">
                            {!! Form::text('name', $user->name) !!}
                            {!! Form::email('email', $user->email) !!}
                            {!! Form::number('id', $user->id) !!}
                        </div>
                        <!-- Password Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('password', 'Nouveau mot de Pass:') !!}
                            {!! Form::password('password', ['class' => 'form-control','maxlength' => 255,'maxlength' => 255, 'required']) !!}
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('pswd2', 'Retapez le mot de pass:') !!}
                            <input type="password" id="password2" class="form-control">
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary', 'onclick' => 'matchPassword()']) !!}
                    <a href="{{ route('users.index') }}" class="btn btn-default">Annuler</a>
                </div>

            </form>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#change_pass_btn').click(function () {
                $('#change_pass').css("display", 'block');
                $('#not-change_pass_btn').css("display", 'inline');
                $('#change_pass_btn').css("display", 'none');
            });
            $('#not-change_pass_btn').click(function () {
                $('#change_pass').css("display", 'none');
                $('#password').val(null);
                $('#not-change_pass_btn').css("display", 'none');
                $('#change_pass_btn').css("display", 'inline');
            })
        })

        function matchPassword() {
            var pw1 = $("#password").val();
            var pw2 = $("#password2").val();
            if(pw1 !== pw2)
            {
                alert("Les mots de pass ne correspondent pas");
                event.preventDefault()
            }
        }

    </script>
@endsection
