<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateRoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Permissions\HasPermissionsTrait;
use App\Repositories\RoleRepository;
use Hamcrest\Util;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class RoleController extends AppBaseController
{
    /** @var RoleRepository $roleRepository */
    private $roleRepository;
    private $page_title = "Permissions";

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*if(!Utils::myHasPermission("read-roles")) {
            abort(401);
        }*/
        $roles = $this->roleRepository->all();

        return view('roles.index')->with('page_title', $this->page_title)
            ->with('roles', $roles);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::pluck('name', 'id')->all();
        $permissions = [null => '- Choisir -'] + $permissions;
        return view('roles.create')->with(compact('permissions'))->with('page_title', $this->page_title);
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        $permissions = $request->permissions;

        $role->permissions()->attach($permissions);

        Flash::success('Role saved successfully.');

        return redirect(route('roles.index'));

    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role)->with('page_title', $this->page_title);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        $permissions = Permission::pluck('name', 'id')->all();
        $permissions = [null => '- Choisir -'] + $permissions;

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.edit')->with('page_title', $this->page_title)->with(compact('role', 'permissions'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $role = $this->roleRepository->find($id);

        $role->permissions()->detach($role->permissions);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        //dd(Auth::user()->roles[0]->permissions);


        $role = $this->roleRepository->update($request->all(), $id);

        $permissions = $request->permissions;

        $role->permissions()->attach($permissions);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));

    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->find($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }


        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));

    }
}
