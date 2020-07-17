
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>회원 탈퇴</title>
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
    h1 {
       text-align: center;
    }
     .search{
            position:absolute;
            top: 15%;
            left: 25%;
            /*background: #efefef;*/
            width: 700px;
            height: 400px;
            border-radius: 40px;
            padding: 10px;
            background-color: rgba( 255, 255, 255, 0.7 );
            /*background-color: #efefef;*/
            border: 1px solid #000;
    }
    .search-text{
            width: 200px;
            margin-left: 30px;
            height: 30px;
            border-color: black;
        }
        .search-btn{
            color:#fff;
            margin-top: 0px;
            width: 100px;
            height: 40px;
            /*border-radius: 50% ;*/
            background-color: blueviolet;
        }
        .search-box{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 400px;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
        }
        .search-box1{
            position: absolute;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 600px;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
        }
        
    </style>
    </head>
    <body>
      <div class="navbar">
        <div style="position:absolute; top:0px; left:0px;">
            <img src="../img/spoonplus.png" width="150%" height="70">
        </div>
            <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a href='board.php'>Board</a>   
            <a class="active" href='withdrawal.php'>탈퇴</a>     
            <a href='caloriesearch.php'>Calorie</a>
            <a href='caloriemanage.php'>Calorie Manage</a>
            <a href='search.php'>Search</a>
        </div>
        
        <img src="../img/pooh1.png" width="100%" height="30%" >
        <div class="search">
        <h1><font color='orange'>회원탈퇴</h1>
         <div class="search-box">
        <form method="POST" action="">
            <input class="search-text" type="text" name="withdrawemail" placeholder="이메일을 입력해주세요.">
            <input class="search-btn" type="submit" name="submit" value="회원탈퇴">
        </form>
         </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <?php
            if(isset($_POST['submit'])) {
                if(isset($_POST['withdrawemail'])) {
                    $enter = $_POST['withdrawemail'];
                    $mysqli= mysqli_connect("localhost","ydb" , "961016", "phptest");
                    if(mysqli_connect_errno()){
                    printf("Connection filed:%s\n", mysqli_connect_error());
                    exit();
                    }
                else{
                    $sql="delete from member where email = '$enter'";
      
                    $res=mysqli_query($mysqli,$sql);
                if($res === TRUE)
                 {
                    
                    echo "회원탈퇴가 되었습니다. ^.^";
                 } else{
                    printf("Could not insert record:%s\n", mysqli_error($mysqli));
                }
                     mysqli_close($mysqli);
}
                }
            }
        ?>
        
        <h1><font color='orange'>회원정보수정</h1>
        <div class="search-box1">
        <form method="POST" action="withdrawalaction.php">
            <input class="search-text" type="text" name="nowemail" placeholder="현재 이메일을 입력해주세요.">
            <input class="search-text" type="text" name="modifyemail" placeholder="새로운 이메일을 입력해주세요.">
            <input class="search-btn" type="submit" name="submit" value="회원정보수정">
        </form>
            </div>
        <br>
        <br>
 
        </div>
    </body>
</html>
