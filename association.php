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
<div class="c1">
    
    <div class="container-fluid">
        <!-- Header -->
        <?php include 'includes/header.php'; ?>
        <!-- Body connecté -->
        
        <?php include 'includes/headerc.php'; ?>
        
        <!-- Body     Non connecté-->
        
        <div class="container-fluid" id="bi" style="background-image:url('icons/background1.jpg');margin:0%;background-repeat: no-repeat;background-size: 100% 100%;border:solid 2px black;">
            
            <?php 
                $association = $conn->query("SELECT * FROM associations where id = ".$_GET['id'])->fetch();

                $Association = new Association($association['id'],$association['nom'],$association['adresse'],$association['email'],$association['description'],$association['tel']);
                
             ?>
            
            <div class="panel panel-warning" style="margin-left:3%;margin-top:3%;width:1000px;margin-bottom:100px;">
                <div class="panel-heading"><h3 class="panel-title"><strong>Informations</strong></h3></div>
                <div class="panel-body" style="height:470px;overflow-y: scroll;">
                    <span style="font-weight:bold;text-decoration:underline;font-size:30px;color:brown;"><?php echo $Association->getnom(); ?></span>
                    <div style="text-align:left;margin-top:25px;">
                    <span style="font-size:20px;color:green;"><u><strong>Description:</strong></u></span>
                   <p style="font-size:15px"> <?php echo $Association->getdescription(); ?></p>
                    </div>
                    
                    <div style="text-align:left;margin-top:30px;font-size:15px">
                        <span style="font-size:20px;color:green;"><u><strong>Plus d'info:</strong></u></span>
                        <div>Nombre adhérents : <?php echo $Association->getnbradherents(); ?></div>
                        <div>Région : <?php echo $Association->getregion(); ?></div>
                        <div>Adresse : <?php echo $Association->getadresse(); ?></div>
                        <div>Email : <?php echo $Association->getemail(); ?></div>
                        <div>Tel : <?php echo $Association->gettel(); ?></div>
                        <div>Administrateur : <?php echo $Association->getadmin(); ?></div>
                    </div>
                    
                    <?php //affichage de evenements
                        $afficher = false;
                        if(isset($_SESSION['login']) && isset($_SESSION['mdp'])){
                            if($user instanceof Admin){
                                if($user->est_adherent($Association->getid()) || $user->est_admin_de($Association->getid())) $afficher = true;
                            }
                            else{
                                if($user->est_adherent($Association->getid())) $afficher=true;
                            }
                            if($afficher==true){
                    ?>
                            <div style="text-align:left;margin-top:30px;font-size:15px">
                                <?php
                                    $events = $Association->getevenements();
                                    if(count($events)>0){
                                
                                ?>
                                <span style="font-size:20px;color:green;"><u><strong>Evénements:</strong></u></span><br>
                                <table class="table table-hover ">
                                    <thead>
                                        <tr style="color:gray;">
                                            <td>Nom</td>
                                            <td>Lieu</td>
                                            <td>Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    
                                    foreach($events as $event){
                                ?>
                                    <tr>
                                        <td><?php echo $event->getnom(); ?></td>
                                        <td><?php echo $event->getlieu(); ?></td>
                                        <td><?php echo $event->getDate(); ?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                                </table>
                            </div>
                    <?php  } } 
                            else{ 
                                    if($Association->est_en_attente($user->getid())){ ?>
                    
                                            <div style="font-weight:bold;margin-top:30px;">Ta demande d'adhésion est en cours de traitement</div>
                                            
                                    
                    <?php 
                                     } 
                                    else {
                    ?>
                    
                                        <div style="font-weight:bold;margin-top:30px;">Pour s'adhérer, Cliquez sur le Bouton : 
                                            <a href="<?php echo "dem_adhesion.php?id_association=".$Association->getid(); ?>"><button class="btn btn-primary"><strong>S'adhérer</strong></button></a></div>
                            
                    <?php            }
                            }
                        }
                       else{ 
                    ?>
                            
                            <div style="color:red;font-weight:bold;margin-top:30px;">Pour s'adhérer, vous devez s'inscrire ou se connecter .</div>
                    <?php 
                        }    
                    ?>
                </div>  
            
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
<?php 
    $conn =null;
?>