<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProdutosRepository;
use Illuminate\Http\Request;
use App\Models\Categorias;
use Flash;

class ProdutosController extends AppBaseController
{
    /** @var ProdutosRepository $produtosRepository*/
    private $produtosRepository;

    public function __construct(ProdutosRepository $produtosRepo)
    {
        $this->produtosRepository = $produtosRepo;
    }

    /**
     * Display a listing of the Produtos.
     */
    public function index(Request $request)
    {
        $produtos = $this->produtosRepository->paginate(10);

        return view('produtos.index')
            ->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new Produtos.
     */
    public function create()
    {
        $categorias = Categorias::pluck('nome', 'id');

        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created Produtos in storage.
     */
    public function store(CreateProdutosRequest $request)
    {
        $input = $request->all();

        $valido = $input->validated([
            
        ]);

        $produtos = $this->produtosRepository->create($input);

        Flash::success('Produtos salvo com sucesso.');

        return redirect(route('produtos.index'));
    }

    /**
     * Display the specified Produtos.
     */
    public function show($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos não encontrado');

            return redirect(route('produtos.index'));
        }

        return view('produtos.show')->with('produtos', $produtos);
    }

    /**
     * Show the form for editing the specified Produtos.
     */
    public function edit($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos não encontrado');

            return redirect(route('produtos.index'));
        }

        return view('produtos.edit')->with('produtos', $produtos);
    }

    /**
     * Update the specified Produtos in storage.
     */
    public function update($id, UpdateProdutosRequest $request)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos não encontrado');

            return redirect(route('produtos.index'));
        }

        $produtos = $this->produtosRepository->update($request->all(), $id);

        Flash::success('Produtos atualizado com sucesso.');

        return redirect(route('produtos.index'));
    }

    /**
     * Remove the specified Produtos from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $produtos = $this->produtosRepository->find($id);

        if (empty($produtos)) {
            Flash::error('Produtos não encontrado');

            return redirect(route('produtos.index'));
        }

        $this->produtosRepository->delete($id);

        Flash::success('Produtos deletado com sucesso.');

        return redirect(route('produtos.index'));
    }
}
