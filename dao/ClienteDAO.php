<?php

declare(strict_types=1);

require_once '../model/Conn.php';
require_once '../model/Cliente.php';

class ClienteDAO
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new Conn();
    }

    /**
     * Pesquisa clientes pelo nome (parte ou todo).
     * Usa LIKE %valor% para encontrar o texto em qualquer posição do nome.
     */
    public function pesquisarPorNome(string $nome): array
    {
        try {
            $sql = "SELECT id, nome, email
                      FROM cliente
                     WHERE nome LIKE ?
                  ORDER BY nome ASC";

            $stmt = $this->conn->prepare($sql);

            // escapa % e _ digitados pelo usuário para não virarem curinga
            $nome = addcslashes(trim($nome), "%_\\");

            $stmt->bindValue(1, "%" . $nome . "%", PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
