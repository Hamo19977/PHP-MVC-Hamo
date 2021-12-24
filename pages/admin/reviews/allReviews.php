

<!DOCTYPE html>
<html>
<head>

    <meta content="initial-scale=1, maximum-scale=1,
        user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" href=
    "https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />

    <!-- jQuery library file -->
    <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <!-- Datatable plugin JS library file -->
    <script type="text/javascript" src=
    "https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" />
    <style>
        td {
            width: 400px;
            margin: 0;
            padding: 0;
            border: solid 1px grey
        }
        button {
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color: grey;">

<h2>All Reviews</h2>
<table id="tableID" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>User_Name</th>
        <th>Product_Name</th>
        <th>Stars</th>
        <th>Comment_Text</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach($data as $review){?>

        <tr>
            <td ><?= $review['id'] ?></td>
            <td><?= $review['user_name']?></td>
            <td><?= $review['product_name']?></td>
            <td><?= $review['stars']?></td>
            <td><?= $review['comment_text']?></td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="id_delete" id="" value="<?= $review['id']?>">
                    <button type="submit"> Delete </button>
                </form>
            </td>

            <td>
                <form action="" method="POST">
                    <input type="hidden" name="id_edit" id="" value="<?= $review['id']?>">
                    <button class="btn btn-primary" type="submit"> Edit </button>
                </form>
            </td>

        </tr>
    <?php }?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tableID').DataTable({ });
    });
</script>
</body>

</html>

