# estrutura-php-backend

Projeto PHP (padrão Model / DAO / Controller / Views) com a funcionalidade de
**pesquisa de registros** para **Cliente** e **Fornecedor**, usando SQL e PHP (PDO).

## Dupla

| Integrante |
|------------|
| Guilherme |

## Funcionalidades

- **Pesquisar cliente**: digite parte ou todo o nome e veja ID, Nome e E-mail.
- **Pesquisar fornecedor**: digite parte ou toda a razão social e veja ID, Razão Social e E-mail.

A busca usa `LIKE '%texto%'`, então encontra o texto em qualquer posição
(ex.: "João" retorna "João Silva", "João Santos" e "Maria e João").

## Como executar

1. Copie a pasta do projeto para o servidor local (ex.: USBWebserver).
2. Execute o script `sql/pesquisa_cliente_fornecedor.sql` para criar o banco `bd_backend`,
   as tabelas `cliente` e `fornecedor` e os dados de exemplo.
3. Confira usuário e senha em `model/Conn.php`.
4. Acesse `views/index.php` e use o menu:
   - `?p=pesquisar/cliente`
   - `?p=pesquisar/fornecedor`

## Arquivos novos

| Camada | Cliente | Fornecedor |
|--------|---------|------------|
| Model | `model/Cliente.php` | `model/Fornecedor.php` |
| DAO | `dao/ClienteDAO.php` | `dao/FornecedorDAO.php` |
| Controller | `controller/ClienteController.php` | `controller/FornecedorController.php` |
| View | `views/cliente/pesquisar.php` | `views/fornecedor/pesquisar.php` |

Também foram alterados `views/rotas.php` (novas rotas), `views/navbar.php` (novos links)
e `model/Conn.php` (charset utf8mb4 para acentos).

## Métodos utilizados

Veja o arquivo `METODOS.txt`.
