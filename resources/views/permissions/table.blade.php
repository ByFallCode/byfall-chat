<div class="table-responsive px-4 py-4">
    <table id="example1" class="table table-bordered table-striped text-center">
       <thead>
        <tr>
            <th>Name</th>
        <th>Slug</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
            <td>{{ $permission->slug }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {{--<a href="{{ route('permissions.show', [$permission->id]) }}"
                           class='btn btn-success  mx-2'>
                            <i class="far fa-eye"></i>
                        </a>--}}
                        <a href="{{ route('permissions.edit', [$permission->id]) }}"
                           class='btn btn-warning  mx-2'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger  mx-2', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
