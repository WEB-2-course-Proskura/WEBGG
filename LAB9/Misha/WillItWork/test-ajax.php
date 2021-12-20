<?php


$res = '';
foreach($_POST as $key=>$value){
    if($key == 'username') $first = 'Имя (Логин)';
    if($key == 'useremail') $first = 'Email';
    if($key == 'skills') {
        $first = 'Знания:';
        if(is_array ($value))$value = implode(', ', $value);
    }
    $res .= "<tr><td>$first</td><td>$value</td></tr>";
}
echo $res;
die();
