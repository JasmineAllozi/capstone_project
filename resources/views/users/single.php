<?php use Core\Helpers\Helper;
use Core\Controller\Users;
use Core\Model\User;?>

<div class="mt-5 d-flex flex-row-reverse gap-3">
<?php if (Helper::check_permission(['user:read', 'user:update'])) : ?>
    <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['user:read', 'user:delete'])) :
    ?>
    <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger">Delete</a>
    <?php endif;
    if (Helper::check_permission(['user:create'])) :
    ?>
    <a href="/users/create?id=<?= $data->user->id ?>" class="btn btn-danger">Create</a>
    <?php endif;?>
    <a href="/users" class="btn btn-success">Back</a>
</div>



<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->user->display_name ?>
    </h1>

    <p>
       <strong>Email :</strong>  <?= $data->user->email ?>
    </p>
    <p>
    <strong>Username :</strong> <?= $data->user->username ?>
    </p>
    <p>
    <strong>Password :</strong> <?=$data->user->password?>
    </p>
    <p>
    <strong>Created_at :</strong> <?=$data->user->created_at?>
    </p>
    <p>
    <strong>Updated_at :</strong> <?= $data->user->updated_at?>
    </p>
    <div>
              
</div>            
</div>