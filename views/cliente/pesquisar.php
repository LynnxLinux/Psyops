<?php
require_once '../controller/ClienteController.php';

$pesquisou = false;
$dados = [];
$nome = '';

if (filter_input(INPUT_POST, 'btnpesquisar') !== null) {
    $pesquisou = true;
    $nome = trim(filter_input(INPUT_POST, 'txtnome') ?? '');

    if ($nome !== '') {
        $controller = new ClienteController();
        $dados = $controller->pesquisar($nome);
    }
}
?>
<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Pesquisar cliente</h3>

            <form method="post" class="form-inline mb-3">
                <input type="text"
                    class="form-control mr-2"
                    name="txtnome"
                    placeholder="Digite o nome do cliente"
                    value="<?= htmlspecialchars($nome) ?>">
                <button type="submit" name="btnpesquisar" value="1" class="btn btn-primary">
                    <i class="bi bi-search"></i> PESQUISAR
                </button>
            </form>

            <?php if ($pesquisou && $nome === '') { ?>
                <div class="alert alert-warning">Informe parte ou todo o nome para pesquisar.</div>
            <?php } elseif ($pesquisou && count($dados) === 0) { ?>
                <div class="alert alert-info">Nenhum cliente encontrado.</div>
            <?php } elseif ($pesquisou) { ?>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $mostrar) { ?>
                            <tr>
                                <td><?= (int) $mostrar['id'] ?></td>
                                <td><?= htmlspecialchars($mostrar['nome']) ?></td>
                                <td><?= htmlspecialchars($mostrar['email']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
