<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Type Document Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_document_id', 'Type Document Id:') !!}
    {!! Form::select('type_document_id', $typeDocument, old('type_document_id'), ['class' => 'form-control select2bs4']) !!}

</div>

<div class="form-group col-md-6">
    {!! Form::label('type_document_id', 'Importer le document') !!}
    <input type="file" name="fichier" class="form-control">
</div>
