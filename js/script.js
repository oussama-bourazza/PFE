var b = 1;
         setInterval(function(){ 
             if(b==1){ document.getElementById("bi").style.backgroundImage = "url(\"icons/background2.jpg\")";b++;}
                else {document.getElementById("bi").style.backgroundImage = "url(\"icons/background1.jpg\")";b=1;}
             
            }
         , 20000);
         
         
        function myfunction(i){
            if(i=="login"){
            document.getElementById("bo").innerHTML = "<div class=\"panel panel-warning\" style=\"margin-top:10px;margin-bottom:200px;width:500px;\"><div class=\"panel-heading\"><h3 class=\"panel-title\"><strong>Connexion</strong></h3></div><div class=\"panel-body\" style=\"color:black;\"><form class=\"form\" method=\"post\" action=\"login.php\"><label for=\"username\">Nom d'utilisateur</label><input type=\"text\" id=\"username\" name=\"username\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\" /><br><label for=\"password\">Mot de passe</label><input type=\"password\" id=\"password\" name=\"password\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"><br> <input type=\"submit\" class=\"btn btn-warning\" value=\"VALIDER\" /></form></div> </div>"; 
                }
            else if(i=="inscrire"){
                document.getElementById("bo").innerHTML = "<div class=\"panel panel-warning\" style=\"margin-top:10px;width:500px;\"><div class=\"panel-heading\"><h3 class=\"panel-title\"><strong>Inscription</strong></h3></div><div class=\"panel-body\" style=\"color:black;\"><form class=\"form\" method=\"post\" action=\"signup.php\"><label for=\"username\">Nom d'utilisateur</label><input type=\"text\" id=\"username\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"/><br><label for=\"password\">Mot de passe</label><input type=\"password\" id=\"password\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"/><br><label for=\"nom\">Nom</label><input type=\"text\" id=\"nom\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"/><br><label for=\"prenom\">Prénom</label><input type=\"text\" id=\"prenom\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"/><br><label for=\"email\">Email</label><input type=\"email\" id=\"email\" class=\"form-control\" style=\"width:70%;\" maxlength=\"20\" required=\"required\"/><br><label for=\"adresse\">Adresse</label><input type=\"text\" id=\"adresse\" class=\"form-control\" style=\"width:70%;\" required=\"required\"/><br><label for=\"tel\">Téléphone</label><input type=\"tel\" id=\"tel\" class=\"form-control\" style=\"width:70%;\" required=\"required\"/><br><input type=\"submit\" class=\"btn btn-warning\" value=\"VALIDER\" /></form></div>  </div>";
            }
        }