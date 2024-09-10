<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeDocumentRequest;
use App\Http\Requests\UpdateTypeDocumentRequest;
use App\Repositories\TypeDocumentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TypeDocumentController extends AppBaseController
{
    /** @var  TypeDocumentRepository */
    private $typeDocumentRepository;

    private $page_title = "Type de document";
    private $entity = "type-documents";


    public function __construct(TypeDocumentRepository $typeDocumentRepo)
    {
        $this->typeDocumentRepository = $typeDocumentRepo;
    }

    /**
     * Display a listing of the TypeDocument.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $typeDocuments = $this->typeDocumentRepository->all();

        return view('type_documents.index')->with('page_title', $this->page_title)
            ->with('typeDocuments', $typeDocuments);
    }

    /**
     * Show the form for creating a new TypeDocument.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_documents.create')->with('page_title', $this->page_title);
    }

    /**
     * Store a newly created TypeDocument in storage.
     *
     * @param CreateTypeDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeDocumentRequest $request)
    {
        $input = $request->all();

        $typeDocument = $this->typeDocumentRepository->create($input);

        Flash::success('Type Document enregistré avec succés!.');

        return redirect(route('typeDocuments.index'));
    }

    /**
     * Display the specified TypeDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            Flash::error('Type Document non retrouvé');

            return redirect(route('typeDocuments.index'));
        }

        return view('type_documents.show')->with('page_title', $this->page_title)->with('typeDocument', $typeDocument);
    }

    /**
     * Show the form for editing the specified TypeDocument.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            Flash::error('Type Document non retrouvé');

            return redirect(route('typeDocuments.index'));
        }

        return view('type_documents.edit')->with('page_title', $this->page_title)->with('typeDocument', $typeDocument);
    }

    /**
     * Update the specified TypeDocument in storage.
     *
     * @param int $id
     * @param UpdateTypeDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeDocumentRequest $request)
    {
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            Flash::error('Type Document non retrouvé');

            return redirect(route('typeDocuments.index'));
        }

        $typeDocument = $this->typeDocumentRepository->update($request->all(), $id);

        Flash::success('Type Document modifié avec succés.');

        return redirect(route('typeDocuments.index'));
    }

    /**
     * Remove the specified TypeDocument from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeDocument = $this->typeDocumentRepository->find($id);

        if (empty($typeDocument)) {
            Flash::error('Type Document non retrouvé');

            return redirect(route('typeDocuments.index'));
        }

        $this->typeDocumentRepository->delete($id);

        Flash::success('Type Document  supprimé avec succés.');

        return redirect(route('typeDocuments.index'));
    }
}
