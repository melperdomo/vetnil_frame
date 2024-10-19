<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
    <link rel="stylesheet" href="/css/layout.css">
</head>
<body>
    <header>
        <div>
            Hello, <?php echo $user->name; ?>!
        </div>
        <div>
            <a href="/logout" class="button primary">Logout</a>
        </div>
    </header>
    <main>
        <?php include $view_content; ?>
    </main>
    <footer>
        Internal Footer
    </footer>
</body>
</html>