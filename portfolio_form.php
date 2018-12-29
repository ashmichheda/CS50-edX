<table class="table table-striped">
    <thead>
        <tr>
            <td><strong>Id</strong></td>
            <td><strong>UserId</strong></td>
            <td><strong>Symbol</strong></td>
            <td><strong>Shares</strong></td>
        </tr>
    </thead>
    
    <tbody>
        <?php foreach ($positions as $position): ?>
        
        <tr>    
            <td><?= $position["id"] ?></td>
            <td><?= $position["user_id"] ?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["shares"] ?></td>
        </tr>

        <?php endforeach ?>
        
        </tbody>
</table>
