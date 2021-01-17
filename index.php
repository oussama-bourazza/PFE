<?php
require ('connexion/connect.php');
require ('loader.php');
session_start();
include ('instance.php');

?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery.js"></script>
    
    
     
    <style>
        body{
            background-color: rgb(229,229,229);
        }
        a{
            color: black;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
    
     <script src="js/script.js"></script>
    
    
</head>
<body>
    
   
<center>
<div  class="c1">
    
    <div class="container-fluid">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>
        <!-- Body connecté -->
        
        <?php include 'includes/headerc.php'; ?>
        
        <!-- Body     Non connecté-->
        
        <div class="container-fluid" id="bi" style="background-image:url('icons/background1.jpg');margin:0%;background-repeat: no-repeat;background-size: 100% 100%;border:solid 2px black;">
            
             
            <?php 
                if(!isset($_SESSION['login']) || !isset($_SESSION['mdp'])){ ?>
            <div class="container" style="margin-top:50px;">
                <button class="btn btn-success" onclick="myfunction('login')" style="margin-right:5px;">SE CONNECTER</button>
                <button class="btn btn-primary" onclick="myfunction('inscrire')">S'INSCRIRE</button>
            </div>
            <div style="color:red;margin-top:50px;height:20px;"><span style="font-weight:bold;"><?php echo $_SESSION['status']; ?></span></div>
            <div class="container" style="float:center;display:inline;width:800px;" id="bo">  
                  <h1 style="color:white;margin-top:35px;font-weight:bold;">Be The Local Hero!</h1>
                    <p style="color:white;margin-top:50px;margin-bottom:300px;font-size:20px;">
                         kdefllkdsgldsfkdefllkdsgldsfkdefllkdsgldsfkdefllkdsgldsf<br>kdefllkdsgldsfkdefllkdsgldsf
                       
                    </p>
                    
            </div>
            <?php } 
                else{
            ?>
            
            <!-- utilisateur Connecté -->
            
            
            <?php } ?>
        </div>
        
        <!--Footer-->
        
        <?php include 'includes/footer.php'; ?>
        
        
    </div>
        
</div>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   
    
</body>
</html>


