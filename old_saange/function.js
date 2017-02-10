function generationInput()
{
    var nombreInput = document.getElementById('poules').value ;
    if(nombreInput>0)
        {

            for(var i=0 ; i< nombreInput ; i++)
                {
                    var div = document.getElementById('newInput');
                    var input = document.createElement("input") ;
                    input.setAttribute('type','text');
                    input.setAttribute('class','form-control') ;
                    input.setAttribute('placeholder','Entrez le nom de la poule '+i)
                    input.setAttribute('name','nom'+i);
                    input.style.margin = '10px';
                    div.appendChild(input);
                    div.setAttribute('class','well');
                }

                //masquage du bloc 1
                var btn = document.getElementById('bloc1');
                btn.style.display = 'none';


                //activation du botton tirage tir1
                var B = document.getElementById('tir1');
                B.removeAttribute("disabled");

                //activation du botton tirage tir2
                var H = document.getElementById('tir2');
                H.removeAttribute("disabled");

                //activation du botton tirage retour
                var R = document.getElementById('retour');
                R.removeAttribute("disabled");
        }

}
