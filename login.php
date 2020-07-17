 <?php
    session_start();
    $mysqli= mysqli_connect("localhost","sapark","961209","phptest");
    $userid=$_POST['email'];
    $userpassword=$_POST['password'];

    
   //echo $userpassword;
        if(mysqli_connect_errno()){
            printf("Connection filed:%s \n", mysqli_connect_error());
            exit();
        } else {
            $sql="SELECT * FROM member";
            $res= mysqli_query($mysqli,$sql);
           
            if($res) {
                while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    if($userid === $row['email'] && $userpassword === $row['password']) {
                        header('Location: http://localhost:8080/member/profile.php?useremail='.$userid);
                    }
                   
                }
            }
            
            mysqli_close($mysqli);
        }
    ?>
