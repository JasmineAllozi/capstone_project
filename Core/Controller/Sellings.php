<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Selling;


use Core\Model\Transaction;

class Sellings extends Controller
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

    public function index(){
        $this->view="selling_dash";
    }

    /**
     * Display the HTML form for selling_transaction update
     *
     * @return void
     */
    
    public function edit()
    {
        $this->view = 'sellings.edit';
        $transaction = new Transaction();
        $selected_transaction = $transaction->get_by_id($_GET['id']);
        $this->data['transaction'] = $selected_transaction;
    }

    /**
     * Updates the selling_transaction
     *
     * @return void
     */
    public function update()
    {
        $transaction = new Transaction();
        $transaction->update($_POST);
        Helper::redirect('/selling_dashboard');
    }

    /**
     * Delete the selling_transaction
     *
     * @return void
     */
    public function delete()
    {
        $selling=new Selling();
        $transaction = new Transaction();
        $transaction->delete($_GET['id']);
        Helper::redirect('/selling_dashboard');
    }

    
}