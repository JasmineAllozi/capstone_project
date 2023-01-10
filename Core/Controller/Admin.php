<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Model\Item;
use Core\Model\Transaction;
use Core\Model\Tag;
use Core\Model\User;
use DateTime;

class Admin extends Controller
{
    public static $item_total_quantity=0;
    public static $selected_item;
    public static $total_sales=0;

    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {    
        $this->auth();
        $this->admin_view(true);
        $this->view = 'home';
    }
    public function index(){
        $this->total_sales();
        $this->total_users();
        $this->total_transactions();
        $this->top_five_items();
        $this->item_total_quantity();
    }
    /**
     * count all users
     *
     * @return void
     */
    public function total_users(){
        //$this->view='home';
        $user=new User;
        $this->data['users_count'] = count($user->get_all());   
    } 

     /**
     * count all transactions
     *
     * @return void
     */
    public function total_transactions() 
    {
     //$this->view='home';
     $transaction= new Transaction;
     $this->data['transactions_count']=count($transaction->get_all()); 
    
     }
     

      /**
     * count total transactions
     *
     * @return int
     */
     public  function total_sales() : int
     {
    
     //$this->view='home';
     $transaction= new Transaction;
     $transactions=$transaction->get_all();
     foreach($transactions as $transaction){
         self::$total_sales += $transaction->total_transactions;
     }
     return self::$total_sales;
    }

     /**
     * get the top five expensive items 
     *
     * @return array
     */
    public function top_five_items() : array
    {
       // $this->view='home';
        $item=new Item;
        $items=$item->get_all();
        foreach($items as $item){
            $items_name[]=$item->item_name;
            $array[]=$item->selling_price;  
        }
   
        for ($i = 0; $i <= 4; $i++) {
            $max=max($array);
            $sorted_array[]=$max;
            $key = array_search($max, $array);
            self::$selected_item[]=(object)$items_name[$key];
            unset($array[$key]);   
        }  
       
    return self::$selected_item;
    }

     /**
     * get the stock available quantity for all items 
     *
     * @return int
     */
    public function item_total_quantity() : int
    {
       
       // $this->view='home';
        $item=new Item;
        $this->data['items']=  $item->get_all();
        //var_dump($this->data['items']); 
        foreach ($this->data['items'] as $item) {
             self::$item_total_quantity+= $item->stock_available_quantity;
        }
        return self::$item_total_quantity;
    }
 



}