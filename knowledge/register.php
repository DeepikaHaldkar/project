<?php

include 'classes/userclass.php';
$regusr=new userclass();
$regusr->registration();
header("location:loginregister.php"); 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

