<?php
if(isset($_POST['tir1']) OR isset($_POST['tir2']))
{
    $poules = (int) $_POST['poules'] ;
    $equipes = (int) $_POST['equipes'] ;
        
    if(empty($poules) OR empty($equipes))
    {
        $flash = "Veillez remplir tous les champs correctement !" ;
    }
    elseif($poules > $equipes)
    {
        $flash = "Le nombre de poules ne peut pas être superieur au nombre d'equipe" ;        
    }
    else
    {
        $nomPoules = array("none","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z") ;
        
        if($poules<=26)
        {
            $listePouleSelectionner = array() ;
            $listeEquiperSelectionner = array() ;
            
            for($i=1 ; $i<=$poules ; $i++)
            {
                    $listePouleSelectionner[$i] = $nomPoules[$i];
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
                        foreach($listeEquiperSelectionner as $valeur)
                        {
                            array_push($resultatEquipe[$clePoules[$i]],$valeur);
                            $i++;
                        }
                    }

                }
            }
            else
            {
                //initialisation du tableau avec les differente tableau vide;
                for($i = 1 ; $i<=$poules ; $i++)
                {
                    array_push($resultatEquipe , array());
                }
                    
                    
                $i = 0 ;
                
                shuffle($listeEquiperSelectionner);
                
                foreach($listeEquiperSelectionner as $valeur)
                {
                    array_push($resultatEquipe[$i] , $valeur);
                    $i++;
                    if($i>=$poules)
                    {
                        $i = 0 ;
                    }
                }
            }
              
        }
        else
        {
            $flash="Le nombre de poules doit être inférieur à 26" ;
        }
          
    }
       
}
?>


    
