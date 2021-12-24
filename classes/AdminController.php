<?php

class AdminController
{

    public function homepage() {
//        if($_SESSION['user']){
//            include "pages/homepage.php";
//        }
        include "pages/homepage.php";
    }
    public function index() {
        if($_SESSION['user']['is_admin']) {
            include "pages/admin/index.php";
        } else include "pages/homepage.php";

    }
    public function users() {
        include "pages/admin/users/index.php";
    }
    public function products() {
        include "pages/admin/products/index.php";
    }

    public function getAllUsers() {
        $model = new User();
        $users = $model->get();
        return view("pages/admin/users/allusers.php",compact('users'));
    }

    public function getAllProducts() {
        $model = new Product();
        $products = $model->get();
        return view("pages/admin/products/allProducts.php",compact('products'));
    }

}
