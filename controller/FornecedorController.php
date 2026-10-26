<?php

declare(strict_types=1);

require_once "../model/Fornecedor.php";
require_once "../dao/FornecedorDAO.php";

class FornecedorController
{
    private FornecedorDAO $dao;

    public function __construct()
    {
        $this->dao = new FornecedorDAO();
    }

    public function pesquisar(string $razaoSocial): array
    {
        return $this->dao->pesquisarPorRazaoSocial($razaoSocial);
    }
}
