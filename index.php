<?php
session_start();

use Core\Helpers\Fake;
use Core\Model\User;
use Core\Model\Item;
use Core\Model\Transaction;
use Core\Router;

require_once 'vendor/autoload.php';

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});

if (isset($_COOKIE['user_id']) && !isset($_SESSION['user'])) { // check if there is user_id cookie.
    // log in the user automatically
    $user = new User(); // get the user model
    $logged_in_user = $user->get_by_id($_COOKIE['user_id']); // get the user by id
    $_SESSION['user'] = array( // set up the user session that idecates that the user is logged in. 
        'username' => $logged_in_user->username,
        'display_name' => $logged_in_user->display_name,
        'user_id' => $logged_in_user->id,
        'is_admin_view' => true
    );
}




// For web administrators
Router::get('/', "authentication.login"); // Displays the login form
Router::get('/logout', "authentication.logout"); // Logs the user out
Router::post('/authenticate', "authentication.validate"); // Displays the login form



Router::get('/home',"admin.index");



// athenticated + permissions [item:read]
Router::get('/items', "items.index"); // list of posts (HTML)
Router::get('/item', "items.single"); // Displays single post (HTML)
// athenticated + permissions [item:create]
Router::get('/items/create', "items.create"); // Display the creation form (HTML)
Router::post('/items/store', "items.store"); // Creates the posts (PHP)
// athenticated + permissions [item:read, item:create]
Router::get('/items/edit', "items.edit"); // Display the edit form (HTML)
Router::post('/items/update', "items.update"); // Updates the posts (PHP)
// athenticated + permissions [item:read, item:detele]
Router::get('/items/delete', "items.delete"); // Delete the post (PHP)

// athenticated + permissions [transaction:read]
Router::get('/transactions', "transactions.index"); // list of posts (HTML)
Router::get('/transaction', "transactions.single"); // Displays single post (HTML)
// athenticated + permissions [transaction:read, transaction:create]
Router::get('/transactions/edit', "transactions.edit"); // Display the edit form (HTML)
Router::post('/transactions/update', "transactions.update"); // Updates the posts (PHP)
// athenticated + permissions [transaction:read, transaction:detele]
Router::get('/transactions/delete', "transactions.delete"); // Delete the post (PHP)
//Router::get('/delete','transactions.delete_transaction');




// athenticated + permissions [user:read]
Router::get('/users', "users.index"); // list of users (HTML)
Router::get('/user', "users.single"); // Displays single post (HTML)
// athenticated + permissions [user:create]
Router::get('/users/create', "users.create"); // Display the creation form (HTML)
Router::post('/users/store', "users.store"); // Creates the users (PHP)
// athenticated + permissions [user:read, user:create]
Router::get('/users/edit', "users.edit"); // Display the edit form (HTML)
Router::post('/users/update', "users.update"); // Updates the users (PHP)
// athenticated + permissions [user:read, user:delete]
Router::get('/users/delete', "users.delete"); // Delete the post (PHP)


//selling dashboard

Router::get('/selling_dashboard', "sellings.index"); // Display the selling_dashboard
Router::get('/selling/edit', "sellings.edit"); // Display the edit form (HTML)
Router::post('/selling/update', "sellings.update"); // Updates the transaction (PHP)
Router::get('/selling/delete', "sellings.delete"); // Delete the transaction (PHP)
 

// api requests
Router::get('/api/items', 'endpoints.items');
Router::post('/api/items/create', 'endpoints.create');
Router::get('/api/current_user_transaction','endpoints.transaction');




Router::redirect();