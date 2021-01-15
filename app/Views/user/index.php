<?= $this->extend('App') ?>

<?= $this->section('content') ?>
    <h1>Cadastro de Usuários</h1>
    <a class="btn btn-default" href="/users/create">Adicionar usuário</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>RG</th>
            </tr>
        </thead>
        <tbody>
            <?php if (! empty($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['fone']) ?></td>
                        <td><?= esc($user['user_rg']) ?></td>
                        <td>
                            <a class="btn btn-primary" href="/users/update/<?php echo $user['user_id'] ?>">Alterar</a>
                            <button class="btn btn-danger" onclick="helpers.deleteUser(event)" value="<?php echo $user['user_id'] ?>">Excluir</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
<?= $this->endSection() ?>