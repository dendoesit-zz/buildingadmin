
<?php
    session_start();
    if(isset($_POST['do_login'])){
        $host="localhost";
         $username="root";
         $password="";
         $databasename="user";
         $connect=mysqli_connect($host,$username,$password,$databasename);
          $email=$_POST['email'];
            $pass=$_POST['password'];
         $sql = "select * from users where email='$email' and pw='$pass'";
         $result = mysqli_query($connect,$sql);
         if($row = mysqli_fetch_assoc($result))
         {
          $_SESSION['email']=$row['email'];
            $_SESSION['role']=$row['role'];
          echo "gg";
         }
         else
         {
          echo "fail";
         }
         exit();
}

?>