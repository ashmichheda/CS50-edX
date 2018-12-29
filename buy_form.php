<!-- This is the buy template which displays 2 text boxes and a buy button -->
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="stock" placeholder="Stock" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Buy</button>
        </div>
    </fieldset>
</form>