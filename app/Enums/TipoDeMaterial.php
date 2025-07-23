<?php

namespace App\Enums;

enum TipoDeMaterial:string
{
    case Livro = 'LIVRO';
    case Audiolivro = 'AUDIOLIVRO';
    case Artigo = 'ARTIGO';
    case Revista = 'REVISTA';
}

