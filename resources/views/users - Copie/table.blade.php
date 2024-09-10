<div class="table-responsive px-4 py-4">
    <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td class="text-center">
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                    <a href="{{ route('users.show',$user->id) }}"
                       class='btn btn-success'>
                        <i class="far fa-eye"></i>
                    </a>
                    <a href="{{ route('users.edit',$user->id) }}"
                       class='btn btn-warning'>
                        <i class="far fa-edit"></i>
                    </a>

                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger mx-2', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
