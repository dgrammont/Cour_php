function  getDepartements()
{
    console.log("Dans la fonction getDepartemens");
    var nomVille=$('#ville').val();
    $.getJSON('controleur.php',
    {
        'ville' : nomVille,
        'commande' : 'getDepartementFromVille'
    }
    )
    .done(function (donnees,stat,hxr){
        //ce qui doit etre fait si tout se passe bien
        $("#lesDepartements").html(donnees);
    })
            .fail(function (xhr,text,error){
        console.log("param : "+JSON.stringify(xhr));
        console.log("status : "+text);
        console.log("error : "+error);
    })
    //$("#lesDepartements").text("trop fort "+nomVille);
}

$(document).ready(function (){
    //associer l'evenement clik sur le boutton ayant pour id envoyer 
    //avec l'appel de la fonction getDepartements
    $(document).on("click","#envoyer",getDepartements);
    //autre facon de l'ecire : $('#envoyer').click(getDerpartements);
})