
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
    <style>
        td {
            border: solid 1px grey
        }
        button {
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color: grey;">


<h2>All Users</h2>
<table id="tableID" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Delete</th>
        <th>View</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user)  {  ?>

        <tr>
            <td> <?= $user["name"] ?></td>
            <td> <?= $user["surname"] ?> </td>
            <td> <?= $user["age"] ?> </td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="id" id="" value="<?= $user['id']?>">
                    <button class="btn btn-primary" type="submit"> Delete </button>
                </form>
            </td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="view_user_id" id="" value="<?= $user['id']?>">
                    <button class="btn btn-primary" type="submit"> View User  </button>
                </form>
            </td>
            <td>
                <form action="" method="POST">
                    <input type="hidden" name="edit_id" id="" value="<?= $user['id']?>">
                    <button class="btn btn-primary" type="submit"> Edit </button>
                </form>
            </td>
        </tr>

    <?php } ?>
    </tbody>
</table>
</div>
<script>
    $(document).ready(function() {
        $('#tableID').DataTable({ });
    });
</script>
</body>

</html>

