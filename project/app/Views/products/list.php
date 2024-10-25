<h1>Produtos Participantes</h1>

<table>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product->name ?></td>
            <td><?php echo $product->image ?></td>
        </tr>
    <?php endforeach ?>
</table>