<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ByFall Code</title>
    <link rel="shortcut icon" type="images/png" href="{{ URL::asset("images/logo-bycode.png") }}"/>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ App::get('Params')->name }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/toastr/toastr.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- DataTables -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>

    <style type="text/css">

        hr.hr-text {
            position: relative;
            border: none;
            height: 1px;
            background: #999;
        }

        hr.hr-text::before {
            content: attr(data-content);
            display: inline-block;
            background: #fff;
            font-weight: bold;
            font-size: 0.85rem;
            color: #999;
            border-radius: 30rem;
            padding: 0.2rem 2rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>

</head>
<body class="hold-transition">
<!-- Site wrapper -->
<div class="wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3 bg-gradient-green py-2 shadow-lg">
                <div class="col-md-8">
                    <marquee behavior="alternate" direction=""><h1 class="text-light">Bienvenue sur la plateforme d'administration de ByFall Code</h1></marquee>
                </div>
                <div class="col-md-2">
                    <a href="#" class="brand-link float-sm-right">
                        <img src="{{ URL::asset(App::get('Params')->logo) }}" alt="AdminLTE Logo" class="brand-image"
                             style="opacity: .8; height: 100px">
                    </a>
                </div>
                <div class="col-md-2">
                    <span class=" float-sm-right">
                        @if (Route::has('login'))
                            @auth
                            <a href="{{ url('home') }}" class="btn btn-outline-secondary text-light">Tableau de bord <i class="fa fa-chess-board"></i></a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary text-light">Se connecter <i class="fa fa-user"></i></a>
                            @endauth
                        @endif
                    </span>
                </div>
            </div>
            <div class="row mx-4">
                <div class="col-md-12 text-center">
                    <img src="{{ URL::asset("images/logo-bycode.png") }}" alt="">
                    <hr>
                </div>
            </div>
            <div class="row my-5  mx-4">
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header text-center bg-lime">
                            <h4>
                                Les derniers informations partagées
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="timeline">
                                <!-- /.timeline-label -->
                            @foreach($chats as $i)
                                <!-- timeline item -->
                                    @include("chat.message")
                                    <!-- END timeline item -->
                                @endforeach
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="card">
                        <div class="card-header text-center bg-success">
                            <h4>
                                Programme du jour
                            </h4>
                        </div>
                        <div class="card-body">
                            @foreach($programmes as $programme)
                                <div class="list-group-item">
                                    {{ $programme->emission != null ? $programme->emission->nom : 'non renseigné' }} :
                                    <span class="badge-primary">{{ $timeLists[$programme->heureDebut] }}</span>
                                    <span class="badge-warning">{{ $timeLists[$programme->heureFin] }}</span> <br>
                                    <b><u>Participants :</u></b><br>
                                    <table class="table">
                                        @if(count($programme->employes) > 0)
                                            <tr>
                                                @foreach($programme->employes as $emp)
                                                    <td class="border">
                                                        {{$emp->prenom}} {{$emp->nom}}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @else
                                            <span class="badge-warning">Pas de participants</span>
                                        @endif
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="row my-2">
                <h3 class="bg-success">Voici un vidéo démo de l'application</h3>

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/8LjBPQzBCIM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>-->
        </div>
        <!-- /.col -->
    </div>
</div>
<!-- /.content-wrapper -->
</body>
</html>
