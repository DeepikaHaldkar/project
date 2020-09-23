<?php
include 'master/menu.php';
include 'classes/userclass.php';
$logusr=new userclass();
$logusr->login($_POST["uid"], $_POST["pass"]);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

