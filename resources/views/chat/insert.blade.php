<form action="{{ url('insertMessage') }}" enctype="multipart/form-data" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="title" class="control-label">Objet</label>
        <input type="text" name="title" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="message" class="control-label">Message</label>
        <textarea name="message" cols="20" rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('attachment', 'Attacher un document') !!}
        <input type="file" name="attachment" class="form-control">
    </div>
    <div class="form-group col-sm-12">
        {!! Form::label('users', 'Destinataire:') !!}
        {!! Form::select('users[]', $users, null, ['class' => 'form-control select2bs4', 'multiple' => 'multiple']) !!}
    </div>
    <div class="form-group">
        <button id="add_op" class="btn btn-primary">Envoyer</button>
    </div>
</form>
