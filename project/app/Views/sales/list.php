<div>
    <?php

use App\Utils\Formatter;

 foreach ($sales as $sale): ?>
        <ul>
            <li><?php echo $sale->pname?></li>
            <li><?php echo Formatter::date($sale->date)?></li>
            <li><?php echo Formatter::money($sale->value)?></li>
            <li><span>Raspadinha: </span> <?php echo ($sale->prize != null) ? Formatter::money($sale->prize) : "Não foi dessa vez! 😢" ?> </li>
            <li><span>Número da sorte: </span> <?php echo $sale->luck_number ?> </li>
        </ul>
    <?php endforeach ?>
</div>