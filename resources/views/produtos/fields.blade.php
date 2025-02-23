<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Descricao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Preco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preco', 'Preco:') !!}
    {!! Form::number('preco', null, ['class' => 'form-control','step' => '0.01']) !!}
    <!--<input type="number" name="preco" step="0.01">-->
</div>

<!-- Quantidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    {!! Form::number('quantidade', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoria:') !!}
    
    <?php
        use App\Models\Categorias;
        $categorias = Categorias::pluck('nome', 'id');
    ?>

    {!! Form::select ('category_id', $categorias)!!}
</div>