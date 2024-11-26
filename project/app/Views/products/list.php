    <link rel="stylesheet" href="/css/product.css" />

    <div class="page-content">
        <h1>Produtos Participantes</h1>
        <div class="products-container">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img
                        class="product-image"
                        src="<?php echo ($product->image) ?>"
                        alt="<?php echo ($product->name) ?>">
                    <div class="product-name">
                        <h2><?php echo ($product->name) ?></h2>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        
        <div class="products-container">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img
                        class="product-image"
                        src="<?php echo ($product->image) ?>"
                        alt="<?php echo ($product->name) ?>">
                    <div class="product-name">
                        <h2><?php echo ($product->name) ?></h2>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <div class="products-container">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img
                        class="product-image"
                        src="<?php echo ($product->image) ?>"
                        alt="<?php echo ($product->name) ?>">
                    <div class="product-name">
                        <h2><?php echo ($product->name) ?></h2>
                    </div>
                </div>
            <?php endforeach ?>
        </div>

        <!-- <?php $paginator->render() ?> -->
    
    </div>
