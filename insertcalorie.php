<?php
$mysqli= mysqli_connect("localhost","ydb" , "961016", "phptest");
if(mysqli_connect_errno()){
    printf("Connection filed:%s\n", mysqli_connect_error());
    exit();
}
else{
      $sql="insert into calorie(dishname, calorieinfo) 
           values
           ('잡곡밥', 352),
           ('흰밥', 357),
           ('미역국', 94),
           ('된장국', 49),
           ('김치찌개', 250),
           ('소고기무국', 122),
           ('순두부찌개', 200),
           ('청국장', 271),
           ('꽁치조림', 262),
           ('고등어구이', 172),
           ('갈치조림', 97),
           ('배추김치', 29),
           ('취나물볶음', 168),
           ('연두부', 62),
           ('깐쇼새우', 442),
           ('돼지불고기', 537),
           ('계란말이', 112),
           ('계란후라이', 105),
           ('시금치나물', 15),
           ('콩나물무침', 60),
           ('도토리묵무침', 15),
           ('호박전', 108),
           ('미나리나물', 35),
           ('호박나물', 40),
           ('취나물무침', 37),
           ('잡채', 280),
           ('제육볶음', 227),
           ('쭈꾸미볶음', 192),
           ('두부', 97),
           ('돈까스', 242),
           ('코다리조림', 108),
           ('된장찌개', 100),
           ('해물완자전', 155),
           ('메추리알장조림', 89),
           ('삼치구이', 96),
           ('꽁치구이', 180),
           ('갈치구이', 102),
           ('애호박볶음', 90),
           ('생선까스', 179),
           ('부대찌개', 626),
           ('아욱된장국', 102),
           ('시금치된장국', 45),
           ('차조밥', 358),
           ('검은콩밥', 264),
           ('어묵볶음', 131),
           ('감자볶음', 107),
           ('감자전', 140),
           ('양배추쌈', 56),
           ('고등어조림', 172),
           ('우엉조림', 135),
           ('미소장국', 84),
           ('스크램블에그', 199),
           ('김치볶음밥', 384),
           ('참나물무침', 26),
           ('연근튀김', 165),
           ('무나물', 30),
           ('시래기나물', 38),
           ('연포탕', 190),
           ('가지나물', 38),
           ('비름나물', 56),
           ('두부조림', 188),
           ('두부구이', 118),
           ('두부부침', 111),
           ('마파두부', 143),
           ('계란국', 49),
           ('토란국', 29),
           ('연근조림', 62)";
           
    $res=mysqli_query($mysqli,$sql);
            if($res === TRUE)
            {
                echo "table insert success";
            } else{
                printf("Could not insert record:%s\n", mysqli_error($mysqli));
            }
            mysqli_close($mysqli);
}
?>
