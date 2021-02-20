<?php
include 'template.php';
if (isset($_POST['block'])) {
    $block=json_decode($bitcoind->getBlock($_POST['block']));
}
else {
    $block=json_decode($bitcoind->getBlock($_GET['hash']));
}

echo '<br><br><br><br>';
echo '<form action="block_transactions.php">';
echo '<h4 style="display: inline-block;">Block '.$block->height.'</h4>';
echo '&nbsp; &nbsp; <button class="btn btn-primary" type="submit">Transactions</button>';
echo '<input type="hidden" name="hash" value="'.$block->hash.'"/>';
echo '</form><br>';

echo '<table class="table table-striped" style="width:60%;margin-left:auto;margin-right:auto;">';
    echo '<tr><td>Hash</td><td>'.$block->hash.'</td></tr>';
    echo '<tr><td>Confirmations</td><td>'.$block->confirmations.'</td></tr>';
    echo '<tr><td>Version</td><td>'.$block->version.'</td></tr>';
    echo '<tr><td>Height</td><td>'.$block->height.'</td></tr>';
    echo '<tr><td>Merke root</td><td>'.$block->merkleroot.'</td></tr>';
    echo '<tr><td>Nonce</td><td>'.$block->nonce.'</td></tr>';
    echo '<tr><td>Bits</td><td>'.$block->bits.'</td></tr>';
    echo '<tr><td>Difficulty</td><td>'.$block->difficulty.'</td></tr>';
    echo '<tr><td>Time</td><td>'.$block->time.'</td></tr>';
    echo '<tr><td>Size</td><td>'.$block->size.' KB</td></tr>';
    echo '<tr><td>Weight</td><td>'.$block->weight.' kWU</td></tr>';
    echo '<tr><td>Number of transactions</td><td>'.sizeof($block->tx).'</td></tr>';
    echo '<tr><td>Median time</td><td>'.$block->mediantime.'</td></tr>';
    echo '<tr><td>Previous block hash</td><td>'.$block->previousblockhash.'</td></tr>';
    if ($block->nextblockhash){
        echo '<tr><td>Next block hash</td><td>'.$block->nextblockhash.'</td></tr>';
    }
    else {
        echo '<tr><td>Next block hash</td><td></td></tr>';
    }
echo '</table>';
?>
