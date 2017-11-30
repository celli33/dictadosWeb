$(function() {
'use strict';


ion.sound({
  sounds: [
    {name: "dicRitmico1"}
  ],
  // main config
  path: "http://localhost/dictados/audio/",
  preload: true,
  multiplay: false,
  volume: 0.9
});
 console.log("hola");
 console.log($(".list"));
 var botonRitmico=$("a.button.botonRitmico");
 var controladorImagenes=0;
 var controladorDictado=0;
 var controladorOpciones=$('.list');
 var controladorReproductor=0;
 var controladorCompases=0;
 var opcionesSeleccionadas=[];
 var botonCalificacion=botonRitmico.clone();
 botonCalificacion[0].className += " calificacionRitmo";
 console.log(botonCalificacion);
 var correctas=[0,1,1,0,0];
 controladorOpciones.on('change', opciones);
 $(".siguiente").on("click", cambiar);
 $(".repetir").on("click", reproducirDictado);
 botonRitmico.on("click", abrirDictado);
 botonCalificacion.on("click",verCal);

 function abrirDictado() {
   console.log($("div.ritmico"));
   $("div.ritmico")[0].style.display="inline-block";
   switch (controladorDictado) {
     case 0:
       botonRitmico.html("iniciar Dictado");
       controladorDictado=1;
       break;
      case 1:
        botonRitmico.html("parar Dictado");
        $("div.enviar")[0].style.display="block";
        reproducirDictado();
        controladorDictado=2;
        $(".formRitmico")[0].style.display="block";
        break;
      case 2:
        botonRitmico.html("iniciar Dictado");
        controladorDictado=1;
        controladorCompases=0;
        controladorImagenes=0;
        controladorReproductor=0;
        opcionesSeleccionadas=[];
        ion.sound.stop("dicRitmico1");
        break;
     default:

   }
 }


 function reproducirDictado() {
    ion.sound.play("dicRitmico1");
 }

function  opciones() {
      $('.list').not(this).prop('checked', false);
  }

function cambiar(){
  for (var i = 0; i < controladorOpciones.length; i++) {
    if(controladorOpciones[i].checked==true){
        opcionesSeleccionadas[controladorCompases]=i;
        console.log("seleccionada opcion "+i);
        break;
    }
    else {
      opcionesSeleccionadas[controladorCompases]=-1;
      console.log("opcion "+i+" no seleccionada");
    }
  }
  console.log(opcionesSeleccionadas[controladorCompases]);
  controladorCompases++,
  controladorImagenes++;
  switch (controladorImagenes) {
    case 0:
    $(".pasos").html("Compas 1");
    $(".img1").attr("src", "http://localhost/dictados/img/ritmos/1-good.png");
    $(".img2").attr("src", "http://localhost/dictados/img/ritmos/5-good.png");
      break;
    case 1:
    $(".pasos").html("Compas 2");
    $(".img1").attr("src", "http://localhost/dictados/img/ritmos/4-good.png");
    $(".img2").attr("src", "http://localhost/dictados/img/ritmos/2-good.png");
      break;
    case 2:
    $(".pasos").html("Compas 3");
    $(".img1").attr("src", "http://localhost/dictados/img/ritmos/1-good.png");
    $(".img2").attr("src", "http://localhost/dictados/img/ritmos/3-good.png");
      break;
    case 3:
      $(".pasos").html("Compas 4");
      $(".img1").attr("src", "http://localhost/dictados/img/ritmos/4-good.png");
      $(".img2").attr("src", "http://localhost/dictados/img/ritmos/1-good.png");
      break;
    case 4:
      $(".pasos").html("Compas 5");
      $(".img1").attr("src", "http://localhost/dictados/img/ritmos/5-good.png");
      $(".img2").attr("src", "http://localhost/dictados/img/ritmos/3-good.png");
      /**/
      break;
      case 5:
      botonCalificacion.html("ver califacion");
      botonCalificacion.appendTo($("div.calificacion"));
      $(".siguiente").html("reiniciar Dictado");
      $(".repetir")[0].style.display="none";
        break;
    default:
    console.log("default");
    controladorDictado=1;
    controladorCompases=0;
    controladorImagenes=0;
    controladorReproductor=0;
    opcionesSeleccionadas=[];
    $(".repetir")[0].style.display="inline-block";
    $(".siguiente").html("siguiente");
    botonCalificacion[0].style.display="none";
    console.log(botonCalificacion[0]);
  }
 }

 function verCal() {
   console.log("correctas"+correctas);
   var cal=0;;
   console.log("seleccionadas"+opcionesSeleccionadas);
   for (var i = 0; i < correctas.length; i++) {
     if(correctas[i]==opcionesSeleccionadas[i]){
       cal++;
     }
   }
   console.log($("span.datos"));
   $("span.datos")[0].style.display="block";
   $("span.datos").html("Aciertos: "+cal +" de "+" 5 posibles");

 }

});
