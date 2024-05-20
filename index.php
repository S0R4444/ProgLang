<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit();
}

require_once "database.php";


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM users WHERE id = $delete_id";
    if (mysqli_query($conn, $sql_delete)) {
        $message = "User deleted successfully";
    } else {
        $message = "Error deleting user: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    $sql_update = "UPDATE users SET full_name='$full_name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql_update)) {
        $message = "User updated successfully";
    } else {
        $message = "Error updating user: " . mysqli_error($conn);
    }
}

$users = [];

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    } else {
        $error_message = "No users found";
    }
} else {
    $error_message = "Error: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            color: #00008B; 
        }

        .table {
            color: #00008B; 
            background-color: white; 
        }
    </style>
</head>
<body style="background-image: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExZG93YXdkbjRnMXk1a2I5b3F4MGthN2lkY2ZlbzVhMTE5ZTQ3d2RnNiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/xT9DPQb5T0MSMRyHiU/giphy.gif'); background-size: cover; background-repeat: no-repeat;">
    <div class="container-fluid">
        <h1>Welcome to Dashboard</h1>

        <?php if (isset($message)) : ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php else : ?>
            <h2>User Data</h2>
            <table id="userTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td> 
                            <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td>
                                
                                <a href="?delete_id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                
                                <form method="post" action="" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                    <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                                    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                                    <button type="submit" name="update_user" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="logout.php" class="btn btn-warning">Logout</a>
            <div>

            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
</body>
</html>