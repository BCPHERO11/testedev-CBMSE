<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriasRequest;
use App\Http\Requests\UpdateCategoriasRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CategoriasRepository;
use Illuminate\Http\Request;
use Flash;

class CategoriasController extends AppBaseController
{
    /** @var CategoriasRepository $categoriasRepository*/
    private $categoriasRepository;

    public function __construct(CategoriasRepository $categoriasRepo)
    {
        $this->categoriasRepository = $categoriasRepo;
    }

    /**
     * Display a listing of the Categorias.
     */
    public function index(Request $request)
    {
        $categorias = $this->categoriasRepository->paginate(10);

        return view('categorias.index')
            ->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new Categorias.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created Categorias in storage.
     */
    public function store(CreateCategoriasRequest $request)
    {
        $input = $request->all();

        $categorias = $this->categoriasRepository->create($input);

        Flash::success('Categoria salva com sucesso.');

        return redirect(route('categorias.index'));
    }

    /**
     * Display the specified Categorias.
     */
    public function show($id)
    {
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categorias.index'));
        }

        return view('categorias.show')->with('categorias', $categorias);
    }

    /**
     * Show the form for editing the specified Categorias.
     */
    public function edit($id)
    {
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categorias.index'));
        }

        return view('categorias.edit')->with('categorias', $categorias);
    }

    /**
     * Update the specified Categorias in storage.
     */
    public function update($id, UpdateCategoriasRequest $request)
    {
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categorias.index'));
        }

        $categorias = $this->categoriasRepository->update($request->all(), $id);

        Flash::success('Categoria atualizada com sucesso.');

        return redirect(route('categorias.index'));
    }

    /**
     * Remove the specified Categorias from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categorias = $this->categoriasRepository->find($id);

        if (empty($categorias)) {
            Flash::error('Categoria não encontrada');

            return redirect(route('categorias.index'));
        }

        $this->categoriasRepository->delete($id);

        Flash::success('Categoria deletada com sucesso.');

        return redirect(route('categorias.index'));
    }
}
