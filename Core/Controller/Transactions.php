<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;


use Core\Model\Transaction;

class Transactions extends Controller
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
     * Gets all transactions
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.index';
        $transaction = new Transaction; // new model post.
        $this->data['transactions'] = $transaction->get_all();
        $this->data['transactions_count'] = count($transaction->get_all());
        
           
        
    }
    /**
    * get transaction by ID
    *
    * @return object
    */ 
    public function single()
    {
        
        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");
    
        $this->permissions(['transaction:read']);
        $this->view = 'transactions.single';
        $transaction = new Transaction();
        $this->data['transactions'] = $transaction->get_by_id($_GET["id"]);
        $item_id=$this->data['transactions']->item_id;
        $item=new Item();
         $this->data['current_item']=$item->get_by_id($item_id);     
    }
   
  
     /**
     * Display the HTML form for transaction update
     *
     * @return void
     */
    public function edit()
    {
       $this->permissions(['transaction:read', 'transaction:update']);
        $this->view = 'transactions.edit';
        $transaction = new Transaction();
        $selected_transaction = $transaction->get_by_id($_GET['id']);
        $this->data['transaction'] = $selected_transaction;
    }

    /**
     * Updates the transaction
     *
     * @return void
     */
    public function update()
    {
        $this->permissions(['transaction:read', 'transaction:update']);
        $transaction = new Transaction();
        $transaction_id = $_POST['id'];

        $transaction->update($_POST);
        Helper::redirect('/transaction?id=' . $_POST['id']);
    }

    /**
     * Delete the transaction
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['transaction:read', 'transaction:delete']);
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/transactions');
    }
    
  
    
}