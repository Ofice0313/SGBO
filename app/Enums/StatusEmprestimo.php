<?php

namespace App\Enums;

enum StatusEmprestimo:string
{
    case Pendente = 'PENDENTE';
    case Emprestado = 'EMPRESTADO';
    case Devolvido = 'DEVOLVIDO';
    case Validar = 'VALIDAR';
    case Rejeitado = 'REJEITADO';
    case Validado = 'VALIDADO';
    case Devolver = 'DEVOLVER';
    case Levantar = 'LEVANTAR';
    case Confirmar_Levantamento = 'CONFIRMAR_LEVANTAMENTO';
    case Entregar = 'ENTREGAR';
    case Aguardando_Confirmacao_De_Levantamento = 'AGUARDANDO_CONFIRMACAO_DE_LEVANTAMENTO';
    case AGUARDANDO_CONFIRMACAO_DE_ENTREGA = 'AGUARDANDO_CONFIRMACAO_DE_ENTREGA';
    case PEDIDO_DE_SOLICITACAO_DE_DEVOLUCAO = 'PEDIDO_DE_SOLICITACAO_DE_DEVOLUCAO';
    case AGUARDANDO_DEVOLUCAO = 'AGUARDANDO_DEVOLUCAO';
    case AGUARDANDO_CONFIRMACAO_DE_DEVOLUCAO = 'AGUARDANDO_CONFIRMACAO_DE_DEVOLUCAO';
}



