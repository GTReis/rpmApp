<?= $this->extend('App') ?>

<?= $this->section('content') ?>

<h2>Atualizar Usuário</h2>

<a class="btn btn-default" href="/users">Voltar</a>
<?php if(!empty($errors = \Config\Services::validation()->getErrors())): ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form class="form-horizontal" action="/users/update/<?php echo $user['user_id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="user_name">Nome</label>
        <div class="col-sm-5">
            <input id="user_name" class="form-control" type="text" name="user_name" value="<?php echo $user['name'] ?>">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="user_email">E-mail</label>
        <div class="col-sm-5">
            <input id="user_email" class="form-control" type="email" name="user_email" value="<?php echo $user['email'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="user_password">Senha</label>
        <div class="col-sm-5">
            <input id="user_password" class="form-control" type="password" name="user_password">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="confirm_password">Confirmar Senha</label>
        <div class="col-sm-5">
            <input id="confirm_password" class="form-control" type="password" name="confirm_password">
        </div>
    </div>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="user_fone">Telefone</label>
        <div class="col-sm-5">
            <input id="user_fone" class="form-control" type="text" name="user_fone" onkeypress="helpers.mask(this, helpers.mphone)" value="<?php echo $user['fone'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="user_rg">RG</label>
        <div class="col-sm-5">
            <input id="user_rg" class="form-control" type="text" name="user_rg" value="<?php echo $user['user_rg'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="user_cep">CEP</label>
        <div class="col-sm-5">
            <input id="user_cep" class="form-control" maxlength="8" type="text" name="user_cep" onkeyup="helpers.sendAddress(event)" value="<?php echo $user['address'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="user_address">Endereço</label>
        <div class="col-sm-5">
            <input id="user_address" class="form-control" disabled type="text" name="user_address">
        </div>
    </div>
    <div class="col-sm-offset-4">
        <button class="btn btn-primary" type="submit">Atualizar</button>
    </div>
</form>

<?= $this->endSection() ?>