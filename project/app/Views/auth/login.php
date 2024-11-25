<?php

use Core\Helper\Security; ?>

<link rel="stylesheet" href="/css/layout.css">
<link rel="stylesheet" href="/css/auth/login.css">

<div class="ferraduras">

    <img class="ferradura-esquerda-login" name="ferradura-esquerda" id="iferradura-esquerda"
        src="/images/images-home/2021-elementos-coloridos-vetnil.png" alt="ferradura-vetnil" />

    <img class="ferradura-direita-login" name="ferradura-direita" id="iferradura-direita"
        src="/images/images-home/2021-elementos-coloridos-vetnil.png" alt="ferradura-vetnil" />

</div>

<div class="awards-conteiner">
    <img class="elipse-awards" src="/images/images-login/elipse.png" alt="elipse">

    <img class="login-awards" src="/images/images-login/2021-premios-2-vetnil-M.png" alt="prêmios sorte a mil vetnil">
</div>


<form method="post" action="/login">
    <?php Security::csrfInput(); ?>
    <div class="user-container">
        <img class="login-logo" src="/images/images-login/2021-logo-vetnil-M.png" alt="">



        <label for="email">E-mail
            <input class="input-item" type="email" name="email" id="email" autocomplete="email" required>
        </label>

        <label for="password">Senha
            <input class="input-item" type="password" name="password" id="password" autocomplete="password" required>
        </label>

        <div class="btn">
            <button class="btn-underline" type="">ESQUECEU A SENHA?</button>
            <button class="btn-green" type="submit">ENTRAR</button>
            <button class="btn-white" type="">CADASTRE-SE AGORA!</button>
        </div>
</form>

</div>