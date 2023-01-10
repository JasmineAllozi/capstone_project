<h1>Create Item</h1>

<form action="/items/store" method="POST" class="w-50">
    <div class="mb-3">
        <label for="item-name" class="form-label">Item Name</label>
        <input type="text" class="form-control" id="item-name" name="item_name">
    </div>
    <div class="mb-3">
        <label for="item-selling">Selling Price</label>
        <input type="number" class="form-control" id="item-selling" name="selling_price">

    </div>
    <div class="mb-3">
        <label for="item-cost">Cost Price</label>
        <input type="number" class="form-control" id="item-cost" name="cost_price">

    </div>
    <div class="mb-3">
        <label for="item-available-quantity">Stock Available quantity</label>
        <input type="number" class="form-control" id="item-available-quantity" name="stock_available_quantity">

    </div>
    <button type="submit" class="btn btn-success mt-4">Create</button>
</form>