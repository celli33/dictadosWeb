/*------------pendiente:
que no se escriban de nuevo cuando hay mas de 3 repetidos*/

$( document ).ready(function(){$(".button-collapse").sideNav();} );
$(document).ready(function(){
$('.parallax').parallax();
}



);

$(document).ready(function() {


/*------------------variables usadas-------------*/
  var contadorNumNotasCompas=0;
  var contadorCompases=0;
  var botonNotas= $("a.botonNotasSueltas");
  var F=$(".F6");
  var E=$(".E6");
  var D=$(".D6");
  var C=$(".C6");
  var B=$(".B5");
  var A=$(".A5");
  var G=$(".G5");
  var F5=$(".F5");
  var E5=$(".E5");
  var D5=$(".D5");
  var notaF=$(".notaF");
  var notasdelCompas=[];
  var notasdelDictado=[];
  var notasdelDictado2=[];
  var controlDictado=0;
  var i=0;
  var play;
  var botonCalificacion=botonNotas.clone();
  var controlEscritura=0;
  var numVecesRepetido;

  ion.sound({
    sounds: [
      {name: "D5"},
      {name: "E5"},
      {name: "F5"},
      {name: "G5"},
      {name: "A5"},
      {name: "B5"},
      {name: "C6"},
      {name: "D6"},
      {name: "E6"},
      {name: "F6"},
    ],
    // main config
    path: "http://localhost/dictados/audio/",
    preload: true,
    multiplay: true,
    volume: 0.9
  });
  var dictado1=["E5","G5","C6","B5","G5","F5","E5","B5", "D6","A5","C6","E6","C6","B5","G5","F5","E5","B5", "C6","A5"];


/*--------------eventos cuando una nota es reconocida------------*/
  F.on("click", notaPulsada);
  E.on("click", notaPulsada);
  D.on("click", notaPulsada);
  C.on("click", notaPulsada);
  B.on("click", notaPulsada);
  A.on("click", notaPulsada);
  G.on("click", notaPulsada);
  F5.on("click", notaPulsada);
  E5.on("click", notaPulsada);
  D5.on("click", notaPulsada);
/*--------evento para cuando se da click en abrir dictado-----*/
  botonNotas.on("click", playNotas);
  botonCalificacion.on("click",verCal);

/*------funcion que se activa cuando se reconoce una nota introducida por el alumno*/
  function notaPulsada() {
    if(controlDictado==2)
    { contadorNumNotasCompas+=1;
      var aumento=160;
      console.log("pulsada "+this.className);
      var nota=this.className.split(' ')[1];
      notasdelDictado2.push(nota);
      //console.log("asd"+notasdelDictado2[i]);
      /*dibujo las notas---*/
      dibujaNotas(this.className);
      $("span.notas-compas").html("<p>notas del compas escritas: "+ contadorNumNotasCompas+"</p>");
      $("span.num-compas").html("<p>numero de compas: "+ (contadorCompases+1) +"</p>");
    }
  }
/*--------------funcion que dibuja las notas cuando son reconocidas-------*/
function dibujaNotas(nombre) {
  /*separo el nombre de las clases----*/
  console.log("contador notas del compas"+contadorNumNotasCompas);
  var div=nombre.split(' ')[0];
  var nombreNota=nombre.split(' ')[1];
  var band=0;
  console.log("nombre nota: "+nombreNota);
  var nota=$(".nota"+nombreNota);
  /*-----checo que la nota no esté en el compás y si está la clono---*/
  if(jQuery.inArray(nota[0], notasdelCompas)!=-1)
  { band=1;
    console.log("ya estoy en el array");
    var aux=nota.clone();
    console.log("asdfsd1 "+aux[0].className);
    aux.addClass("clonada");
    aux.appendTo("."+nombreNota);
    console.log("asdfsd "+aux[0].className);
    //console.log(aux);
  }
  /*------hacemos un switch para cada nota del compas y así saber en que parte
  del width dibujarla-----*/
  switch (contadorNumNotasCompas) {
    case 1:
    /*-------si no es el primer compas limpiamos las notas del compas----*/
      if(contadorCompases>0){
        $(".nota").css("display","none");
        $(".nota").css("left","auto");
          for (var i = 0; i < notasdelCompas.length; i++) {
            console.log("notas del compas a ocultar"+notasdelCompas[i].className);
            notasdelCompas[i].style.display="none";
            //console.log("nota clonada "+notasdelCompas[i].className.split(" ")[2]);
            if(notasdelCompas[i].className.split(" ")[2]=="clonada")
            {console.log("remover "+notasdelCompas[i].className );
              notasdelCompas[i].remove();
            }
          }
          notasdelCompas=[];
      }
      /*-------si la nota está ya en el compas dibujas la nota clonada----*/
      if(band==1)
      {$(".nota"+nombreNota+".clonada")[0].style.left="20%";
      $(".nota"+nombreNota+".clonada")[0].style.display="block"
       notasdelCompas.push($(".nota"+nombreNota+".clonada")[0]);
       notasdelDictado.push($(".nota"+nombreNota+".clonada")[0]);
       console.log("clonada1");

      }
      else
      {notasdelCompas.push(nota[0]);
        notasdelDictado.push(nota[0]);
        nota[0].style.left="20%";
        nota[0].style.display="block";
        console.log("nota nueva 1");
      }
    break;
    case 2:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
      if(band==1)
      {console.log("clonada2 "+aux[0].className);
      console.log($(".notaC6.clonada"));
       $(".nota"+nombreNota+".clonada")[0].style.left="40%";
       $(".nota"+nombreNota+".clonada")[0].style.display="block"
       notasdelCompas.push($(".nota"+nombreNota+".clonada")[0]);
       notasdelDictado.push($(".nota"+nombreNota+".clonada")[0]);

      }
      else
      { notasdelCompas.push(nota[0]);
        notasdelDictado.push(nota[0]);
        nota[0].style.left="40%";
        nota[0].style.display="block";
        console.log("nota nueva 2");
      }
    break;
    case 3:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {$(".nota"+nombreNota+".clonada")[0].style.left="60%";
    $(".nota"+nombreNota+".clonada")[0].style.display="block"
    notasdelCompas.push($(".nota"+nombreNota+".clonada")[0]);
    notasdelDictado.push($(".nota"+nombreNota+".clonada")[0]);
     console.log("clonada3");
    }
    else{
      notasdelCompas.push(nota[0]);
      notasdelDictado.push(nota[0]);
        nota[0].style.left="60%";
        nota[0].style.display="block";
        console.log("nota nueva 3");
    }
    break;
    case 4:
      /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {$(".nota"+nombreNota+".clonada")[0].style.left="80%";
    $(".nota"+nombreNota+".clonada")[0].style.display="block"
    notasdelCompas.push($(".nota"+nombreNota+".clonada")[0]);
    notasdelDictado.push($(".nota"+nombreNota+".clonada")[0]);
     console.log("nombre de aux"+aux[0].className);
     console.log("clonada4");
    }
    else{
        notasdelCompas.push(nota[0]);
        notasdelDictado.push(nota[0]);
        nota[0].style.left="80%";
        nota[0].style.display="block";
        console.log("nota nueva 4");
      }
      /*----receteamos el numero de notas por compas aumentamos el num-compas*/
        contadorNumNotasCompas=0;
        contadorCompases++;
        /*si el dictado ya termino*/
        if(contadorCompases>4)
        { console.log(notasdelDictado.length+" "+notasdelDictado);
          contadorCompases=0;
          botonNotas.html("repetir dictado");
          botonCalificacion.html("ver califacion")
          botonCalificacion.appendTo($("div.calificacion"))
          controlDictado=1;
          i=0;

        }
        console.log("tamaño de notas del Compas "+notasdelCompas.length+" ");
    break;
    default:
  }
}//dibujaNotas

  function playNotas() {
    //dibujo el pentagrama y con controlDictado veo que acción realizar
    switch (controlDictado) {
      /*------0 para abrir el pentagrama---*/
      case 0:
        var line= $("div.line-space");
        botonNotas.html("iniciar dictado");
        var contenedorNotas=$(".notasS");
        contenedorNotas[0].style.display="block";
          console.log(line);
          var aumento =167;

          for (var i = 0; i < line.length; i++) {
            line[i].style.top=aumento+"px";
             aumento=aumento+20;
            console.log(aumento);
            if(i%2!=0)
            {
              line[i].style.height="10px";
            }
          }
          controlDictado++;
        break;
        /* 1 para iniciar el dictado*/
        case 1:
            botonNotas.html("parar dictado");
            reproducirDictado();
            controlDictado++;
          break;
      default:
        clearInterval(play);
        controlDictado=0;
        botonNotas.html("abrir dictado");


    }



  }//fin reproducirDictado

function reproducirDictado() {
  // play sound

    play =  setInterval(function() {
      reproducirNota();
    },4000);
}

function reproducirNota() {
  console.log("reproducirNota");
  if(i<=19)
  {ion.sound.play(dictado1[i]);
    i++;
  }
  else {
    clearInterval(play);
  }
}

function verCal() {
  var aciertos=0;
  var nombreNota;
  console.log("ver cali");
  for (var i = 0; i < notasdelDictado2.length; i++) {
    console.log("dictado "+notasdelDictado2[i]);
    console.log("modelo "+dictado1[i]);
    if( notasdelDictado2[i]==dictado1[i])
      aciertos++;
  }
  $("span.aciertos").html("<p>aciertos en el dictado: "+ aciertos+" aciertos de 20 posibles</p>");
}


/*window.onkeydown = tecla;

 function tecla(event) {
   event.preventDefault();
   num = event.keyCode;

   if(num==112)
     alert("Pulsaste F1");

   if(num==123) {
    alert("Pulsaste F12");
    window.close();
   }

}*/

});
