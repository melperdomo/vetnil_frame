<?php

use App\Utils\Formatter; ?>

<link rel="stylesheet" href="/css/layout.css" />

<div class="page-content">
    <h1>Minhas Vendas</h1>

    <div class="search-sales">
        <h3>Filtrar por:</h3>
        <form class="search">

            <select name="store" id="store">
                <option value="Loja 1">Loja 1</option>
                <option value="Loja 1">Loja 1</option>
                <option value="Loja 1">Loja 1</option>
                <option value="Loja 1">Loja 1</option>
            </select>

            <button class="btn-underline">LIMPAR FILTROS</button>

            <button class="btn-white">FILTRAR</button>

            <label for="new-sale"> Tem uma nova venda?
                <button>CADASTRAR NOTA FISCAL</button>
            </label>
        </form>
    </div>

    <div class="all-sales">
        <?php foreach ($sales as $sale): ?>
            <ul>
                <li><?php echo $sale->pname ?></li>
                <li><?php echo Formatter::date($sale->date) ?></li>
                <li><?php echo Formatter::money($sale->value) ?></li>
                <li><span>Raspadinha: </span> <?php echo ($sale->prize != null) ? Formatter::money($sale->prize) : "Não foi dessa vez! 😢" ?> </li>
                <li><span>Número da sorte: </span> <?php echo $sale->luck_number ?> </li>
            </ul>
        <?php endforeach ?>
    </div>
</div>