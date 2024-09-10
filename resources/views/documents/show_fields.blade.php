
<div class="row mt-5">
    <div class="col-12 col-sm-6">
        <div class="info-box bg-light">
            <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Nom du document</span>
                <span class="info-box-number text-center text-muted mb-0">{{ $document->nom }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="info-box bg-light">
            <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Type de document</span>
                <span class="info-box-number text-center text-muted mb-0">{{ $document->typeDocument->nom }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12">
        <div class="info-box bg-light">
            <div class="info-box-content">
                <span class="info-box-text text-center text-muted">Consulter le fihier</span>
                <span class="info-box-number text-center text-muted mb-0"><a target="_blank" href="{{ URL::asset($document->fichier) }}">{{ $document->nom }} <i class="fa fa-external-link-alt"></i></a></span>
            </div>
        </div>
    </div>
</div>
