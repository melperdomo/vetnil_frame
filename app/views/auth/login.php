<?php use Core\Helper\Security; ?>
<link rel="stylesheet" href="/css/auth/login.css">

<form method="post" action="/login">

    <?php Security::csrfInput(); ?>

    <fieldset>
        <legend>Login</legend>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="email">Senha</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Login</button>
    </fieldset>

</form>