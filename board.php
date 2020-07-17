

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Board</title>
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
            top: 30%;
            left: 25%;
            /*background: #efefef;*/
            width: 700px;
            height: 400px;
            border-radius: 40px;
            padding: 10px;
            background-color: rgba( 255, 255, 255, 0.5 );
            border: 1px solid #000;
    }
    .search-text{
            width: 300px;
            margin-left: 30px;
            height: 30px;
            border-color: black;
        }
        .search-btn{
            color:#fff;
            margin-top: 0px;
            width: 40px;
            height: 40px;
            border-radius: 50% ;
            background-color: orange;
        }
        .search-box{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 400px;
            height: 70px;
            border-radius: 40px;
            padding: 10px;
        }
        p{
            color: #000;
        }
    </style>
    </head>
    <body>
       <div class="navbar">
        <div style="position:absolute; top:0px; left:0px;">
            <img src="../img/spoonplus.png" width="150%" height="70">
        </div>
            <a href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
            <a class="active" href='board.php'>Board</a>   
            <a href='withdrawal.php'>탈퇴</a>     
            <a href='caloriesearch.php'>Calorie</a>
            <a href='caloriemanage.php'>Calorie Manage</a>
            <a href='search.php'>Search</a>
        </div>
        <img src="../img/board1.png" width="100%" height="30%" >
        
        <div class="search">
        <h1><font color='orange'>Spoonplus 게시판</h1>
        <div class="search-box">
        <form method="POST" action="boardaction.php">
            <input class="search-text" type="text" name="email" placeholder="이메일을 입력해주세요.">
            <input class="search-text" type="text" name="review" placeholder="의견을 입력해주세요.">
            <input class="search-btn" type="submit" name="submit" value="의견전송">
        </form>
        <br>
        <br>
    </body>
</html>
