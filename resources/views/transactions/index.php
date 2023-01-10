<h1 class="d-flex justify-content-around">Transactions List (<?= $data->transactions_count ?>)</h1>

<div class="row my-5">

    <?php foreach ($data->transactions as $transaction) : ?>
        <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card w-100">
                <div class="card-body">
                    <h4 class="card-title text-center"> #   (<?= $transaction->id ?>)</h4>
                    <h5 class="card-title text-center">Sold Quantity
                        (<?= $transaction->item_sold_quantity ?>)
                    </h5>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="./transaction?id=<?= $transaction->id ?>" class="btn btn-primary">Check Transaction</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>