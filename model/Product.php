<?php

    class Product extends Db{

        public function get(){
            $sql = "SELECT * FROM products";
            $result = $this->connect()->query($sql);
            return $result->fetchAll();
        }

        public function insert($name, $description,$image){
            $sql = "INSERT INTO products(`name`, `description`, `image`)
            VALUES('$name', '$description', '$image')";
            $this->connect()->query($sql);
        }

        public function delete($id) {

           $sql = "DELETE FROM `products` WHERE id = '$id' ";
           $this->connect()->query($sql);
        }

        public function update($id,$name, $description, $image) {
            $sql = "UPDATE `products` SET `id`='$id',`name`='$name',`description`='$description', `image`= '$image' WHERE id='$id'";
            $this->connect()->query($sql);
        }

        public function find($id) {
            $sql = "SELECT * FROM `products` WHERE id='$id'";
            $result = $this->connect()->query($sql);
            return $result->fetch();
        }

        public function updateRating($id, $rating) {
            $sql = "UPDATE `products` SET `review`='$rating' WHERE id='$id'";
            $this->connect()->query($sql);
        }
    }
