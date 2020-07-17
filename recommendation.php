
<?php
session_start();
$userid= $_REQUEST['userid'];
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Spoon Plus_식단추천</title>
    </head>
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
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      text-align: center;
    }
    .tr:nth-child(even) {
      background-color: #dddddd;
    }
   
    table{
        margin-top: 10%;
        width: 100%;
    }
/*    td, th{
        text-align: center;
    }
    tr{
        border: 2px;
    }*/
    .search{
            position:absolute;
            top: 15%;
            left: 25%;
            /*background: #efefef;*/
            width: 700px;
            height: 450px;
            border-radius: 40px;
            padding: 10px;
            background-color: rgba( 255, 255, 255, 0.7 );
        }
        .check1{
            position: absolute;
            width: 190px;
        }
        .check2{
            position: absolute;
            margin-left: 30%;
            width: 190px;
        }
        .check3{
            position: absolute;
            margin-left: 60%;
            width: 190px;
        }
    </style>
    <body>
        
        <div class="navbar">
            <div style="position:absolute; top:0px; left:0px;">
                <img src="../img/spoonplus.png" width="150%" height="70">
            </div>
        <a href='home.php?userid=<?php echo $userid ?>'><i class="fa fa-fw fa-home"></i>Home</a>
        <a href="profile.php?userid=<?php echo $userid ?>">Profile</a>
        <a class="active" href='recommendation.php?userid=<?php echo $userid ?>'>Recommendation</a>
       
        </div>        
       
             <?php
                $mysqli= mysqli_connect("localhost","parksa","961209","phptest");
                if(mysqli_connect_errno()){
                    printf("Connection filed:%s \n", mysqli_connect_error());
                    exit();
                } else {
                    $sql= "SELECT * FROM member";
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
         <div style="position:absolute; top:30px; right:200px; ">
            <?php echo $username."님 안녕하세요!" ?>
            <input type="button" value="로그아웃" onClick="location.href='home.php'">

        </div>
        <div class="search">
            <h1><font color='orange'><?php echo $username ?></font>님에게 추천하는 식단</h1>
    
            <div class='check1'>
               
            <table>

            <?php
                $mysqli= mysqli_connect("localhost","parksa","961209","phptest");
                
                $sql="SELECT * FROM children order by rand()";
                $res= mysqli_query($mysqli,$sql);
                $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
               
            ?>
            
            <?php
                $mysqli= mysqli_connect("localhost","parksa","961209","phptest");
                
                $sql="SELECT * FROM senior order by rand()";
                $res= mysqli_query($mysqli,$sql);
                $result1Arr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $result1Arr[] = $r;
                }
                $resulta1 = $result1Arr[0];
            ?>
           
        
        <tr>
            <th>월</th>
            <td> <?php if($userage <= 7) {
                    echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];
            }
            ?>
                <br>
            <?php if($userage <= 7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <= 7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
         <?php if($userage <= 7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
           <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
      
            <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $resultArr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $resultArr[] = $r;
                    }
                    $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>화</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
             <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
         <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } 
            ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>수</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>목</th>
            <td> <?php if($userage <=7) {
                    echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>금</th>
             <td> <?php if($userage <=7) {
                 echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>토</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
         <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>일</th>
           <td> <?php if($userage <=7) {
               echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        </table>
        </div>
            <div class='check2'>
               
            <table>
            <?php
                $sql="SELECT * FROM children order by rand()";
                $res= mysqli_query($mysqli,$sql);
                $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
             <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        
        <tr>
            <th>월</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
      
            <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
            <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>화</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>수</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>목</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>금</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>토</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>일</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        </table>
        </div>
            <div class='check3'>
                
<!--                <input type="submit" name="submit" value="확인">-->
            <table>
            <?php
                $sql="SELECT * FROM children order by rand()";
                $res= mysqli_query($mysqli,$sql);
                $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
          <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        
        <tr>
            <th>월</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
      
            <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>화</th>
           <td> <?php if($userage <=7) {
               echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>수</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>목</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <tr>
            <th>금</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>토</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        
        <?php
            $sql="SELECT * FROM children order by rand()";
                    $res= mysqli_query($mysqli,$sql);
             $resultArr = array();
                while($r = mysqli_fetch_assoc($res)){
                    $resultArr[] = $r;
                }
                $resulta = $resultArr[0];
            ?>
        <?php
            $sql="SELECT * FROM senior order by rand()";
                    $res= mysqli_query($mysqli,$sql);
                    $result1Arr = array();
                    while($r = mysqli_fetch_assoc($res)){
                        $result1Arr[] = $r;
                    }
                    $resulta1 = $result1Arr[0];
            ?>
        <tr>
            <th>일</th>
            <td> <?php if($userage <=7) {
                echo $resulta["calorie"];
                    echo "<br>";
                    echo $resulta["rice"];
            } else {echo $resulta1["rice"];}
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["soup"];
            } else { echo $resulta1["soup"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish1"];
            } else { echo $resulta1["sidedish1"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish2"];
            } else { echo $resulta1["sidedish2"]; }
            ?>
                <br>
            <?php if($userage <=7) {
                echo $resulta["sidedish3"];
            } else { echo $resulta1["sidedish3"]; }
            ?>
                <br>
            <?php if($userage >= 21) {
                echo $resulta1["sidedish4"];
            } ?>
            </td>
        </tr>
        </table>
                
            </div>
            
            
        </form>
        
        </div>
           

    </body>
</html>
