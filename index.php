<!DOCTYPE html>
<html>
	<head>
        <!-- Choose of Encoding -->
        <meta charset="utf-8">
        
        <!-- Loading Bootstrap -->
        <link href="css/Flat-UI/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Loading Flat-UI  -->
        <link  rel="stylesheet" href="css/Flat-UI/css/flat-ui.css">
        
        <!-- Loading Personal style -->
        <link  rel="stylesheet" href="css/style.css">
        
        <!-- Loading Font-Awesome glyphicon -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="css/animate.css">
        
        <script src="function.js" type="text/javascript"></script>        
        
		<title>Saange - Tirage au sort des equipe aleatoirement</title>
	</head>
	<body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Menu</span>
                </button>
                <a class="navbar-brand" href="." >Saange</a>
            </div>
        </nav>
        <div>
	<br />
	<br />
	
            <?php
                include_once('programme.php')
            ?>
			<section class="container">
		
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
  				About @uthor !
			</button>

			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>
			      </div>
			      <div class="modal-body">
				<img src="https://avatars1.githubusercontent.com/u/13876543?v=3&s=460">
				I am Nenba Jonathan student in computer engineering specialty software engineering.
				I like over programming and meet the challenges. To better discover me, 
				I invite you to follow me on github.com/nejos97 or to write me on nenbajonathan@protonmail.com.
			      </div>
			      <div class="modal-footer">
				<button type="button" class= "btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>
	
                <h6>Appliction de tirage d'equipe aleatoire.</h6>
                <?php if(isset($flash)){ echo '<div class="alert alert-danger">'.$flash.'</div>' ; } ?>
                <form action="" method="POST">
                    <div class="row" id="bloc1">
                        <div class="col-lg-4">
                            <input type="number" class="form-control input-sm" name="poules" id="poules" value="<?php if(isset($_POST['poules'])){ echo $_POST['poules'] ; } ?>" placeholder="Entrer le nombre de poules">
                        </div>
                        <div class="col-lg-4">
                            <input type="number" name="equipes" id="equipes" class="form-control input-sm" value="<?php if(isset($_POST['equipes'])){ echo $_POST['equipes'] ; } ?>" placeholder="Entrer le nombre d'equipe ">
                        </div>
                        <div class="col-lg-4">
                            <span onclick="generationInput()" class="btn btn-success btn-sm btn-block" id="btngenere">Genere les inputs</span> 
                        </div>
                    </div>
                    <div class="row" id="blocInput">
                        <button class="btn btn-warning btn-sm btn-block" style="display:none" id="btnReturn" onclick="retour()" type="button"><i class="fa fa-reply"></i> Retour aux champs de saisie</button>
                        <div class="col-lg-6" id="newInput"></div>
                        <div class="col-lg-6" id="newEquipe"></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-info btn-sm btn-block" type="submit" id="tir1" name="tir1" disabled="disabled"><i  class="fa fa-random"></i> Tirage 1</button>
                        </div>
                        <div class="col-lg-6">
                            <button class="btn btn-info btn-sm btn-block" type="submit" id="tir2" name="tir2" disabled="disabled"><i  class="fa fa-random"></i> Tirage 2</button>
                        </div>
                    </div>                    
                </form>	
                <br>
                <?php 
                    if(isset($_POST['tir1']) OR isset($_POST['tir2']))
                    {
                        //verification du systeme de remplissage des inputs
                            $testPoules = array();
                            $i = 1 ;
                            while($i<=$poules)
                            {
                                if(isset($_POST['nom'.$i]) AND strlen($_POST['nom'.$i])>0)
                                {
                                    array_push($testPoules , true);
                                }
                                else
                                {
                                   array_push($testPoules , false); 
                                }
                                $i++ ;
                            }
                        
                            $testEquipe = array();
                            $j = 1 ;
                            while($j<=$equipes)
                            {
                                if(isset($_POST['equipe'.$j]) AND strlen($_POST['equipe'.$j])>0)
                                {
                                    array_push($testEquipe , true);
                                }
                                else
                                {
                                   array_push($testEquipe , false); 
                                }
                                $j++ ;
                            }
                            $feuVert ;
                            if((in_array(true,$testPoules) AND in_array(false,$testPoules)) OR (in_array(true,$testEquipe) AND in_array(false,$testEquipe)))
                            {
                                $feuVert = false ;
                            }
                            else
                            {
                                $feuVert = true ;
                            }
                            
                    }
                
                ?>
                
                <div id="bloc2">
                    <?php if( isset($resultatEquipe) AND count($resultatEquipe)>0 AND $feuVert==true) : ?>
                        <script>
                            var style=document.getElementById('bloc2');
                            style.setAttribute('class','resultat');
                        </script>
               
                        <div class="table-responsive">
                            <table class="table">
                                <thead >
                                    <tr>
                                    <?php $n = 1 ; foreach($listePouleSelectionner as $tab) : ?>
                                        <th class="bg-info" style="border-left:1px solid #fff;border-top:none;border-right:5px solid #fff;border-bottom:1px solid #d9edf7;text-align:center;">
                                            Poule -  
                                            <?php
                                                if(isset($_POST['nom'.$n]) AND strlen($_POST['nom'.$n])>0)
                                                {
                                                    echo $_POST['nom'.$n] ;
                                                }
                                                else
                                                {
                                                    echo $tab ;                    
                                                }
                                                $n++ ;
                                            ?>
                                        </th>
                                    <?php endforeach ; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $e = 1 ;
                                        foreach($resultatEquipe as $tab1)
                                        {
                                            echo "<td class='bg-success'  style='border-color:#fff;border-top:none;border-right:1px solid #fff;'>" ;
                                            foreach($tab1 as $tab2)
                                            {
                                               if(isset($_POST['equipe'.$e]) AND strlen($_POST['equipe'.$e])>0)
                                               {
                                                    // echo "<span class='badge' > ".$_POST['equipe'.$e]."</span><br>" ;
                                                    echo "<span class='badge' > ".$_POST['equipe'.$tab2]."</span><br>" ;
                                               }
                                                else
                                                {
                                                    echo "<span class='badge' >Equipe ".$tab2."</span><br>" ;
                                                }
                                                $e++ ;
                                            }

                                            echo "</td>" ;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div> 
                    <?php elseif(isset($feuVert) AND $feuVert == false ) : ?>
                    	<script>
                    		alert('Veillez remplir tous les champs disponibles ou les laisser vide pour faire une sélection aléatoire des noms');
                    	</script>
                    <?php endif ; ?>
                </div>
			</section>
        </div>
        
        <br><br><br><br>
        
		<footer class="footer container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="">A propos de l'Auteur</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="css/Flat-UI/js/vendor/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="css/Flat-UI/js/vendor/video.js"></script>
        <script src="css/Flat-UI/js/flat-ui.min.js"></script>
        <script src="noty/packaged/jquery.noty.packaged.min.js"></script>
	</body>
</html>
