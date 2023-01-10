<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;



class Items extends Controller
{

    use Tests;
   
    
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->auth();
        $this->admin_view(true);
    }

    /**
     * Gets all items
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new Item; // new model post.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }
  
    /**
    * get item by ID
    *
    * @return object
    */   
    public function single()
    {

        self::check_if_exists(isset($_GET['item_id']), "Please make sure the id is exists");

        $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new Item();
        $this->data['item'] = $item->get_by_id($_GET['item_id']);
    }

    /**
     * Display the HTML form for item creation
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    {
       $this->permissions(['item:create']);
        $item = new Item();
        $_POST['id'] = $_SESSION['user']['user_id'];
        // this is the id of the current logged in user. Because the post creator would be the same logged in user.
        $item->create($_POST);
        Helper::redirect('/items');
    }

    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new Item();
        $selected_item = $item->get_by_id($_GET['id']);
        $this->data['item'] = $selected_item;
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['item:read', 'item:update']);
        $item = new Item();
        $item_id = $_POST['id'];
        $item->update($_POST);
        Helper::redirect('/item?item_id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new Item();
        $item->delete($_GET['item_id']);
        Helper::redirect('/items');
    }
}