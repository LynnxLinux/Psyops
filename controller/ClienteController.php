<?php

declare(strict_types=1);

require_once "../model/Cliente.php";
require_once "../dao/ClienteDAO.php";

class ClienteController
{
    private ClienteDAO $dao;

    public function __construct()
    {
        $this->dao = new ClienteDAO();
    }

    public function pesquisar(string $nome): array
    {
        return $this->dao->pesquisarPorNome($nome);
    }
}
