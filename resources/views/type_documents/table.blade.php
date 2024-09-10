<div class="table-responsive px-4 py-4">
    <table id="example1" class="table table-bordered table-striped text-center">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($typeDocuments as $typeDocument)
            <tr>
                <td>{{ $typeDocument->nom }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['typeDocuments.destroy', $typeDocument->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('typeDocuments.show', [$typeDocument->id]) }}"
                           class='btn btn-primary btn-sm mx-2'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('typeDocuments.edit', [$typeDocument->id]) }}"
                           class='btn btn-warning btn-sm mx-2'>
                            <i class="far fa-edit"></i>
                        </a>

                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger mx-2', 'onclick' => "return confirm('Are you sure?')"])  !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
