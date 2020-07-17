<?php
    $mysql=mysqli_connect("localhost","ydb","961016","phptest");
    if(mysqli_connect_errno()){
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
    }
    else{
        $sql="create table Children (
                num int not null primary key,
                rice varchar(20) not null,
                soup varchar(20) not null,
                sidedish1 varchar(20) not null,
                sidedish2 varchar(20) not null,
                sidedish3 varchar(20) not null,
                calorie int not null)";
        $res=mysqli_query($mysql,$sql);
        if($res === TRUE){
            echo "Table member successfully created";
        }else{
            printf("Could not create table:%s\n", mysqli_error($mysql));
        }
    mysqli_close($mysql);
    }
    ?>
