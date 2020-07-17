<?php
 $foodname="";
 $dishname="";
 $calorieInfo="";
if(isset($_POST['submitted'])){
    $foodname = ($_POST['food']);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>열량 검색</title>
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
    h2{
            margin-top: 28%;
            text-align: center;
            color: black;
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
            background-color: blueviolet;
        }
        .search-box{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 400px;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
        }
        p{
            text-align: center;
            margin-top: 40px;
            color: black;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 30px;
        }
        td, th {
            border: 1px solid #000;
            text-align: left;
            padding: 8px;
            text-align: center;
            color: black;
        }
tr:nth-child(even) {
  background-color: #ffffff;
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
            <a href='withdrawal.php'>탈퇴</a>     
            <a class="active" href='caloriesearch.php'>Calorie</a>
            <a href='caloriemanage.php'>Calorie Manage</a>
            <a href="search.php">Search</a>

        </div>
        <img src="../img/caloriesearch2.png" width="100%" height="80%" >
        
        <div class="search">
        <h1><font color='orange'>Spoonplus 열량 계산</h1>
        <p>예) 잡곡밥, 돈까스, 고등어구이</p>
        <div class="search-box">
             <?php              
                $mysqli= mysqli_connect("localhost","parksa","961209","phptest");
                if(mysqli_connect_errno()){
                    printf("Connection filed:%s\n", mysqli_connect_error());
                    exit();
                }else{
                    $sql="select * from calorie";
                    $res=mysqli_query($mysqli,$sql);
                    if($res){
                        while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                            if($foodname === $row['dishname'])
                            {
                                $calorieInfo = $row['calorieinfo'];
//                                echo $row['calorieinfo'];
                            }
                        }
                    mysqli_close($mysqli);
                }
            }
            ?>
        <form method="POST" action="">
            <input class="search-text"type="text" name="food" placeholder="음식명을 입력해주세요.">
            <input type="hidden" name="submitted" value="true">
            <input class="search-btn" type="submit" name="submit" value="계산">
            
            <table>
                <tr>
                    <th><?php if(isset($_POST['submitted']))
                    {echo $foodname;
                    echo "의 Calorie";
                    }
                    else{
                        echo "Calorie";
                    }?></th>
                    
                </tr>
                <tr>
                   <td><?php echo $calorieInfo; ?></td>
                </tr>
            </table>
        </form>
         
        </div>
        <br>
        <br>
       
        </div>
    </body>
</html>
