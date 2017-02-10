<?php
if(isset($_POST['tir1']) OR isset($_POST['tir2']))
{
    $poules = (int) $_POST['poules'] ;
    $equipes = (int) $_POST['equipes'] ;

    if(empty($poules) OR empty($equipes))
    {
        $flash = "Veillez remplir tous les champs honnetement !!!" ;
    }
    elseif($poules > $equipes)
    {
        $flash = "Le nombre de poules ne doit pas etre superieur au nombre d'equipe" ;
    }
    else
    {
        $nomPoules = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z") ;

        if($poules<=26)
        {
            $listePouleSelectionner = array() ;
            $listeEquiperSelectionner = array() ;

            for($i=0 ; $i<$poules ; $i++)
            {

                if(isset($_POST['nom'.$i]) AND strlen($_POST['nom'.$i])>0)
                {
                    $listePouleSelectionner[$i] = $_POST['nom'.$i] ;
                }
                else
                {
                    $listePouleSelectionner[$i] = $nomPoules[$i];
                }
            }

            for($i=1 ; $i<=$equipes ; $i++)
            {
                $listeEquiperSelectionner[$i] = $i ;
            }

            $nbrParEquipe = (int)($equipes/$poules) ;

            $nbrEquipeReste = (int)($equipes%$poules) ;

            //Choix des qequipe au hasard ;

            $resultatEquipe = array() ;

            if(isset($_POST['tir1']))
            {
              for($i=1 ; $i<=count($listePouleSelectionner) ; $i++)
              {
                  $selection = array_rand($listeEquiperSelectionner , $nbrParEquipe);

                  //insertion des equipes  selectionne pour la premiere poules dans la variable

                  if(!is_array($selection))
                  {
                      $selection = explode(" ",$selection);
                  }

                  array_push($resultatEquipe ,$selection) ;

                  //destruction des elements deja selectionner dans le tableau ;

                  if(is_array($selection))
                  {
                      foreach($selection as $tab)
                      {
                          unset($listeEquiperSelectionner[$tab]);
                      }

                  }

              }
              if(count($listeEquiperSelectionner)>0)
              {
                  $clePoules=array_rand($resultatEquipe,$nbrEquipeReste);

                  if(!is_array($clePoules))
                  {
                      foreach($listeEquiperSelectionner as $tab)
                      {
                          array_push($resultatEquipe[$clePoules],$tab);
                      }
                  }
                  else
                  {
                      $i = 0 ;
                      foreach ($listeEquiperSelectionner as $tab)
                      {
                          array_push($resultatEquipe[$clePoules[$i]],$tab);
                          $i++ ;
                      }
                  }

              }
            }
            else
            {

              for ($i=1; $i <= $poules ; $i++)
              {
                $tab = array();
                array_push($resultatEquipe,$tab);
              }
              $curseur = 0 ;
              foreach ($listeEquiperSelectionner as $value)
              {
                array_push($resultatEquipe[$curseur],$value);
                $curseur++ ;
                if($curseur>=$poules)
                {
                  $curseur = 0 ;
                }
              }

            }

        }
        else
        {
            $flash="Nombre de poules doit etre inferrieur a 26" ;
        }

    }

}
?>
