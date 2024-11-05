<?php
session_start();
    require_once "db.php";
    require_once "util.php";

    $db = new Database();
    $util = new Util();

    if (isset($_POST["adduser"])) {
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $userpassword = $util->testInput($_POST['userpassword']);

        if ($db->insert($fname, $lname, $email, $userpassword)) {
            echo $util->showMessage("success", "User inserted successfully!");
        } else {
            echo $util->showMessage("danger","Something went wrong!");
        }
    }

    if (isset($_POST["addmember"])) {
        $username = $util->testInput($_POST['username']);       
        $email = $util->testInput($_POST['email']);
        $password = $util->testInput($_POST['password']);
       

        if ($db->insertmember($username, $email, $password)) {
            echo $util->showMessage("success", "Member inserted successfully!");
        } else {
            echo $util->showMessage("danger","Something went wrong!");
        }
    }
    if (isset($_POST["login"])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $users = $db->login($email, $pass);
    }

    if (isset($_GET["read"])) {
        $users = $db->read();
        $output = '';
        if ($users) {
            foreach ($users as $row) {
                $output .= '<tr>
                            <td>'. $row['id'] . '</td>
                            <td>'. $row['first_name'] . '</td>
                            <td>'. $row['last_name'] . '</td>
                            <td>'. $row['email'] . '</td>
                            <td>'. $row['phone'] . '</td>
                            <td>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-success btn-sm rounded-pull py-0 editlink" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</a>
                                <a href="#" id="'. $row['id'] .'" class="btn btn-danger btn-sm rounded-pull py-0 deletelink">delete</a>
                            </td>
                            </tr>';
            }
            echo $output;
        } else {
            echo '<tr>
                <td colspan="6">No users found in the Database</td>
            </tr>';
        }
    }

    if (isset($_GET['edit'])) {
        $id = $_GET['id'];
        $user = $db->readOne($id);
        echo json_encode($user);
    }

    if (isset($_POST['update'])) {
        $id = $util->testInput($_POST['id']);
        $fname = $util->testInput($_POST['fname']);
        $lname = $util->testInput($_POST['lname']);
        $email = $util->testInput($_POST['email']);
        $phone = $util->testInput($_POST['phone']);

        if ($db->update($id, $fname, $lname, $email, $phone)){
            echo $util->showMessage("success", "User updated successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    if (isset($_GET["delete"])) {
        $id = $_GET['id'];
        if ($db->delete($id)) {
            echo $util->showMessage("info", "User deleted successfully!");
        } else {
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }
?>