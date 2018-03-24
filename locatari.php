<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$databasename = "user";
$connect = mysqli_connect($host, $username, $password, $databasename);

if ($_POST['action'] == 'addUser') {
    $ap = $_POST['ap'];
    $nume = $_POST['nume'];
    $nr_pers = $_POST['nr_pers'];
    $sql = "insert into users (email, pwd, role) values('$nume''$ap', '$nume''$nr_pers', 'locatar')";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $sql = "insert into locatari (ap, nume, nr_pers, user_id) values(''$ap', '$nume', '$nr_pers', $id)";
        $result = mysqli_query($connect, $sql);
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
} else if ($_POST['action'] == 'editUser') {
    $ap = $_POST['ap'];
    $nume = $_POST['nume'];
    $nr_pers = $_POST['nr_pers'];
    $id = $_POST['id'];
    $sql = "update users set nume = '$nume', ap = '$ap', nr_pers = '$nr_pers' where id = $id";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
} else if ($_POST['action'] == 'deleteUser') {
    $id = $_POST['id'];
    $sql = "delete from locatari where user_id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "gg";
    } else {
        echo "fail";
    }
    $sql = "delete from users where user_id = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        echo "gg";
    } else {
        echo "fail";
    }
    exit();
} else if ($_POST['action'] == 'getAll') {
    $sql = "select * from locatari";
    $result = mysqli_query($connect, $sql);
    while ($row = $result->fetch_assoc()) {
        $json[] = $row;
    }
    $data['data'] = $json;
    $data['total'] = mysqli_num_rows($result);
    echo json_encode($data);
    exit();
}
?>

