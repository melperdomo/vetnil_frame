<link rel="stylesheet" href="/css/auth/login.css">

<h1>Login</h1>

<form method="post" action="/login">
    <fieldset>
        <legend>Enter your credentials</legend>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="email">Senha</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Login</button>
    </fieldset>
</form>