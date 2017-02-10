
function generationInput()
{
    var nombreInput = parseInt( document.getElementById('poules').value);
    var nombreEquipe = parseInt( document.getElementById('equipes').value);
    
    if(nombreInput>0 && nombreEquipe>0)
        {
            if(nombreInput>nombreEquipe)
                {

                    var text = '<div class="row"><div class="col-lg-3"><i class="fa fa-exclamation-triangle fa-5x"></i></div><div class="col-lg-8">Les nombres doivent etre superieur a Zero et le nombre de poules doit etre superieur au nombre d\equipe </div></div>'
                    var n = noty({
                        text        : text,
                        type        : "error",
                        dismissQueue: true,
                        layout      : 'topRight',
                        closeWith   : ['click'],
                        theme       : 'relax',
                        maxVisible  : 30,
                        animation   : {
                            open  : 'animated bounceInRight',
                            close : 'animated bounceOutLeft',
                            easing: 'swing',
                            speed : 500
                        }
                    });

                    return false ;
                }
            
            //input des poules
            for(var i=1 ; i<=nombreInput ; i++)
                {
                    var div = document.getElementById('newInput');
                    var input = document.createElement("input") ;
                    input.setAttribute('type','text');
                    input.setAttribute('class','form-control input-sm') ;
                    input.setAttribute('placeholder','Entrez le nom de la poules  '+i)
                    input.setAttribute('name','nom'+i);
                    input.style.margin = '10px';
                    div.appendChild(input);
                }
            
            //input des equipes
            for(var i=1 ; i<= nombreEquipe ; i++)
                {
                    var div = document.getElementById('newEquipe');
                    var input = document.createElement("input") ;
                    input.setAttribute('type','text');
                    input.setAttribute('class','form-control input-sm') ;
                    input.setAttribute('placeholder','Entrez le nom de l\'equipe  '+i)
                    input.setAttribute('name','equipe'+i);
                    input.style.margin = '10px';
                    div.appendChild(input);
                }
                
                //masquage du bloc 1
                var btn = document.getElementById('bloc1');
                btn.style.display = 'none';
            
            
                //activation des bottons tirage
                var B = document.getElementById('tir1');
                B.removeAttribute("disabled");
                var C = document.getElementById('tir2');
                C.removeAttribute("disabled");
            
                //affichage du button de retour
                
                var D = document.getElementById('btnReturn');
                D.style.display = 'inline';
            
                                        
        }
        else
        {
        	 var text = '<div class="row"><div class="col-lg-2"><i class="fa fa-exclamation-triangle fa-2x"></i></div><div class="col-lg-10">Erreur sur l\'analyse des donnees saisies .</div></div>'
                    var n = noty({
                        text        : text,
                        type        : "error",
                        dismissQueue: true,
                        layout      : 'topRight',
                        closeWith   : ['click'],
                        theme       : 'relax',
                        maxVisible  : 30,
                        animation   : {
                            open  : 'animated bounceInRight',
                            close : 'animated bounceOutLeft',
                            easing: 'swing',
                            speed : 500
                        }
                    });

                    return false ;       
        }

}
function retour()
{
    var A = document.getElementById('bloc1');
    A.style.display = "inline";
    
    //masquage du bloc des inputs et suppression des input deja creer
    var A1 = document.getElementById('newInput');
    var A2 = document.getElementById('newEquipe');
    while(A1.firstChild)
    {
        A1.removeChild(A1.firstChild);
    }
    while(A2.firstChild)
    {
        A2.removeChild(A2.firstChild);
    }
    
    var C = document.getElementById('blocInput');
    C.style.display = 'inline';
    
    //activation des bottons tirage
    var D = document.getElementById('tir1');
    D.setAttribute("disabled","disabled");
    var E = document.getElementById('tir2');
    E.setAttribute("disabled","disabled");
    
    //masquage du boutton retour meme
    var C7 = document.getElementById('btnReturn');
    C7.style.display = "none" ;
            
}
