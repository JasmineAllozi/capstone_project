<h1>Edit transaction</h1>

<form action="/transactions/update" method="POST" class="w-50">
    <input type="hidden" name="id" value="<?= $data->transaction->id ?>">
    <div class="mb-3">
        <label for="sold_quantity" class="form-label">sold_quantity</label>
        <input type="number" class="form-control" id="sold_quantity" name="item_sold_quantity" value="<?= $data->transaction->item_sold_quantity ?>">
    </div>
   
    <button type="submit" class="btn btn-warning mt-4">Update</button>
</form>
