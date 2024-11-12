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
                <select name="store" id="store">
                    <option value="Loja 1">Loja 1</option>
                    <option value="Loja 1">Loja 1</option>
                    <option value="Loja 1">Loja 1</option>
                    <option value="Loja 1">Loja 1</option>
                </select>
                <button class="btn-underline">LIMPAR FILTROS</button>
                <button class="btn-white">FILTRAR</button>
                <label for="new-sale"> Tem uma nova venda?</label>
                <button class="btn-green">CADASTRAR NOTA FISCAL</button>
            </form>
        </div>

        <div class="all-sales">
            <?php foreach ($sales as $sale): ?>
                <div class="sale">
                    <ul>
                        <li class="list-name"><span><?php echo $sale->pname ?></span></li>
                        <li class="list-date"><?php echo Formatter::date($sale->date) ?></li>
                        <li class="list-price"><?php echo Formatter::money($sale->value) ?></li>
                        <li class="list-prize"><span>Raspadinha: </span>
                            <?php echo ($sale->prize != null) ? Formatter::money($sale->prize) : "Não foi dessa vez! 😢" ?> </li>
                        <li class="list-luck"><span>Número da sorte: </span> <?php echo $sale->luck_number ?> </li>
                    </ul>
                </div>
            <?php endforeach ?>
        </div>

    </div>
</div>