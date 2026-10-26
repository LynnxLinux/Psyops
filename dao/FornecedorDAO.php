<?php

declare(strict_types=1);

require_once '../model/Conn.php';
require_once '../model/Fornecedor.php';

class FornecedorDAO
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    /**
     * Pesquisa fornecedores pela razão social (parte ou todo).
     */
    public function pesquisarPorRazaoSocial(string $razaoSocial): array
    {
        try {
            $sql = "SELECT id, razao_social, email
                      FROM fornecedor
                     WHERE razao_social LIKE ?
                  ORDER BY razao_social ASC";

            $stmt = $this->conn->prepare($sql);

            $razaoSocial = addcslashes(trim($razaoSocial), "%_\\");

            $stmt->bindValue(1, "%" . $razaoSocial . "%", PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
