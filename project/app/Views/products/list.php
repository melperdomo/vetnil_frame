<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produtos</title>
    <link rel="stylesheet" href="/css/product.css" />
</head>

<body>
    <h1>Produtos Participantes</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img
                    class="product-image"
                    src="<?php echo ($product->image) ?>"
                    alt="<?php echo htmlspecialchars($product->name) ?>">

                <div class="product-name">
                    <h2><?php echo htmlspecialchars($product->name) ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img
                    class="product-image"
                    src="<?php echo ($product->image) ?>"
                    alt="<?php echo htmlspecialchars($product->name) ?>">

                <div class="product-name">
                    <h2><?php echo htmlspecialchars($product->name) ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img
                    class="product-image"
                    src="<?php echo ($product->image) ?>"
                    alt="<?php echo htmlspecialchars($product->name) ?>">

                <div class="product-name">
                    <h2><?php echo htmlspecialchars($product->name) ?></h2>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>