<?php
require_once '../controller/FornecedorController.php';

$pesquisou = false;
$dados = [];
$razaoSocial = '';

if (filter_input(INPUT_POST, 'btnpesquisar') !== null) {
    $pesquisou = true;
    $razaoSocial = trim(filter_input(INPUT_POST, 'txtrazao') ?? '');

    if ($razaoSocial !== '') {
        $controller = new FornecedorController();
        $dados = $controller->pesquisar($razaoSocial);
    }
}
?>
<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <h3>Pesquisar fornecedor</h3>

            <form method="post" class="form-inline mb-3">
                <input type="text"
                    class="form-control mr-2"
                    name="txtrazao"
                    placeholder="Digite a razão social"
                    value="<?= htmlspecialchars($razaoSocial) ?>">
                <button type="submit" name="btnpesquisar" value="1" class="btn btn-primary">
                    <i class="bi bi-search"></i> PESQUISAR
                </button>
            </form>

            <?php if ($pesquisou && $razaoSocial === '') { ?>
                <div class="alert alert-warning">Informe parte ou toda a razão social para pesquisar.</div>
            <?php } elseif ($pesquisou && count($dados) === 0) { ?>
                <div class="alert alert-info">Nenhum fornecedor encontrado.</div>
            <?php } elseif ($pesquisou) { ?>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razão Social</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dados as $mostrar) { ?>
                            <tr>
                                <td><?= (int) $mostrar['id'] ?></td>
                                <td><?= htmlspecialchars($mostrar['razao_social']) ?></td>
                                <td><?= htmlspecialchars($mostrar['email']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
