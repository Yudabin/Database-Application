
<?php
$mysqli= mysqli_connect("localhost","parksa" , "961209", "phptest");
if(mysqli_connect_errno()){
    printf("Connection filed:%s\n", mysqli_connect_error());
    exit();
}
else{
      $sql="update member set email = '$_POST[modifyemail]' where email = '$_POST[nowemail]'";
      $res=mysqli_query($mysqli,$sql);
            if($res === TRUE)
            {
                header('Location: http://localhost:8080/member/withdrawal.php');
            } else{
                printf("Could not insert record:%s\n", mysqli_error($mysqli));
            }
            mysqli_close($mysqli);
}
?>
