<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller


{
        
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
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.index';
                $user = new User; // new model user.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }
       
         /**
         * get user by ID
        *
         * @return object
          */ 
        public function single()
        {
                $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
                //var_dump(explode(',',$this->data['user']->permissions));
                //var_dump($_GET);
               
                                   

        }

        /**
         * Display the HTML form for user creation
         *
         * @return void
         */
        public function create()
        {
                $this->permissions(['user:create']);
                $this->view = 'users.create';
        }

        /**
         * Creates new user
         *
         * @return void
         */
        public function store()
        {
                $this->permissions(['user:create']);
                $user = new User();
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'editor':
                                $permissions = User::SELLER;
                                break;
                        case 'procurement':
                                $permissions= User::PROCUREMENT;
                                break; 
                        case 'accountant':
                                $permissions= User::ACCOUNTANT;
                                 break;               
                }
                
                unset($_POST['role']);
                 $_POST['permissions'] = implode(',', $permissions);
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->create($_POST);
                Helper::redirect('/users');
        }

        /**
         * Display the HTML form for user update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);


        }

        /**
         * Updates the user
         *
         * @return void
         */
        public function update()
        {
                $this->permissions(['user:read', 'user:update']);
                $user = new User();
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'editor':
                                $permissions = User::SELLER;
                                break;
                        case 'procurement':
                                $permissions= User::PROCUREMENT;
                                break; 
                        case 'accountant':
                                $permissions= User::ACCOUNTANT;
                                 break;               
                }
                
                unset($_POST['role']);
                 $_POST['permissions'] = implode(',', $permissions);
                //$_POST['permissions'] = \serialize($permissions);
             
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
        }

        /**
         * Delete the user
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
        
}