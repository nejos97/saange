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

        <script src="function.js"></script>

        <script src="ion.sound.js"></script>

		<title>PROGRAMME DE TRI D'EQUIPE ECRIT EN PHP</title>
	</head>
	<body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                    <span class="sr-only">Menu</span>
                </button>
                <a class="navbar-brand" href="." title="InstanCori">GIN I</a>
            </div>
        </nav>
        <div>
            <?php
                include_once('programme.php')
            ?>
			<section class="container">
                <h4>PROGRAMME DE TRI D'EQUIPE.</h4>
                <?php if(isset($flash)){ echo '<div class="alert alert-danger">'.$flash.'</div>' ; } ?>
                <form action="" method="POST">
                        <div class="row">
				<div class="col-lg-2">
					<a href="http://localhost/tirageausort" ><button class="btn btn-primary" type="submit" id="retour" name="retour"> Retour</button></a>
				</div>
			</div>
                    <label for="poules">Nombre & nom des poules : </label>
                    <div class="row" id="bloc1">
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="poules" id="poules" value="<?php if(isset($_POST['poules'])){ echo $_POST['poules'] ; } ?>" placeholder="Entrer le nombre des poules" required>
                        </div>
												<div class="col-lg-4">
													<input type="text" name="equipes" id="equipes" class="form-control" maxlength="5" value="<?php if(isset($_POST['equipes'])){ echo $_POST['equipes'] ; } ?>" placeholder="Entrer le nombre d'equipes " required>
                        </div>
                        <div class="col-lg-4">
                            <span onclick="generationInput()" class="btn btn-success btn-sm btn-block" id="btngenere">Genere les inputs</span>
                        </div>
                    </div>

                    <div id="newInput"></div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
													<button class="btn btn-info btn-lg btn-block" type="submit" id="tir1" name="tir1" disabled="disabled"><i  class="fa fa-random"></i> Tirage 1</button>
												</div>
												<div class="col-lg-6">
													<button class="btn btn-info btn-lg btn-block" type="submit" id="tir2" name="tir2" disabled="disabled"><i  class="fa fa-random"></i> Tirage 2</button>
												</div>
                    </div>
                </form>
                <br>
                <div id="bloc2">
                    <?php if( isset($resultatEquipe) AND count($resultatEquipe)>0) : ?>
                        <script>
                            var style=document.getElementById('bloc2');
                            style.setAttribute('class','resultat');
                        </script>
                        <h5>Résultat du tirage. <a href="http://localhost/tirageausort/" onclick='document.location.reload(false)'>relancer le tirage</a></h5>
			<div class="table-responsive">
                        <table class="table">
                        <thead>
                        <tr>
                        <?php foreach($listePouleSelectionner as $tab) : ?>
                            <th class="bg-info" style="border-left:1px solid #fff;border-top:none;border-right:5px solid #fff;border-bottom:1px solid #d9edf7;text-align:center;"> <?= $tab ?></th>
                        <?php endforeach ; ?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($resultatEquipe as $tab1)
                                {
                                    echo "<td class='bg-success'  style='border-color:#fff;border-top:none;border-right:1px solid #fff;'>" ;
                                    foreach($tab1 as $tab2)
                                    {
                                        echo "<span class='badge' >Equipe ".$tab2."</span><br>" ;
                                    }

                                    echo "</td>" ;
                                }
                            ?>
                        </tbody>
                        </table>
			</div>
                    <?php endif ; ?>
                </div>
			</section>
        </div>
        <br><br><br><br>

		<footer class="footer container">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li><a href="about.php">About Author</a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
        <script src="css/Flat-UI/js/vendor/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="css/Flat-UI/js/vendor/video.js"></script>
        <script src="css/Flat-UI/js/flat-ui.min.js"></script>
	</body>
</html>
