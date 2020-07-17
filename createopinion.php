

<?php
    $mysql=mysqli_connect("localhost","parksa","961209","phptest");
    if(mysqli_connect_errno()){
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
    }
    else{
        $sql="create table opinion (
                email varchar(30) not null primary key,
                review varchar(200) not null)";
        $res=mysqli_query($mysql,$sql);
        if($res === TRUE){
            echo "Table opinion successfully created";
        }else{
            printf("Could not create table:%s\n", mysqli_error($mysql));
        }
    mysqli_close($mysql);
    }
    ?>
