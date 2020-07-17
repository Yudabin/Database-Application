

<?php
$userid= $_GET['useremail'];
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>profile</title>
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
      <style>
      .navbar {
      width: 90%;
      background-color: #EFEFEF;
      overflow: auto;
      padding-top: 10px;
      padding-left: 130px;
     }
     .navbar a {
      float: left;
      padding: 12px;
      color: white;
      text-decoration: none;
      font-size: 17px;
    }
     .navbar a:hover {
      background-color: orange;
    }
    .active {
      background-color: #4CAF50;
    }
    .td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    .tr:nth-child(even) {
      background-color: #dddddd;
    }
    
    .form1{
       width: 600px;
       margin-top: px;
       margin-left: 430px;
    }
    
    .h1 {
       text-align: center;
    }
    </style>
    </head>
    
    <body>
        
        <?php
        $mysqli= mysqli_connect("localhost","parksa","961209","phptest");
        if(mysqli_connect_errno()){
            printf("Connection filed:%s \n", mysqli_connect_error());
            exit();
        } else {
            $sql="SELECT * FROM member";
            $res= mysqli_query($mysqli,$sql);
           
            if($res) {
                while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    if($userid === $row['email']) {
                        $username= $row['name'];
                        $usergender= $row['gender'];
                        $userage= $row['age'];
                    }
                   
                }
                mysqli_close($mysqli);
            }
        }
      ?>
        <div class="navbar">
            <div style="position:absolute; top:0px; left:0px;">
                <img src="../img/spoonplus.png" width="150%" height="70">
            </div>
        <a href='home.php?userid=<?php echo $userid ?>'><i class="fa fa-fw fa-home"></i>Home</a>
        <a class="active" href="profile.php?userid=<?php echo $userid ?>">Profile</a>
        <a href='recommendation.php?userid=<?php echo $userid ?>'>Recommendation</a>
        <div style="position:absolute; top:30px; right:200px; ">
            <?php echo $username."님 안녕하세요!" ?>
            <input type="button" value="로그아웃" onClick="location.href='home.php'">

        </div>
        </div>
 
        
        <div style="position:absolute; top:100px; left:260px;">
                <img src="../img/profilephoto.jpg" width="100%" height="150">
        </div>
        <div class="form1">
            <form>
                <fieldset>
                    <legend><h1>User Profile</h1></legend>
                  Name: <?php echo $username; ?>
                  <br>
                  E-mail: <?php echo $userid; ?>
                  <br>
                  Gender: <?php echo $usergender; ?>
                  <br>
                  Age: <?php echo $userage; ?>
                  <br>
                  <br>
                  
                </fieldset>
            </form>
        </div>
       
    </body>
</html>
