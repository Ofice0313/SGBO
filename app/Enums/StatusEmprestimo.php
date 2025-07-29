<?php

namespace App\Enums;

enum StatusEmprestimo:string
{
    case Pendente = 'PENDENTE';
    case Emprestado = 'EMPRESTADO';
    case Devolvido = 'DEVOLVIDO';
}



