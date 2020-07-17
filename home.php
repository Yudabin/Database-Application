
<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Spoonplus</title>
<script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
  <style>
      .body{
          margin:0;
          padding:0;
          background: #efefef;
          font-size: 16px;
          color: #777;
          font-family: sans-serif;
          font-weight: 300;
          
      }
      .right-box{
          position:absolute;
          top: 0;
          left: 0;
          /*right:0;*/
          box-sizing: border-box;
          background-color: #fff;
          margin-top: 300px;
          margin-left: 20px;
          padding: 10px;
          width: 300px;
          height: 400px;
           background-color: rgba( 255, 255, 255, 0.7 )
         
      }
      .left-box{
          position:absolute;
          top: 0;
          right: 0;
          /*right:0;*/
          box-sizing: border-box;
          background-color: #fff;
          margin-top: 300px;
          margin-right: 20px;
          padding: 10px;
          width: 300px;
          height: 300px;
           background-color: rgba( 255, 255, 255, 0.7 )
         
      }
      h1{
          text-align: center;
      }
     
      input[type="text"],input[type="password"]{
          display: block;
          box-sizing: border-box;
          margin-bottom: 20px;
          padding: 4px;
          width: 220px;
          height: 32px;
          border: none;
          outline: none;
          border-bottom: 1px solid #aaa;
          font-family: sans-serif;
          font-weight: 400;
          font-size: 15px;
          transition: 0.2s ease;
          
      }
      input[type="submit"]{
          margin-bottom: 28px;
          width: 120px;
          height: 32px;
          background: #f44336;
          border: none;
          border-radius: 2px;
          color: #fff;
          font-family: sans-serif;
          font-weight: 500;
          text-transform: uppercase;
          transition: 0.2s ease;
          cursor: pointer;
      }
      input[type="submit"]:hover,
      input[type="submit"]:focus{
          background: #ff5722;
          transition: 0.2s ease;
      }
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
       .active {
         background-color: #4CAF50;
       }
       
  </style>

</head>
<body style="background-color:#ffffff">
    <div class="navbar">
        <div style="position:absolute; top:0px; left:0px;">
            <img src="../img/spoonplus.png" width="150%" height="70">
        </div>
    <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href='board.php'>Board</a>
    <a href='withdrawal.php'>탈퇴</a>
    <a href='caloriesearch.php'>Calorie</a>
    <a href='caloriemanage.php'>Calorie Manage</a>
    <a href="search.php">Search</a>
        
    </div>

        <img src="../img/home.png" width="100%" height="650px">
    <div id="signup-box">
        <form action="insert.php" method="POST">
         <div class =" right-box">
             <h1> Sign Up</h1>
             <p>Please fill in this form to create an account.</p>
             <input type="text" name="name" placeholder="Username"/>
             <input type="text" name="email" placeholder="Email"/>
             <input type="password" name="password" placeholder="Password"/>
             <input type = "text" name = "gender" placeholder="여자 또는 남자로 입력해주세요."/> 

            <input type = "text" name="age" placeholder="Age"/>
            <input type="submit" name="signup-button" value="Sign Up" onclick="javascript:btn()"/>

            <script> function btn(){ alert('회원가입이 완료되었습니다.'); } </script>
            
        </div>
        </form>
    </div>
        
     <div id="signin-box">
         <div class ="left-box">
             <h1>Sign In</h1>
             <form action="login.php" method="POST">
             <input type="text" name="email" placeholder="Email"/>
             <input type="password" name="password" placeholder="Password"/>
             <input type="submit" name="signup-button" value="Sign In"/>
            
        </div>
    </div>

</body>
</html>
