<?php
$data = $_POST['Font'];
$img = $_POST['imageSetter'];
$ret = [];
    switch ($data){
        case 'F1': array_push($ret, 'F1'); break;
        case 'F2': array_push($ret, 'F2'); break;
        case 'F3': array_push($ret, 'F3');
    }
    switch ($img){
        case 'img1': array_push($ret, 'img1'); break;
        case 'img2': array_push($ret, 'img2'); break;
        case 'img3': array_push($ret, 'img3');
    }
    return $ret;


