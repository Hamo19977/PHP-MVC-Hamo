<?php


class ReviewsController{
    public function  index() {
        include "pages/admin/reviews/index.php";
    }

    public function allReviews() {
        $model = new Reviews();
        $data = $model->get();
        return view("pages/admin/reviews/allReviews.php",compact('data'));
    }

    public function edit() {
        include "pages/admin/reviews/edit.php";
    }
    public function editReview() {
        $id = $_SESSION['id_edit'];
        $user_name = $_POST['user_name'];
        $product_name = $_POST['product_name'];
        $stars = $_POST['stars'];
        $comment_text = $_POST['comment_text'];

        $model = new Reviews();
        $model->update($id,$user_name,$product_name,$stars,$comment_text);
        header("location: /dashboard/reviews/all");
    }

    public function  store() {
        $product_id = $_SESSION['product_id'];
        $user_name = $_POST['user_name'];
        $product_name = $_POST['product_name'];
        $stars = $_POST['stars'];
        $comment = $_POST['comment'];
        $model = new Reviews();
        $model->insert($user_name,$product_name,$stars,$comment);


        $rating = $model->avg($product_name);
        $product = new Product();
        $val = $rating['rating'];
        $product->updateRating($product_id, $val);
        header("location: /dashboard/products/all");
    }

    public function delete() {
        if($_POST['id_edit'] != NULL){
            $_SESSION['id_edit'] = $_POST['id_edit'];
            header("location: /dashboard/reviews/edit");
            die;
        }

        $model = new Reviews();
        $model->delete($_POST['id_delete']);
        header("location: /dashboard/reviews/all");
    }
    public function create() {
        include "pages/admin/reviews/create.php";
    }
    public function storeReviews() {
        $user_name = $_POST['user_name'];
        $product_name = $_POST['product_name'];
        $stars = $_POST['stars'];
        $comment = $_POST['comment_text'];
        $model = new Reviews();
        $model->insert($user_name,$product_name,$stars,$comment);

        header("location: /dashboard/reviews/all");
    }
}
