<?php
    $mysqli=mysqli_connect("localhost","parksa","961209","phptest2");
    if(mysqli_connect_errno()){
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
    }
    else{
        $sql="create table senior (
            num int(3) not null primary key,
            rice varchar(30) not null,
            soup varchar(30) not null,
            sidedish1 varchar(30) not null,
            sidedish2 varchar(30) not null,
            sidedish3 varchar(30) not null,
            sidedish4 varchar(30) not null
            )";
        $res=mysqli_query($mysqli,$sql);
        if($res === TRUE){
            echo "Table senior successfully created";
        }else{
            printf("Could not create table:%s\n", mysqli_error($mysqli));
        }
    mysqli_close($mysqli);
    }
    ?>
