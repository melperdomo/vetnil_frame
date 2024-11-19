<?php

use App\Utils\Formatter; ?>

<link rel="stylesheet" href="/css/layout.css" />
<link rel="stylesheet" href="/css/sales.css" />

<div class="page-content">
    <h1>Minhas Vendas</h1>

    <div class="search-sales">

        <div class="search-conteiner">
            <h3>Filtrar por:</h3>

            <form class="search">
                <div class="search-conteiner-product">

                    <label for="product">
                        Produto
                        <select class="store-select" name="id_product" id="id_product">
                            <option value=""></option>
                            <?php foreach ($products as $product): ?>
                            <option class="selected-item" value=" <?php echo $product->id ?> ">
                                <?php echo $product->name ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </label>
                </div>

                <div class="search-conteiner-date">
                    <label for="date">
                        Período
                        <span class="date-span"> de </span><input class="date-item" type="date" name="date" id="date"
                            min="2023-01-01" max="2023-12-30">
                        <span class="date-span"> até </span><input class="date-item" type="date" name="date" id="date"
                            min="2023-01-01" max="2023-12-30">
                    </label>
                </div>

                <div class="btn-conteiner">
                    <button type="reset" class="btn-underline">LIMPAR FILTROS</button>
                    <button type="submit" class="btn-white">FILTRAR</button>
                </div>

                <p class="new-sale">Tem uma nova venda?</p>
                <button class="btn-green">CADASTRAR NOTA FISCAL</button>

            </form>
        </div>

        <div class="search-results">
            <?php foreach ($sales as $sale): ?>
            <div class="sale">
                <ul>
                    <li class="list-name"><span class="list-sale-span"><?php echo $sale->pname ?></span></li>

                    <li class="list-date"><?php echo Formatter::date($sale->date) ?></li>

                    <li class="list-price"><?php echo Formatter::money($sale->value) ?></li>

                    <li class="list-prize"><span class="list-sale-span">Raspadinha: </span>
                        <?php echo ($sale->prize != null) ? Formatter::money($sale->prize) : "Não foi dessa vez! 😢" ?>
                    </li>

                    <li class="list-luck"><span class="list-sale-span">Número da sorte: </span>
                        <?php echo $sale->luck_number ?> </li>
                </ul>
            </div>
            <?php endforeach ?>
        </div>

    </div>
</div>