<h1>Edit Item</h1>

<form action="/items/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->item->id ?>">
    <div class="mb-3">
        <label for="item-name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="item-name" name="item_name" value="<?= $data->item->item_name ?>">
    </div>
    <div class="mb-3">
    <label for="item-selling" class="form-label">Selling Price</label>
        <input type="number" class="form-control" id="item-selling" name="selling_price" value="<?= $data->item->selling_price?>">
    </div>
    <div class="mb-3">
    <label for="item-cost" class="form-label">Cost Price</label>
    <input type="number" class="form-control" id="item-cost" name="cost_price" value="<?= $data->item->cost_price?>">
    </div>
    <div class="mb-3">
        <label for="item-available-quantity" class="form-label">Stock Available quantity</label>
        <input type="number" class="form-control" id="item-available-quantity" name="stock_available_quantity" value="<?= $data->item->stock_available_quantity?>">

    </div>
    

    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>