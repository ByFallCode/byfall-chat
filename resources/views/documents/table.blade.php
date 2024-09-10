<div class="table-responsive px-4 py-4">
    <table id="example1" class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>Nom</th>
        <th>Type de Document</th>
        <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <td>{{ $document->nom }}</td>
            <td>{{ $document->typeDocument->nom }}</td>
            <td>{{ $document->date }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('documents.show', [$document->id]) }}"
                           class='btn btn-primary mx-2'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('documents.edit', [$document->id]) }}"
                           class='btn btn-warning mx-2'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger mx-2', 'onclick' => "return confirm('Are you sure?')"]) !!}

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
