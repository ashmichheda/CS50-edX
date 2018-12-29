<form name="sell" action="sell.php" method=post>   
    <fieldset>
        <div class="form-group">
            SELL: <SELECT autofocus class="form-control" name="symbol">
            <option value=''>------</option>
            <?php 
                foreach ($stocks as $stock)
                {
                    print ("<option value='$stock'>".$stock."</option>");
                }
            ?>
            </SELECT>
        </div>
        <div class="control-group">
            <input class="form-control" type="Submit" value="SELL"/>
        </div>
    </fieldset>
</form>
