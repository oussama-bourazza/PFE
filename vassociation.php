<?php
require ('connexion/connect.php');
require ('loader.php');
session_start();
include ('instance.php');

if(!isset($_SESSION['login']) || !isset($_SESSION['mdp'])) echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
else{
    if(!($user instanceof Admin)) echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
}  

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
<div class="c1">
    
    <div class="container-fluid">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>
        <!-- Body connecté -->
        
        <?php include 'includes/headerc.php'; ?>
        
        <!-- Body     Non connecté-->
        
        <div class="container-fluid" id="bi" style="background-image:url('icons/background1.jpg');margin:0%;background-repeat: no-repeat;background-size: 100% 100%;border:solid 2px black;">
            <div style="font-weight:bold;font-size:30px;color:black;">
                <table class="table table-bordered table-hover" style="background-color:rgb(229,229,229);margin-top:100px;width:70%;margin-bottom:100px;">
                    <thead>
                        <tr>
                        <th colspan="2" style="text-align:center;">Vous êtes l'admin de l'association : <?php echo $user->getassociation()->getnom(); ?></th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <tr>
                        <th>Consulter les demandes d'adhésion</th>
                        <th><a href="consulter.php?op=1"><button class="btn btn-primary" style="width:100px;"><strong>Consulter</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Consulter la liste des adhérents</th>
                        <th><a href="consulter.php?op=2"><button class="btn btn-primary" style="width:100px;"><strong>Consulter</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Consulter la liste des événements</th>
                        <th><a href="consulter.php?op=3"><button class="btn btn-primary" style="width:100px;"><strong>Consulter</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Modifier le nom de l'association</th>
                        <th><a href="modifier.php?op=1"><button class="btn btn-primary" style="width:100px;"><strong>Modifier</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Modifier l'adresse de l'association</th>
                        <th><a href="modifier.php?op=2"><button class="btn btn-primary" style="width:100px;"><strong>Modifier</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Modifier l'email de l'association</th>
                        <th><a href="modifier.php?op=3"><button class="btn btn-primary" style="width:100px;"><strong>Modifier</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Modifier la description de l'association</th>
                        <th><a href="modifier.php?op=4"><button class="btn btn-primary" style="width:100px;"><strong>Modifier</strong></button></a></th>
                    </tr>
                    <tr>
                        <th>Modifier le numero de téléphone de l'association</th>
                        <th><a href="modifier.php?op=5"><button class="btn btn-primary" style="width:100px;"><strong>Modifier</strong></button></a></th>
                    </tr>
                        
                        
                        
                </tbody>
                
                </table>
            
            
            </div>
             
            
            
            
            
            
            
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
