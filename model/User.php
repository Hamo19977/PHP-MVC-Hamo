<?php
class User extends Db{
    public function get(){
        $sql = "SELECT * FROM users";
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }

    public function insert($name, $surname, $age,$email, $password ){
        $sql = "INSERT INTO users(`name`, `surname`, `age`, `email`, `password`)
        VALUES('$name', '$surname', '$age','$email', '$password')";
        $this->connect()->query($sql);

    }


    public function select($email, $password ){

        $sql = "SELECT * FROM users WHERE email = '".$email. "' AND password = '".$password. "'";
        $result = $this->connect()->query($sql);
        return $result->fetch();
    }

    public function delete($id) {
        $sql = "DELETE FROM `users` WHERE id = '$id' ";
        $this->connect()->query($sql);
    }

    public function update($id,$name, $surname, $age,$email, $password, $is_admin ) {
        $sql = "UPDATE `users` SET `id`='$id',`name`='$name',`surname`='$surname',`age`='$age',`email`='$email',`password`='$password',`is_admin`='$is_admin' WHERE id='$id'";
        $this->connect()->query($sql);
    }

    public function find($id) {
        $sql = "SELECT * FROM `users` WHERE id='$id'";
        $result = $this->connect()->query($sql);
        return $result->fetch();
    }

    public function me() {
        $user = $this->find($_SESSION["user"]["id"]);
        $_SESSION["user"] = $user;
    }
}
