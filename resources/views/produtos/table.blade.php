<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="produtos-table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Preco</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th colspan="3">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php
                use App\Models\Categorias;
            ?>
            @foreach($produtos as $produtos)
                <?php
                     $tec = Categorias::where('id', '=', $produtos->category_id)->pluck('nome');
                ?>
                <tr>
                    <td>{{ $produtos->nome }}</td>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->preco }}</td>
                    <td>{{ $produtos->quantidade }}</td>
                    <td>{{ $tec[0] }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['produtos.destroy', $produtos->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('produtos.show', [$produtos->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('produtos.edit', [$produtos->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
        </div>
    </div>
</div>
