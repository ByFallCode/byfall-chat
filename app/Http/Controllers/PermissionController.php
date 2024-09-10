<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Repositories\PermissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Response;

class PermissionController extends AppBaseController
{
    /** @var PermissionRepository $permissionRepository*/
    private $permissionRepository;
    private $page_title = "Permissions";


    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*//dd(Auth::user()->can("read-permissions"));
        if(!Auth::user()->can("read-permissions")) {
            abort(401);
        }*/
        $permissions = $this->permissionRepository->all();
        return view('permissions.index')
            ->with('permissions', $permissions)->with('page_title', $this->page_title);
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        return view('permissions.create')->with('page_title', $this->page_title);
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
            $input = $request->all();
            $input['slug'] = Str::slug($request->name, "-");
            $permission = $this->permissionRepository->create($input);

            Flash::success('Permission saved successfully.');

            return redirect(route('permissions.index'));
    }

    /**
     * Display the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.show')->with('permission', $permission)->with('page_title', $this->page_title);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

        return view('permissions.edit')->with('permission', $permission)->with('page_title', $this->page_title);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param int $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePermissionRequest $request)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }
        $input = $request->all();
        $input['slug'] = Str::slug($request->name, "-");

        $permission = $this->permissionRepository->update($input, $id);

            Flash::success('Permission updated successfully.');

            return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $permission = $this->permissionRepository->find($id);

        if (empty($permission)) {
            Flash::error('Permission not found');

            return redirect(route('permissions.index'));
        }

            $this->permissionRepository->delete($id);
            Flash::success('Permission deleted successfully.');
            return redirect(route('permissions.index'));
    }
}
