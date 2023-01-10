<?php

use Core\Controller\Admin;
use Core\Model\Item;
use Core\Controller\Transactions;
use Core\Controller\Items;

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
   
    
</head>
<body>
    
  

<div> <strong>Total Transactions </strong>   (<?=  $data->transactions_count?>)</div>
  
<div><strong>Total Sales </strong>
    

(<?= Admin::$total_sales?>)</div>
<div> <strong> Total Users</strong>( <?=  $data->users_count ?>)</div>
<div> <strong>Total Items Number</strong>   (<?= Admin:: $item_total_quantity ?>)</div>
<div><strong>Top Five Expensive Items To Buy : </strong></div>
<?php foreach (Admin::$selected_item as $x=>$val) : ?>
            
            <?= var_dump( $val->scalar);?>
            <?php endforeach;?>




    
</body>
</html>