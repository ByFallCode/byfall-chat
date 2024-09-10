<div>
    @if($i->created_by != null)
    <i class="fas fa-user {{Auth::user()->id === $i->created_by->id ? 'bg-green' : 'bg-warning'}}"></i>
    <div class="timeline-item">
        <span class="time"><i class="fas fa-clock"></i> {{$i->date}}</span>
        <h3 class="timeline-header no-border"><a
                href="{{ route('users.show', [$i->created_by->id]) }}">{{Auth::user()->id == $i->created_by->id ? "Moi" : $i->created_by->name}}</a>
            Objet : <span class="text-success">{{ $i->title}}</span></h3>
        <div class="timeline-body">
            {{ $i->message}}
            @if(Auth::user()->id === $i->created_by->id)
                <a class="btn btn-danger btn-xs float-right" href="{{ url('chat/destroy', [$i->id]) }}"
                   >
                    <i class="far fa-trash-alt"></i>
                </a>
                {{--<a class="btn btn-warning btn-xs mx-1 float-right" href="{{ url('chat/destroy', [$i->id]) }}"  onclick="return confirm('Are you sure?')">
                    <i class="fa fa-pen"></i>
                </a>--}}
            @endif
        </div>
        @if($i->attachment)
            <hr>
            <div class="info-box-content mx-2">
                <span class="info-box-number text-center text-muted mb-0"><a target="_blank" href="{{ URL::asset($i->attachment) }}">Consulter le fichier joint <i class="fa fa-file-alt"></i></a></span>
            </div>
        @endif
    </div>
    @endif
</div>
