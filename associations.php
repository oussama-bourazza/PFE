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
        <!-- Body -->
        <?php include 'includes/headerc.php'; ?>
        
        <?php
            $result1 = $conn->query("SELECT * FROM regions");
            if(!isset($_GET['reg'])){
               $result2 = $conn->query("SELECT * FROM associations order by RAND() limit 30");
            }
            else{
               
                $result2 = $conn->query("SELECT * FROM associations where id_region = ".$_GET['region']);
                
            }
            ?>
        <div class="container-fluid" id="bi" style="background-image:url('icons/background1.jpg');margin:0%;background-repeat: no-repeat;background-size: 100% 100%;border:solid 2px black;">
            
            <div class="panel panel-warning" style="margin-left:3%;margin-top:6%;width:500px;float:left;">
                <div class="panel-heading"><h3 class="panel-title"><strong>Choisir une région</strong></h3></div>
                <div class="panel-body" style="color:black;">
                    <form method="get" action="associations.php">
                        <select name="region">
                            <?php while($regiona = $result1->fetch()){ 
                                $region = new Region($regiona['id'],$regiona['nom']);
                            ?>
                            <option value="<?php echo $region->getid() ?>"><?php echo $region->getnom(); ?></option>;
                            <?php } ?>
                        </select><br><br>
                        <input type="submit" value="Valider" class="btn btn-warning" name="reg" />
                    </form>
                </div>  
            
            </div>
            <div class="panel panel-warning" style="margin-right:3%;margin-top:6%;width:1000px;float:right;">
                <div class="panel-heading"><h3 class="panel-title"><strong>Associations</strong></h3></div>
                <div class="panel-body" style="color:black;overflow-y: scroll;height:59%;">
                    <?php
                        while($association = $result2->fetch()) { 
                            $Association = new Association($association['id'],$association['nom'],$association['adresse'],$association['email'],$association['description'],$association['tel']);
                    ?>
                    <strong><a href=<?php echo "association.php?id=".$Association->getid(); ?>><?php echo $Association->getnom()." - (".$Association->getregion().")"; ?></a></strong><hr>
                    <?php }  ?>
                    
                    
                    
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
