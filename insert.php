
<?php
$mysqli= mysqli_connect("localhost","parksa" , "961209", "phptest");
if(mysqli_connect_errno()){
    printf("Connection filed:%s\n", mysqli_connect_error());
    exit();
}
else{
      $sql="insert into member(email, name, password, gender, age) values('$_POST[email]','$_POST[name]','$_POST[password]','$_POST[gender]','$_POST[age]')";
      $res=mysqli_query($mysqli,$sql);
            if($res === TRUE)
            {
              header('Location: http://localhost:8080/member/home.php');
            } else{
                printf("Could not insert record:%s\n", mysqli_error($mysqli));
            }
            mysqli_close($mysqli);
}
?>
