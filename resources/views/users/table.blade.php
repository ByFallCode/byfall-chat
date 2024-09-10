<div class="table-responsive px-4 py-4">
    <table id="example1" class="table table-bordered table-striped text-center">
       <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}"
                           class='btn btn-primary mx-2'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('users.edit', [$user->id]) }}"
                           class='btn btn-warning mx-2'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit',  'class' => 'btn btn-danger mx-2', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
