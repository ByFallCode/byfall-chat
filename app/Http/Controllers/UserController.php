<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
class UserController extends Controller
{
    private $page_title = "Gestion des utilisateurs";

    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users)->with('page_title', $this->page_title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = \App\Models\Role::pluck('name', 'id')->all();

        $permissions = Permission::pluck('name', 'id')->all();
        return view('users.create')->with(compact('roles', 'permissions'))->with('page_title', $this->page_title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
/*        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);*/

        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        $user = $this->userRepository->create($input);

        $roles = $request->roles;

        $permissions = $request->permissions;

        $user->roles()->attach($roles);

        $user->permissions()->attach($permissions);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        return view('users.show',compact('user'))->with("page_title", $this->page_title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $roles = \App\Models\Role::pluck('name', 'id')->all();

        $permissions = Permission::pluck('name', 'id')->all();

        return view('users.edit')->with('user', $user)->with(compact('roles', 'permissions'))->with("page_title", $this->page_title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);

        $user->roles()->detach($user->roles);
        $user->permissions()->detach($user->permissions);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input = $request->all();

        if($request->password == null) {
            $input['password'] = $user->password;
        } else {
            $input['password'] = bcrypt($request->password);
        }

        $user = $this->userRepository->update($input, $id);

        $roles = $request->roles;

        $permissions = $request->permissions;

        $user->roles()->attach($roles);

        $user->permissions()->attach($permissions);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request->id);
        if (empty($user)) {
            Flash::error('User non trouvé');

            return redirect(back());
        }

        //$user = User::update($request->all(), $request->id);
        $user->password = Hash::make($request->password);
        $user->password_change = true;
        $user->save();


        return redirect()->route('users.index')->with('success','Mot de pass changer avec succés');
    }
}
