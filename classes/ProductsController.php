<?php


class ProductsController {
	public function getAllProducts() {
		$model = new Product();
		$products = $model->get();
        return view("pages/admin/products/allProducts.php",compact('products'));
	}

    public function createProduct(){
        include "pages/admin/products/create.php";
    }
    public function  deleteProduct() {
        if($_POST['edit_product_id'] != NULL){
            $_SESSION['edit_product_id'] = $_POST['edit_product_id'];
            header("location: /dashboard/products/edit");
            die;
        }
        if($_POST['product_id'] != NULL){
            $_SESSION['product_id'] = $_POST['product_id'];
            header("location: /dashboard/products/view");
            die;
        }
        $model = new Product();
        $model->delete($_POST['id']);
        header("location: /dashboard/products/all");
    }


    public function storeProducts(){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $imgPath = "assets/images/" . $image_name;
        move_uploaded_file($image_tmp_name, $imgPath );

        $model = new Product();
        $model->insert($name,$description, $image_name);
        header("location: /dashboard");
    }

    public function get() {
        $page = $_GET["page"];
            include "pages/admin/products/allProducts.php";
    }

    public function  edit() {
            include  "pages/admin/products/edit.php";
    }

    public function updateProduct() {
            $id =  $_SESSION['edit_product_id'];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $image = $_POST["image"];

            $model = new Product();
            $model->update($id,$name,$description,$image);
            header("location: /dashboard/products/all");

    }

    public function view(){
        $product_id = $_SESSION['product_id'];
        $user_id = $_SESSION['user']['id'];
        $product_model = new Product();
        $user_model = new User();

        $product = $product_model->find($product_id);
        $user = $user_model->find($user_id);
        return view("pages/admin/products/view.php",compact('product', 'user'));
    }
}
