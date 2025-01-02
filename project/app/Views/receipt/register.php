<?php

use Core\Helper\Request;
use Core\Helper\Security;

?>

<link rel="stylesheet" href="/css/layout.css">

<div class="page-content">
    <h1>Cadastrar Nota Fiscal</h1>

    <div class="register-conteiner">
        <img src="" alt="">
        
        <form method="post" action="/cupomfiscal">
        <?php Security::csrfInput(); ?>
        
            <label for="cnpj">CNPJ
                <select name="cnpj" required>
                    <option class="select-item" value=""></option>
                    <?php foreach ($stores as $store):?>
                        <option  class="select-item" value="<?php echo $store->cnpj ?>" <?php if ($store->cnpj == Request::get('cnpj')) echo "selected" ?>>
                            <?php echo $store->cnpj . ' ' . $store->nome?>
                        </option>
                        <?php endforeach ?>
                </select>
            </label>

            <label for="code">Cupom Fiscal
                <input type="text" name="code" required>
            </label>

            <label for="receipt_date">Data do Cupom Fiscal
                <input type="date" name="receipt_date" required>
            </label>

            <label for="product">Produto
                <select name="id_product" required>
                    <option class="select-item" value=""></option>
                    <?php foreach ($products as $product):?>
                        <option  class="select-item" value=" <?php echo $product->id ?>" <?php if ($product->id == Request::get('id_product')) echo "selected" ?>>
                            <?php echo $product->name ?>
                        </option>
                        <?php endforeach ?>
                </select>
            </label>
            
            <!-- <label for="amount">Quantidade
                <input type="number" name="amount" required>
            </label> 
            Esse input é desnecessário, já que não tem nenhuma tabela que armazena esse dado e não há regra nenhuma para quantidade de produto.
            -->
            
            <label for="value">Valor Unitário
                <input type="number" name="value" step="0.01" placeholder="19.90" required>
            </label>
            
            <!-- <label for="total_value">Valor Total
                <input type="number" name="total_value" step="0.01" placeholder="49.90" required>
            </label> 
            Esse input é desnecessário, já que não tem nenhuma tabela que armazena esse dado e não há regra nenhuma para valor mínimo de cupom.
            -->

            <button class="btn-green" type="submit">CADASTRAR</button>
        </form>

    </div>

</div>