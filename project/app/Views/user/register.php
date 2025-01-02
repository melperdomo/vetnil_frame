<?php

use Core\Helper\Request;
use Core\Helper\Security;

?>

<link rel="stylesheet" href="/css/layout.css">

<div class="page-content">
    <h1>Dados Pessoais</h1>

    <div class="register-conteiner">
        <img src="" alt="">
        
        <form method="post" action="/cadastro">
        <?php Security::csrfInput(); ?>
            <label for="name">Nome
                <input type="text" name="name" id="name">
            </label>

            <label for="cpf">CPF
                <input type="number" name="cpf" id="cpf">
            </label>

            <label for="store">Loja
                <select>
                    <option class="select-item" value=""></option>
                    <?php foreach ($stores as $store):?>
                        <option class="select-item" value=" <?php echo $store->id ?>" <?php if ($store->id == Request::get('id_store')) echo "selected" ?>> <?php echo $store->name ?>
                        </option>
                        <?php endforeach ?>
                </select>
            </label>
            
            <label for="email">E-mail
                <input type="email" name="email" id="email">
            </label>
            
            <label for="tel">Celular
                <input type="tel" name="tel" id="tel">
            </label>
            
            <label for="password">Senha
                <input type="password" name="password" id="password">
            </label>

            <button class="btn-green" type="submit">CADASTRAR</button>
        </form>

    </div>

</div>