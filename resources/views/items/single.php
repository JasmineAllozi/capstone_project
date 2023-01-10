<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
        <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['item:read', 'item:delete'])) :
    ?>
        <a href="/items/delete?item_id=<?= $data->item->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; 
    if (Helper::check_permission(['item:create'])):
    ?>
        <a href="/items/create?item_id=<?= $data->item->id ?>" class="btn btn-danger">Create</a>
    <?php endif; ?>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->item->item_name ?>
    </h1>
    <p>
   <strong>Selling Price : </strong><?= $data->item->selling_price?>
    </p>
    <p>    <strong>Cost Price : </strong><?= $data->item->cost_price?></p>
    <p>
    <strong>Stock Available Quantity : </strong><?= $data->item->stock_available_quantity?>
    </p>
    <p>
    <strong>Created_at : </strong><?= $data->item->created_at?>
    </p>
    <p>
    <strong>Updated_at : </strong><?= $data->item->updated_at?>
    </p>
    
</div>