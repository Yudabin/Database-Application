<?php
 $vitaminType="";
 $vitaminInfo="";
 $weight="";
$height="";
$diet = "";
if(isset($_POST['submitted'])){
    $vitaminType = strtoupper($_POST['vitaminSearch']);
    $weight = $_POST['weight'];
    $height = $_POST['height'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://use.fontawesome.com/releases/v5.2.0/js/all.js"></script>
        <title>Vitamin Search</title>
    </head>
    <style>
        .navbar {
            width: 90%;
            background-color: #efefef;
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
        body{
            margin: 0;
            padding: 0;
            background: #fffff;
        }
        .search-box{
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 400px;
            height: 40px;
            border-radius: 40px;
            padding: 10px;
        }
        .search-text{
            width: 300px;
            margin-left: 10px;
            height: 30px;
            border-color: black;
        }
        .search-btn{
            color:#000;
            float: right;
            margin-top: 0px;
            width: 40px;
            height: 40px;
            border-radius: 50% ;
            background-color: orange;
        }
        .search{
            position:absolute;
            top: 15%;
            left: 25%;
            /*background: #efefef;*/
            width: 700px;
            height: 800px;
            border-radius: 40px;
            padding: 10px;
            background-color: rgba( 255, 255, 255, 0.7 );
        }
        h3
        {
            text-align: center;
        }
        table{
            margin-top: 150px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
            
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
       .search-btn1{
            color:#000;
            margin-top: 0px;
            width: 40px;
            height: 40px;
            border-radius: 50% ;
            background-color: orange;
        }
        .search-box1{
            position: absolute;
            top: 500px;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #4CAF50;
            width: 500px;
            height: 40px;
            border-radius: 20px;
            padding: 10px;
        }
       .search-text1{
            width: 150px;
            margin-left: 50px;
            height: 30px;
            border-color: black;
        }
        .search-text2{
            width: 150px;
            height: 30px;
            border-color: black;
        }
        .dietTable{
            margin-top: 20%;
            text-align: center;
        }
        
        
    </style>
    <body>
         
        <div class="navbar">
            <div style="position:absolute; top:0px; left:0px;">
                <img src="../img/spoonplus.png" width="150%" height="70">
            </div>
        <a href='home.php'><i class="fa fa-fw fa-home"></i>Home</a>
        <a class="active" href='search.php'><i class="fa fa-fw fa-home"></i>Search</a>
        </div>
        <!--<div style="position:relative; ">-->
        <img src="../img/vitamin.jpg" width="100%" height="80%" >
        <form action="search.php" method="POST">
            <?php
//        $vitaminType="";
        
                $mysqli= mysqli_connect("localhost","ydb","961016","phptest");
                if(mysqli_connect_errno()){
                    printf("Connection filed:%s\n", mysqli_connect_error());
                    exit();
                }else{
                    $sql="SELECT * FROM vitamin";
                //            " where vitamintype=['vitaminSearch']"; 
                    $res= mysqli_query($mysqli,$sql);
                if($res){
                    while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
                       
                        if($vitaminType === $row['vitamintype'])
                        {
            //                $vitaminType=$row['vitamintype'];
                            $vitaminInfo=$row['vitamininfo'];
                        }
                        
                    }
                    mysqli_close($mysqli);
                }
            }
?>
        <!--<form action="search.php" method="POST">-->
        <div class="search">
            <h3>비타민 정보에 대해 궁금하시다면 검색해주세요!</h3>
        <div class="search-box">
            
            <font color="white">검색: </font><input class="search-text" type="text" name="vitaminSearch" placeholder="Type to search">
            <input type="hidden" name="submitted" value="true">
           <input class="search-btn" type="submit" value="검색">
<!--            <a class="search-btn" href="#">
                <i class="fas fa-search"></i>
                <img src="../img/search1.png" width="100%">
            </a>-->
        </div>

            
      <table>
    <tr>
        <th width="90px">비타민 타입</th>
        <th>비타민 정보</th>
    </tr>
    <tr>
        <td>
            <?php echo $vitaminType ?>
        </td>
        <td>
             <?php echo $vitaminInfo ?>
        </td>
    </tr>
</table>
            <hr/>
            <?php 
                $standard = (((int)$height-100)*0.9);
                $obesity = ((int)$weight/(int)$standard)*100;
                ?>
        <div class="Obesity">
            <br/>
            <h3>비만도(BMI)란?</h3>
            <p>체질량지수(BMI=body mass index)는 카우프지수로 비만을 평가하는 지수이며 세계적으로 쓰이는 공통표준지수입니다.</p>
            <p>체지방의 정도를 표준체중보다 비교적 정확하게 반영할 수 있고 매우 간단히 규정할 수 있는 장점이 있습니다.</p>
            <div class="search-box1">
            <font color="white">검색: </font><input class="search-text1" type="text" name="weight" placeholder="몸무게">
            <input class="search-text2" type="text" name="height" placeholder="키">
            <input type="hidden" name="submitted1" value="true">
            <input class="search-btn1" type="submit" value="검색">
          
            <?php 
            if($obesity>0 && $obesity<90)
            {
                $diet = "저체중";
            }else if($obesity>=90 && $obesity<110)
            {
                $diet = "정상";
            }else if($obesity>=110 && $obesity<120)
            {
                $diet = "과체중";
            }else if($obesity>=120 && $obesity<150)
            {
                $diet = "비만";
            }else if($obesity>=150 && $obesity<200)
            {
                $diet = "고도비만";
            }else if($obesity>=200)
            {   
                $diet = "초고도비만";
            }
            ?>
            </div>
            <div class="dietTable">
            <div style ="text-align: center">
            <p><font size="5" color="red"><?php echo $diet; ?></font></p>
            </div>
            <font size="3" color="black">
                <?php if($diet === "저체중")
            {echo  "우리 몸에 사용해야 하는 영양분이 부족한 상태가 됩니다. 영양분이 부족한 상태가 되면 세포 대사율이 낮아지고 근육과 뼈, 혈관이 모두 약해져 면역력이 떨어지게 됩니다. 결국 질병에 걸릴 확률도 높아지며 회복속도도 더디게 됩니다.";
            echo "<br>";
            echo "식욕은 그대로인데 체중이 자꾸 감소한다면 당뇨병을 의심해 볼 필요가 있습니다.";
            echo "<br>";
            echo "체중을 늘리기 위해서는 근육량을 늘리는 것이 가장 좋은 방법입니다. 체중을 늘리기 위해 운동은 하지 않고 무작정 식사량만 늘리게 되면 우리 몸의 지방만 채우는 결과를 가져올 수 있습니다. ";
            echo "<br>";
            echo "고기, 생선, 두부, 비타민, 아연섭취";
            }
            else if($diet === "과체중"){
                echo "정상체중을 초과하여 체중이 늘어난 상태로 비만에 이르기 직전의 단계입니다.";
                echo "<br>";
                echo "식단조절을 할 필요가 있어요.";
            }
            else if($diet === "비만"){
                echo "과체중을 이미 넘어서 각종 질환에 노출될 위험이 높을 정도로 체중이 많은 상태입니다.";
                echo "<br>";
                echo "관리 요망!!";
            }
            else if($diet === "고도비만"){
                echo "비만을 이미 넘어서 각종 질환에 노출될 위험이 높을 정도로 체중이 많은 상태입니다.";
                echo "<br>";
                echo "당뇨병, 고혈압, 고지혈증, 관상동맥질환 및 각종 암과 관절질환 발병률이 더 높습니다.";
                echo "<br>";
                echo "관리 시급!!";
            }
            ?></font>
            </div>
        
  </div>
      
        </form>
        
        
    </body>
    
</html>
