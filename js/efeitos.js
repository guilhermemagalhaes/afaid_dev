// Click event of the showPassword button
  $('.button-mostrar').on('click', function(){
     
    // Get the password field
    var passwordField = $('.mostrar-senha');
 
    // Get the current type of the password field will be password or text
    var passwordFieldType = passwordField.attr('type');
 
    // Check to see if the type is a password field
    if(passwordFieldType == 'password')
    {
        // Change the password field to text
        passwordField.attr('type', 'text');
 
        // Change the Text on the show password button to Hide
        $(this).val('Esconder');
    } else {
        // If the password field type is not a password field then set it to password
        passwordField.attr('type', 'password');
 
        // Change the value of the show password button to Show
        $(this).val('Mostrar');
    }
  });

$(".close").click(function(){
        $(".container").fadeOut();
});

$( "#back" ).click(function() {
  $( "#caixa")
    .animate({
      width: "20%"
       

    }, {
      queue: true,
      duration: 700
    })
    


    var login = document.getElementById('login');
    login.style.display="block";

     var btncadastro = document.getElementById('go1');
    btncadastro.style.opacity="1";

    var btnvoltar = document.getElementById('back');
    btnvoltar.style.display="none";

    var video = document.getElementById('video');
    video.play();

    var formulariocadastro = document.getElementById('cadastro');
    formulariocadastro.style.display="none";
    formulariocadastro.style.margin="5px 769px auto";

    var senha = document.getElementById('recuperar');
    senha.style.opacity="1";

    var btnCadastrar = document.getElementById('btn-cadastrar');
    btnCadastrar.style.display="none";
    btnCadastrar.style.margin="5px 769px auto";


});

$( "#back2" ).click(function() {
  $( "#caixa")
    .animate({
      width: "20%"
       

    }, {
      queue: true,
      duration: 700
    })
    
   var formulariocadastro = document.getElementById('cadastro');
    formulariocadastro.style.display="none";
    formulariocadastro.style.margin="5px 769px auto";



    var login = document.getElementById('login');
    login.style.display="block";
    login.style.opacity="1";

    var btncadastro = document.getElementById('go1');
    btncadastro.style.opacity="1";



    var btnvoltar = document.getElementById('back2');
    btnvoltar.style.display="none";

    var video = document.getElementById('video');
    video.play();

    var senha = document.getElementById('recuperar');
    senha.style.opacity="0";




});



$( "#go2" ).click(function() {
  $( "#caixa")
    .animate({
      width: "100%"

    }, {
      queue: false,
      duration: 700
    })
    
    var btnvoltar2 = document.getElementById('back2');
    btnvoltar2.style.display="block";

    var login = document.getElementById('login');
    login.style.opacity="0";


    var btncadastro = document.getElementById('go1');
    btncadastro.style.opacity="0";

    var video = document.getElementById('video');
    video.pause();

   

    var senha = document.getElementById('recuperar');
    senha.style.display="block";
    senha.style.margin="-200px 769px auto";

 
});
 
 

$( "#go1" ).click(function() {
  $( "caixa" ).css({
    width: "",
    fontSize: "",
    borderWidth: ""


  });
});


function validarSenha(){
	senha1 = document.getElementById('senha1')
	senha2 = document.getElementById('senha2')
 
	if (senha1 == senha2)
		alert("SENHAS IGUAIS")
	else
		alert("SENHAS DIFERENTES")
}
( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
  $('#cssmenu #menu-button').on('click', function(){
    var menu = $(this).next('ul');
    if (menu.hasClass('open')) {
      menu.removeClass('open');
    }
    else {
      menu.addClass('open');
    }
  });
});
} )( jQuery );


$("#fileUpload").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#image-holder");
        image_holder.empty();

         var caixa = document.getElementById('wrapper');
        
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "thumb-image",
                width:"100%"

            }).appendTo(image_holder);
        }


        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }
});

$(document).ready(function() {

  // aumentando a fonte
  $(".inc-font").click(function () {
    var size = $('body').css('font-size');
    

    var style = document.createElement("style");
    document.body.appendChild(style);

    sheet = style.sheet;

    sheet.addRule('::-webkit-input-placeholder','font-size:15px');
    sheet.addRule('::-webkit-input','font-size:15px');
 
   

    size = size.replace('px', '');
    size = parseInt(size) + 1.4;
    $('body').animate({'font-size' : size + 'px'});
  });

  //diminuindo a fonte
  $(".dec-font").click(function () {
    var size = $('body').css('font-size');

    size = size.replace('px', '');
    size = parseInt(size) - 1.4;

    $("body").animate({'font-size' : size + 'px'});
  });

  // resetando a fonte
  $(".res-font").click(function () {
    $("body").animate({'font-size' : '10px'});
  });

});



