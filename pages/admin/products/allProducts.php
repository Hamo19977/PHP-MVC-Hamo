
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
            width: 50px;
            margin: 0;
            padding: 0;
        }

        button {
            cursor: pointer;
        }

    </style>
</head>

<body style="background-color: grey;">

<h2>All Products</h2>
<table id="tableID" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Rating</th>
        <th>Image</th>
        <th>view</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php  foreach($products as $product){?>

        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name']?></td>
            <td><?= $product['description']?></td>
            <td><?= $product['review']?></td>
            <td>
               <img src="/images/<?= $product['image']?>" alt="" width="100px" height="100px">
            </td>

            <td>
                <form action="" method="POST">
                    <input type="hidden" name="product_id" id="" value="<?= $product['id']?>">
                    <button type="submit"> View Product </button>
                </form>
            </td>
            <td>

                <form action="" method="POST">
                    <input type="hidden" name="id" id="" value="<?= $product['id']?>">
                    <button type="submit"> Delete </button>
                </form>
            </td>

            <td>
                <form action="" method="POST">
                    <input type="hidden" name="edit_product_id" id="" value="<?= $product['id']?>">
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
