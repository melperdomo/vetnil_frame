<h1>Welcome, <?php echo $user->name; ?> </h1>

<table>
    <?php foreach($paginator->results as $user): ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->name ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $paginator->render(); ?>