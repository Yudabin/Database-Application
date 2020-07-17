
<?php
$mysqli= mysqli_connect("localhost","parksa" , "961209", "phptest");
if(mysqli_connect_errno()){
    printf("Connection filed:%s\n", mysqli_connect_error());
    exit();
}
else{
      $sql="insert into opinion(email, review) values('$_POST[email]','$_POST[review]')";
      $res=mysqli_query($mysqli,$sql);
            if($res === TRUE)
            {
                header('Location: http://localhost:8080/member/board.php');
            } else{
                printf("Could not insert record:%s\n", mysqli_error($mysqli));
            }
            mysqli_close($mysqli);
}
?>
