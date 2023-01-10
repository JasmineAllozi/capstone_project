<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Tests;
use Core\Model\Item;
use Core\Model\Transaction;
use Core\Model\User;
use Core\Helpers\Helper;
use Exception;
use DateTime;

class Endpoints extends Controller
{
        use Tests;

        protected $request_body;
        protected $http_code = 200;

        protected $response_schema = array(
                "success" => true, // to provide the response status.
                "message_code" => "", // to provide message code for the front-end developer for a better error handling
                "body" => []
        );

        function __construct()
        {
                $this->request_body = (array) json_decode(file_get_contents("php://input"));

        }

        public function render()
        {
                header("Content-Type: application/json"); // changes the header information
                http_response_code($this->http_code); // set the HTTP Code for the response
                echo json_encode($this->response_schema); // convert the data to json format
        }
         /**
         * get all items in table  by api
         *
         * @return array
         */
        function items()
        {
                try {
                        $item = new Item;
                        $items = $item->get_all();
                        if (empty($items)) {
                                throw new \Exception('No items were found!');
                        }
                        $this->response_schema['body'] = $items;
                        var_dump($items);
                        $this->response_schema['message_code'] = "items_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }
        }
        
        /**
         * create transaction by api
         *
         * @return object
         */
       function create()
        {
                self::check_if_empty($this->request_body);
                try {
                       
                       $transaction=new Transaction;
                        $current_transaction=$transaction->create($this->request_body);
                     
                       $this->response_schema['body']=$current_transaction;
                        $this->response_schema['message_code'] = "transaction_created_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = "transaction_was_not_created";
                        $this->http_code = 421;
                }
        }
        
    
         /**
         * get all transaction done by the current logged in user by api
         *
         * @return array
         */
        function transaction()
        {
                try {
                        $transaction = new Transaction;
                        $item=new Item;
                        $date = new \DateTime();
                        $newDate =strtotime( $date->format('d/m/Y'));
                        
                        $data=array();
                                       $sql='SELECT transactions.id,transactions.item_sold_quantity,transactions.item_id,transactions.total_transactions,transactions.created_at,items.item_name,items.selling_price 
                                       FROM transactions
                                       INNER JOIN items ON transactions.item_id= items.id ';
                                       $result = $transaction->connection->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                               while ($row = $result->fetch_object()) {
                                                   $data[] = $row;
                                                   
                                               }
                                           } 
                        
                                                               
                       foreach($data as $tran_key=>$each_element){
                       
                                $transaction_date = new \DateTime($each_element->created_at);
                                $formated_date=strtotime($transaction_date->format('d/m/Y'));
                                
                                if($each_element->id==$_SESSION['user']['user_id'] && $formated_date == $newDate){       
                                        $all_transactions[]=$each_element;}}
                                
                        
                        if (empty($all_transactions)) {
                                throw new \Exception('No items were found!');
                        }
                        $this->response_schema['body'] = $all_transactions;
                        $this->response_schema['message_code'] = "items_collected_successfuly";
                } catch (\Exception $error) {
                        $this->response_schema['success'] = false;
                        $this->response_schema['message_code'] = $error->getMessage();
                        $this->http_code = 404;
                }
        }

}