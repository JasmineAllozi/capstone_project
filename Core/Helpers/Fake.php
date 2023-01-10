<?php

namespace Core\Helpers;

use Core\Model\Item;
use Core\Model\Post;
use Core\Model\Transaction;
use Core\Model\User;

class Fake
{
    protected static $faker;

    public static function provide_fake_data()
    {
        self::$faker = \Faker\Factory::create();
        var_dump(self::$faker->name());
   
        die;
    }

    public static function fake_items(int $items_num): array
    {
        self::$faker = \Faker\Factory::create();
        $items = array();
        for ($i = 0; $i < $items_num; $i++) {
            $items[] = array(
                "item_name" => self::$faker->text(20, 50),
                "cost_price" => self::$faker->randomNumber(2,true),
                "selling_price"=>self :: $faker->randomNumber(3,false),
                "stock_available_quantity"=>self::$faker->randomDigit()
            );
        }
        return $items;
    }

    public static function create_items(int $items_num)
    {
        foreach (self::fake_items($items_num) as $fake_item) {
            $item = new Item();
           // $fake_post['content'] = \str_replace("'", "", $fake_post['content']);
            $item->create($fake_item);
        }
    }

    public static function fake_users(int $users_num)
    {
        self::$faker = \Faker\Factory::create();
        $users = array();
        for ($i = 0; $i < $users_num; $i++) {
            $users[] = array(
                "username" => self::$faker->userName(),
                "email" => self::$faker->email(),
                "password" => "1234567",
                "display_name" => self::$faker->name(),
            );
        }
        return $users;
    }

    public static function create_users(int $users_num)
    {
        foreach (self::fake_users($users_num) as $fake_user) {
            $user = new User();
            $user->create($fake_user);
        }
    }

    public static function is_first_time()
    {
        $item = new Item();
        if (empty($item->get_all())) {
            self::create_items(20);
        }
    }
    public static function fake_transactions(int $transactions_num): array
    {
        self::$faker = \Faker\Factory::create();
        $transactions = array();
        for ($i = 0; $i < $transactions_num; $i++) {
            $transactions[] = array(
                "id"=>self::$faker->numberBetween(0,9),
                "item_id"=>self::$faker->randomDigit(),
                "item_sold_quantity" => self::$faker->randomDigit(2,false),
                "total_transactions"=>self :: $faker->randomNumber(4,true)
            );
        }
        return $transactions;
    }

    public static function create_transactions(int $transactions_num)
    {
        foreach (self::fake_transactions($transactions_num) as $fake_transaction) {
            $transaction = new Transaction();
           // $fake_post['content'] = \str_replace("'", "", $fake_post['content']);
           $transaction->create($fake_transaction);
        }

    
    }

    






}