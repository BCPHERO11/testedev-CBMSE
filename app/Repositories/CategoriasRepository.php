<?php

namespace App\Repositories;

use App\Models\Categorias;
use App\Repositories\BaseRepository;

class CategoriasRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nome',
        'descricao'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Categorias::class;
    }
}
