<?php
    $mysql=mysqli_connect("localhost","ydb","961016","phptest");
    if(mysqli_connect_errno()){
        printf("Connect failed:%s\n", mysqli_connect_error());
        exit();
    }
    else{
        $sql="create table vitamin (
    vitamintype varchar(30) not null primary key,
    vitamininfo varchar(255) not null)";
        $res=mysqli_query($mysql,$sql);
        if($res === TRUE){
//            echo "Table member successfully created";
            ;
        }else{
            printf("Could not create table:%s\n", mysqli_error($mysqli));
        }
    mysqli_close($mysql);
    }
    ?>
