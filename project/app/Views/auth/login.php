<?php

use Core\Helper\Security; ?>
<link rel="stylesheet" href="/css/auth/login.css">

<form method="post" action="/login">

    <?php Security::csrfInput(); ?>

    <div class="ferraduras">

        <img
            class="ferradura-esquerda"
            name="ferradura-esquerda"
            id="iferradura-esquerda"
            src="/images/images-home/2021-elementos-coloridos-vetnil.png"
            alt="ferradura-vetnil" />

        <img
            class="ferradura-direita"
            name="ferradura-direita"
            id="iferradura-direita"
            src="/images/images-home/2021-elementos-coloridos-vetnil.png"
            alt="ferradura-vetnil" />

    </div>

    <div class="container">
        <!-- <img src="/images/images-login/elipse.png" alt=""> -->
        <img class="login-awards" src="/images/images-login/2021-premios-2-vetnil-M.png" alt="prêmios sorte a mil vetnil">

        <fieldset class="login-container">
            <legend><img class="login-logo" src="/images/images-login/2021-logo-vetnil-M.png" alt=""></legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

            <label for="email">Senha</label>
            <input type="password" name="password" id="password" required>

            <button type="">Esqueci a senha</button>
            <button type="submit">Entrar</button>
            <button type="">Cadastre-se Agora!</button>
        </fieldset>

    </div>

</form>