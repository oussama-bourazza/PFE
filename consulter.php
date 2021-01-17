<?php
require ('connexion/connect.php');
require ('loader.php');
session_start();
include ('instance.php');

if(!isset($_SESSION['login']) || !isset($_SESSION['mdp']) || !($user instanceof Admin) || !isset($_GET['op'])) echo "<script type='text/javascript'>document.location.replace('index.php');</script>";

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
               <?php if($_GET['op']==1){  // Consulter la liste des demandes d'adhesion
                        $demandes = $user->getdemandes();
                        if(count($demandes)>0){
                ?>
                        <div class="panel panel-info" style="margin-top:50px;overflow-y: scroll;height:500px;margin-bottom:70px;">
                            <div class="panel-heading"><h3 class="panel-title"><strong>Demandes d'adhesions</strong></h3></div>
                            <div class="panel-body" style="color:black;">
                        <table class="table table-hover" style="background-color:white;">
                            <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Username</td>
                                <td>Email</td>
                                <td>Adresse</td>
                                <td>Tel</td>
                            </tr> 
                            </thead>
                            <tbody>
                    <?php  foreach($demandes as $demande){
                            $userx = $demande->getuser();
                    ?>
                            <tr>
                                <td><?php echo $userx->getnom(); ?></td>
                                <td><?php echo $userx->getprenom(); ?></td>
                                <td><?php echo $userx->getusername(); ?></td>
                                <td><?php echo $userx->getemail(); ?></td>
                                <td><?php echo $userx->getadresse(); ?></td>
                                <td><?php echo $userx->gettel(); ?></td>
                                <td><a href="<?php echo "trait_adhesion.php?op=1&&id_user=".$userx->getid(); ?>"><button class="btn btn-success"><strong>Accepter</strong></button></a></td>
                                <td><a href="<?php echo "trait_adhesion.php?op=2&&id_user=".$userx->getid(); ?>"><button class="btn btn-danger"><strong>Refuser</strong></button></a></td>
                            </tr>
                
                <?php } ?>
                        </tbody>
                    </table>
                        </div>
                    </div>
                    <?php }

                    } 
                    else if($_GET['op']==2){    ?>
                
                
                
                <?php } 
                
                    else if($_GET['op']==3){ ?>
                
                
                <?php } else{
                        echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
                    }?>
                            
            
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










