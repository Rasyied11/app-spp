<?php
session_start();
include_once '../config/database.php';
$db = new database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $db->cek_login($_POST['username'], $_POST['password']);
    if ($login == true) {
        echo ("<script type='text/javascript'>window.location = '../dashboard';</script>");
    } else {
        // Login Failed
        echo ("<script type='text/javascript'>alert('Login Anda Salah');window.location = '../login';</script>");
    }
}
?>

﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SI SPP</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="../assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>
    <style>
        .container {
            display:grid;
            grid-template-columns: 10% auto;
            padding: 4em 1em;
        }   
    </style>
    <body background = "../assets/img/bg.jpg" >
        <div class="container" background-image: url="../assets/img/bg.jpg">
            <div class="row ">         
                <div class="col-md-6 ">
                    <div class="panel panel-success" style="background-color:rgba(255,255,255,0.8);" >
                        <div class="panel-heading" >
                            <strong><div align="center">
                                    Silakan Login Disini
                                </div></strong>  
                        </div>
                        <div class="panel-body ">                           
                            <form action="" method="post" name="login">
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input name="username" type="text" class="form-control" placeholder="Username Anda " required />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input name="password"type="password" class="form-control"  placeholder="Password Anda" required/>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Login" >
                                <hr />
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="../assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="../assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="../    assets/js/custom.js"></script>
    </body>
</html>


