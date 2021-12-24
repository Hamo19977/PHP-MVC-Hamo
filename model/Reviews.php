<?php
session_start();
class Reviews extends Db{
    public function get(){
        $sql = "SELECT * FROM reviews";
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }

    public function insert($user_name,$product_name,$stars,$comment) {
        $sql = "INSERT INTO reviews(`user_name`, `product_name`, `stars`, `comment_text`)
            VALUES('$user_name','$product_name','$stars','$comment')";
        $this->connect()->query($sql);
    }

    public function avg($product_name) {
        $sql = "SELECT AVG(stars) rating FROM `reviews` WHERE `product_name` ='$product_name'";
        $result = $this->connect()->query($sql);
        return $result->fetch();
    }

    public function delete($id) {
        $sql = "DELETE FROM `reviews` WHERE id = '$id' ";
        $this->connect()->query($sql);
    }

    public function update($id,$user_name,$product_name,$stars,$comment_text) {
        $sql = "UPDATE `reviews` SET `id`='$id',`user_name`='$user_name',`product_name`='$product_name', `stars`= '$stars', `comment_text`='$comment_text' WHERE id='$id'";
        $this->connect()->query($sql);
    }
}
