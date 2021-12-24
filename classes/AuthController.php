<?php

    class AuthController {

        public function storeUser(){
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $age = $_POST["age"];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $model = new User();
            $model->insert($name,$surname,$age, $email, $password);
            header("location: /signin");
        }


        public function signin() {
            include "pages/auth/signin.php";
        }

        public function signup() {
            include "pages/auth/signup.php";
        }

        public function edit() {
            include  "pages/auth/edit.php";
        }

        public function login() {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $model = new User();
            $user = $model->select($email, $password);
            $_SESSION['user'] = $user;

            if($user['is_admin'] == true){
                header("location: /dashboard");
            }elseif ($user > 0){
                header("location: /user");
            }else  header("location: /signin");
        }

        public function delete() {
            if($_POST['edit_id'] != NULL){
                $_SESSION['edit_id'] = $_POST['edit_id'];
                header("location: /dashboard/users/edit");
                die;
            }

            if($_POST['view_user_id']){
                $_SESSION['view_user_id'] = $_POST['view_user_id'];
                header("location: /dashboard/users/view");
                die;
            }

            $model = new User();
            $model->delete($_POST['id']);
            header("location: /dashboard/users/all");
        }

        public function updateUser() {
           $id =  $_SESSION['edit_id'];
           $name = $_POST["name"];
           $surname = $_POST["surname"];
           $age = $_POST["age"];
           $email = $_POST['email'];
           $password = $_POST['password'];
           $is_admin = $_POST['admin'] ? 1 : 0 ;

           $model = new User();
           $model->update($id,$name,$surname,$age, $email, $password,$is_admin);
           header("location: /dashboard/users/all");

        }

        public function view() {
            $user_id = $_SESSION['view_user_id'];
            $user_model = new User();

            $user = $user_model->find($user_id);
            return view("pages/admin/users/view.php",compact('user'));
        }
      }
