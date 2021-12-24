
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View User</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        .user {
            background-color: coral;
            border-radius: 10%;

            position: absolute;
            left: 40%;
        }
        * {
            padding: 0;
            margin: 0
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ccc
        }

        .rating {
            display: flex;
            margin-top: -10px;
            flex-direction: row-reverse;
            float: left
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 62px;
            font-size: 45px;
            color: #ff0000;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
        .rating_max {
            margin-left: 65px;
            margin-right: 5px;
        }
        img {
            border-radius: 50%;
        }
    </style>
</head>
<body>


<div class="card user" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">View #<?= $product['id']?>: Product</h5>

    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Name:<?= $product['name']?></li>
        <li class="list-group-item">Description:<?= $product['description']?></li>
        <li class="list-group-item">Review<?php $product['review']?></li>
        <img src="/images/<?= $product['image']?>" width="100%" height="120px" alt="">
    </ul>
    <form action="" method="POST" class="form">
        <div class="textarea">
            <textarea name="comment" id="" cols="29" rows="2" placeholder="Comment"></textarea>

        </div>
        <input type="hidden" name="user_name" value="<?= $user['name']?>">
        <input type="hidden" name="product_name" value="<?= $product['name']?>">
        <div class="rating">
            <input type="radio" name="stars" value="5" id="5">
            <label for="5">☆</label>
            <input type="radio" name="stars" value="4" id="4">
            <label for="4">☆</label>
            <input type="radio" name="stars" value="3" id="3">
            <label for="3">☆</label>
            <input type="radio" name="stars" value="2" id="2">
            <label for="2">☆</label>
            <input type="radio" name="stars" value="1" id="1">
            <label for="1">☆</label>
        </div>
                <button style="margin-left: 38%;" type="submit" class="btn-sm btn-outline-danger ">Submit</button>

            </form>
</div>
</body>
</html>





