<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Models\TypeDocument;
use App\Repositories\DocumentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DocumentController extends AppBaseController
{
    /** @var  DocumentRepository */
    private $documentRepository;
    private $entity = "documents";

    private $page_title = "Document";

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the Document.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documents = $this->documentRepository->all();

        return view('documents.index')->with("page_title", $this->page_title)
            ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new Document.
     *
     * @return Response
     */
    public function create()
    {
        $typeDocument = TypeDocument::pluck('nom', 'id')->all();
        $typeDocument = [null => '- Choisir -'] + $typeDocument;
        return view('documents.create')->with("page_title", $this->page_title)->with(compact('typeDocument'));
    }

    /**
     * Store a newly created Document in storage.
     *
     * @param CreateDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentRequest $request)
    {
        $input = $request->all();

        $document = $this->documentRepository->create($input);

        $path = "";
        if ($request->file('fichier')) {
            $fichier = $request->file('fichier');
            $name = $fichier->getClientOriginalName();
            $fichier->move("fichiers", $name);
            $path = "fichiers/".$name;
            $document->fichier = $path;
            $document->save();
        }

        Flash::success('Document enregistré avec succés!.');

        return redirect(route('documents.index'));
    }

    /**
     * Display the specified Document.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document non retrouvé');

            return redirect(route('documents.index'));
        }

        return view('documents.show')->with('document', $document)->with("page_title", $this->page_title);
    }

    /**
     * Show the form for editing the specified Document.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->find($id);

        $typeDocument = TypeDocument::pluck('nom', 'id')->all();
        $typeDocument = [null => '- Choisir -'] + $typeDocument;

        if (empty($document)) {
            Flash::error('Document non retrouvé');

            return redirect(route('documents.index'));
        }

        return view('documents.edit')->with("page_title", $this->page_title)->with(compact('document', 'typeDocument'));
    }

    /**
     * Update the specified Document in storage.
     *
     * @param int $id
     * @param UpdateDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document non retrouvé');

            return redirect(route('documents.index'));
        }

        $document = $this->documentRepository->update($request->all(), $id);

        Flash::success('Document modifié avec succés.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document non retrouvé');

            return redirect(route('documents.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document  supprimé avec succés.');

        return redirect(route('documents.index'));
    }
}
