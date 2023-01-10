<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['transaction:read', 'transaction:update'])) : ?>
        <a href="/transactions/edit?id=<?= $data->transactions->id ?>" class="btn btn-warning ">Edit</a>
    <?php endif;
    if (Helper::check_permission(['transaction:read', 'transaction:delete'])) :
    ?>
        <a href="/transactions/delete?id=<?= $data->transactions->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

   
    <table class="mt-5 table">
  <thead>
    <tr>
    <th scope="col">Item_id</th>
    <th scope="col">Item Name</th>
    <th scope="col">Sold_quantity</th>
    <th scope="col">Total Transactions</th>
    <th scope="col">created_at</th>
    <th scope="col">updated_at</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <th scope="row"><?= $data->transactions->item_id ?></th>
      <td><?= $data->current_item->item_name?></td>
      <td><?= $data->transactions->item_sold_quantity?></td>
      <td><?= $data->transactions->total_transactions?></td>
      <td><?= $data->transactions->created_at?></td>
      <td><?= $data->transactions->updated_at?></td>
    </tr>
    </tbody>
</table>
    
</div>