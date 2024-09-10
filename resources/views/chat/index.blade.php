@extends('admin.layout')
@section('main')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-4">
                <h1>Messages de groupe</h1>
            </div>
            <div class="col-sm-8">
                <button type="button" class="btn btn-outline-primary mr-4 float-right" data-toggle="modal" data-target="#modal-xl">
                    Envoyer un message
                </button>
                <a href="{{ route('chat.send') }}" class="btn btn-outline-success mr-4 float-right" >
                    Boite d'envoie
                </a>
                <a href="{{ route('chat.direct') }}" class="btn btn-outline-warning mr-4 float-right" >
                    Boite de réception
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-center">
                        <h5>Envoyer un message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert bg-primary" style="display: none">

                                </div>
                                @include("chat.insert")
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-center">
                        <h5 class="text-center">Envoyer un message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="alert bg-primary" style="display: none">

                                </div>
                                @include("chat.insert")
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Timelime example  -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
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
            <!-- /.col -->
        </div>
    </div>
    <!-- /.timeline -->

</section>
<!-- /.content -->

<script>

    $(document).ready(function () {
        $("#edit_message").click(function () {
            $("#edit_form").show()
        })
    })

</script>

@endsection
