<?php

use Core\Helper\Request;
use Core\Helper\Security;

?>

<link rel="stylesheet" href="/css/layout.css">
<script src="/js/receipt/register.js"></script>

<div class="page-content">
    <h1>Cadastrar Nota Fiscal</h1>

    <div class="register-conteiner">
        <img src="" alt="">

        <form id="receipt-form" method="post" action="/cupomfiscal">
            <?php Security::csrfInput(); ?>

            <fieldset>
                <label for="code">Cupom Fiscal
                    <input type="text" name="code" required>
                </label>
                <label for="receipt_date">Data do Cupom Fiscal
                    <input type="date" name="receipt_date" required>
                </label>
            </fieldset>

            <fieldset class="add-product">
                <label for="product">Produto
                    <select name="products[0][id]" required>
                        <option class="select-item" value=""></option>
                        <?php foreach ($products as $product): ?>
                            <option class="select-item" value=" <?php echo $product->id ?>" <?php if ($product->id == Request::get('id_product')) echo "selected" ?>>
                                <?php echo $product->name ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </label>

                <label for="value">Valor Unitário
                    <input type="number" name="products[0][value]" step="0.01" placeholder="19.90" required>
                </label>
            </fieldset>

        </form>

        <button class="btn-white" type="button" onclick="duplicateProduct()">ADICIONAR PRODUTO</button>
        <button form="receipt-form" class="btn-green" type="submit">CADASTRAR</button>

    </div>

</div>