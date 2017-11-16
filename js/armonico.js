$(document).ready(function () {
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
      {name: "F3"},
      {name: "G3"},
      {name: "A3"},
      {name: "B3"},
      {name: "C4"},
      {name: "D4"},
      {name: "E4"},
      {name: "F4"},
      {name: "G4"},
      {name: "A4"}
    ],
    // main config
    path: "http://localhost/dictados/audio/",
    preload: true,
    multiplay: true,
    volume: 0.9
  });

    var dictadoG=["A5","G5","C6","B5","G5","F5","E5","B5", "D6","A5","C6","E6","C6","B5","G5","F5","E5","B5", "C6","A5"];

    var dictadoF=["F3","G3","A3","G4","C4","F3","B3","G4", "D4","A4","G4","C4","E4","B3","C4","D4","G4","E4", "F4","A4"];

  var contadornotasReproducidasG=0;
  var contadornotasReproducidasF=0;
  var botonArmonico=$("a.button.botonArmonico");
  var controlDictado=0;
  var botonArmonico= $("a.botonArmonico");
  var contadorNumNotasCompasF=0;
  var contadorNumNotasCompasG=0;
  var notasdelDictadoF=[];
  var notasdelDictadoG=[];
  var contadorCompasesF=0;
  var contadorCompasesG=0;
  var F4=$(".F4");
  var E4=$(".E4");
  var D4=$(".D4");
  var C4=$(".C4");
  var B3=$(".B3");
  var A3=$(".A3");
  var G3=$(".G3");
  var F3=$(".F3");
  var G4=$(".G4");
  var A4=$(".A4");
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
  var notasdelCompasF=[];
  var notasdelCompasG=[];
  var notasdelDictadoFaux=[];
  var notasdelDictadoGaux=[];
  var botonCalificacion=botonArmonico.clone();
  var botonRepetir=botonArmonico.clone();


  botonArmonico.click(dibujarPentagrama);
  botonRepetir.click(reproducirdeNuevo);

  function reproducirdeNuevo() {
    contadornotasReproducidasF=0;
    contadornotasReproducidasG=0;
    reproducirDictado();
  }

  F4.on("click", notaPulsadaF);
  E4.on("click", notaPulsadaF);
  D4.on("click", notaPulsadaF);
  C4.on("click", notaPulsadaF);
  B3.on("click", notaPulsadaF);
  A3.on("click", notaPulsadaF);
  G3.on("click", notaPulsadaF);
  F3.on("click", notaPulsadaF);
  G4.on("click", notaPulsadaF);
  A4.on("click", notaPulsadaF);
  F.on("click", notaPulsadaG);
  E.on("click", notaPulsadaG);
  D.on("click", notaPulsadaG);
  C.on("click", notaPulsadaG);
  B.on("click", notaPulsadaG);
  A.on("click", notaPulsadaG);
  G.on("click", notaPulsadaG);
  F5.on("click", notaPulsadaG);
  E5.on("click", notaPulsadaG);
  D5.on("click", notaPulsadaG);
  botonCalificacion.on("click", calificaciones)


  function calificaciones() {
     verCalG();
     verCalF();
  }


  function dibujarPentagrama() {
    switch (controlDictado) {
      /*------0 para abrir el pentagrama---*/
      case 0:
        var line= $("div.line-space-ar");
        var lineF=$("div.line-space-arF");
        console.log(line);
        botonArmonico.html("iniciar dictado");
        var contenedorNotas=$(".armonico");
        contenedorNotas[0].style.display="block";
          console.log(line);
          var aumento = 167;
          var aumentoF=467
          for (var i = 0; i < line.length; i++) {
            line[i].style.top=aumento+"px";
            lineF[i].style.top=aumentoF+"px";
             aumento=aumento+20;
             aumentoF=aumentoF+20;
            console.log(aumento);
            if(i%2!=0)
            {
              line[i].style.height="10px";
              lineF[i].style.height="10px";
            }
          }
          controlDictado++;
        break;
        /* 1 para iniciar el dictado*/
        case 1:
            botonArmonico.html("parar dictado");
            reproducirDictado();
            controlDictado++;
          break;
      default:
        clearInterval(play);
        clearInterval(play2);
        controlDictado=0;
        botonArmonico.html("iniciar dictado");
        contadornotasReproducidasF=0;
        contadornotasReproducidasG=0;

  }
}


function notaPulsadaF() {
  if(controlDictado==2)
  { if(contadorCompasesF<=4)
    { contadorNumNotasCompasF+=1;
      var aumento=160;
      //console.log("pulsada "+this.className);
      var nota=this.className.split(' ')[1];
      //console.log(nota);
      notasdelDictadoF.push(nota);
      //console.log("asd"+notasdelDictado2[i]);
      /*dibujo las notas---*/
      dibujaNotasF(this.className);
      $("span.notas-compas-armonicoF").html("<p>notas del compas en Fa escritas: "+ contadorNumNotasCompasF+"</p>");
      $("span.num-compas-armonicoF").html("<p>numero de compas de clave de Fa: "+ (contadorCompasesF+1) +"</p>");
    }
    else {
    console.log("estoy en el else"+ contadorCompasesG+" "+contadorCompasesF);
      if (contadorCompasesG>4 && contadorCompasesF>4) {
        botonArmonico.html("repetir dictado");
        botonCalificacion.html("ver califacion")
        botonCalificacion.appendTo($("div.calificacion"))
        controlDictado=1;
        i=0;
      }
    }
  }
}


function dibujaNotasF(nombre) {
  /*separo el nombre de las clases----*/
  console.log("contador notas del compas"+contadorNumNotasCompasF);
  var div=nombre.split(' ')[0];
  var nombreNota=nombre.split(' ')[1];
  var band=0;
  console.log("nombre nota: "+nombreNota);
  var nota=$(".nota"+nombreNota);
  /*-----checo que la nota no esté en el compás y si está la clono---*/
  if(jQuery.inArray(nota[0], notasdelCompasF)!=-1)
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
  switch (contadorNumNotasCompasF) {
    case 1:
    /*-------si no es el primer compas limpiamos las notas del compas----*/
      if(contadorCompasesF>0){
       $(".line-space-arF "+".nota").css("display","none");
        $(".line-space-arF "+".nota").css("left","auto");
          for (var i = 0; i < notasdelCompasF.length; i++) {
            console.log("notas del compas a ocultar"+notasdelCompasF[i].className);
            notasdelCompasF[i].style.display="none";
            //console.log("nota clonada "+notasdelCompas[i].className.split(" ")[2]);
            if(notasdelCompasF[i].className.split(" ")[2]=="clonada")
            {console.log("remover "+notasdelCompasF[i].className );
              notasdelCompasF[i].remove();
            }
          }
          notasdelCompasF=[];
      }
      /*-------si la nota está ya en el compas dibujas la nota clonada----*/

      notasdelCompasF.push(nota[0]);
        notasdelDictadoFaux.push(nota[0]);
        nota[0].style.left="20%";
        nota[0].style.display="block";
        console.log("nota nueva 1");

    break;
    case 2:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
      if(band==1)
      {
           console.log("clonada2 "+aux[0].className);
           $(".nota"+nombreNota+".clonada")[0].style.left="40%";
           $(".nota"+nombreNota+".clonada")[0].style.display="block";
           notasdelCompasF.push($(".nota"+nombreNota+".clonada")[0]);
           notasdelDictadoFaux.push($(".nota"+nombreNota+".clonada")[0]);

      }
      else
      { notasdelCompasF.push(nota[0]);
        notasdelDictadoFaux.push(nota[0]);
        nota[0].style.left="40%";
        nota[0].style.display="block";
        console.log("nota nueva 2");
      }
    break;
    case 3:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {

          $(".nota"+nombreNota+".clonada")[0].style.left="60%";
          $(".nota"+nombreNota+".clonada")[0].style.display="block";
          notasdelCompasF.push($(".nota"+nombreNota+".clonada")[0]);
          notasdelDictadoFaux.push($(".nota"+nombreNota+".clonada")[0]);
          console.log("clonada3");

    }
    else{
      notasdelCompasF.push(nota[0]);
      notasdelDictadoFaux.push(nota[0]);
        nota[0].style.left="60%";
        nota[0].style.display="block";
        console.log("nota nueva 3");
    }
    break;
    case 4:
      /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {

          $(".nota"+nombreNota+".clonada")[0].style.left="80%";
          $(".nota"+nombreNota+".clonada")[0].style.display="block"
          notasdelCompasF.push($(".nota"+nombreNota+".clonada")[0]);
          notasdelDictadoFaux.push($(".nota"+nombreNota+".clonada")[0]);
          console.log("nombre de aux"+aux[0].className);
          console.log("clonada4");
    }
    else{
        notasdelCompasF.push(nota[0]);
        notasdelDictadoFaux.push(nota[0]);
        nota[0].style.left="80%";
        nota[0].style.display="block";
        console.log("nota nueva 4");
      }
      /*----receteamos el numero de notas por compas aumentamos el num-compas*/
        contadorNumNotasCompasF=0;
        contadorCompasesF++;
        /*si el dictado ya termino*/
        if(contadorCompasesF>4 && contadorCompasesG>4)
        { console.log(notasdelDictadoF.length+" "+notasdelDictadoF);
          contadorCompasesF =0;
          botonArmonico.html("repetir dictado");
          botonCalificacion.html("ver califacion")
          botonCalificacion.appendTo($("div.calificacion"))
          controlDictado=1;
          i=0;

        }
        console.log("tamaño de notas del Compas "+notasdelCompasF.length+" ");
    break;
    default:
  }
}//dibujaNotas

function notaPulsadaG() {
  if(controlDictado==2)
  { if(contadorCompasesG<=4)
    {
      contadorNumNotasCompasG+=1;
      var aumento=160;
      //console.log("pulsada "+this.className);
      var nota=this.className.split(' ')[1];
      //console.log(nota);
      console.log("contadorCompasesG if"+ contadorCompasesG);
       notasdelDictadoG.push(nota);
       console.log(notasdelDictadoG.length+" "+notasdelDictadoG );
        /*dibujo las notas---*/
        dibujaNotasG(this.className);
      $("span.notas-compas-armonicoG").html("<p>notas del compas en Sol escritas: "+ contadorNumNotasCompasG+"</p>");
      $("span.num-compas-armonicoG").html("<p>numero de compas de clave de Sol: "+ (contadorCompasesG+1) +"</p>");
    }
    else {
      console.log("estoy en el else"+ contadorCompasesG+" "+contadorCompasesF);
      if (contadorCompasesG>4 && contadorCompasesF>4) {
        botonArmonico.html("repetir dictado");
        botonCalificacion.html("ver califacion")
        botonCalificacion.appendTo($("div.calificacion"))
        controlDictado=1;
        i=0;
      }
    }
  }
}


function dibujaNotasG(nombre) {
  /*separo el nombre de las clases----*/
  console.log("contador notas del compas"+contadorNumNotasCompasG);
  var div=nombre.split(' ')[0];
  var nombreNota=nombre.split(' ')[1];
  var band=0;
  console.log("nombre nota: "+nombreNota);
  var nota=$(".line-space-ar "+".nota"+nombreNota);
  /*-----checo que la nota no esté en el compás y si está la clono---*/
  if(jQuery.inArray(nota[0], notasdelCompasG)!=-1)
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
  switch (contadorNumNotasCompasG) {
    case 1:
    /*-------si no es el primer compas limpiamos las notas del compas----*/
      if(contadorCompasesG>0){
        $(".line-space-ar "+".nota").css("display","none");
        $(".line-space-ar "+".nota").css("left","auto");
          for (var i = 0; i < notasdelCompasG.length; i++) {
            console.log("notas del compas a ocultar"+notasdelCompasG[i].className);
            notasdelCompasG[i].style.display="none";
            //console.log("nota clonada "+notasdelCompas[i].className.split(" ")[2]);
            if(notasdelCompasG[i].className.split(" ")[2]=="clonada")
            {console.log("remover "+notasdelCompasG[i].className );
              notasdelCompasG[i].remove();
            }
          }
          notasdelCompasG=[];
      }
      /*-------Escribo la nota----*/
      notasdelCompasG.push(nota[0]);
        notasdelDictadoGaux.push(nota[0]);
        nota[0].style.left="20%";
        nota[0].style.display="block";
        console.log("nota nueva 1");

    break;
    case 2:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
      if(band==1)
      {
           console.log("clonada2 "+aux[0].className);
           $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.left="40%";
           $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.display="block";
           notasdelCompasG.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);
           notasdelDictadoGaux.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);

      }
      else
      { notasdelCompasG.push(nota[0]);
        notasdelDictadoGaux.push(nota[0]);
        nota[0].style.left="40%";
        nota[0].style.display="block";
        console.log("nota nueva 2");
      }
    break;
    case 3:
    /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {

      $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.left="60%";
      $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.display="block";
      notasdelCompasG.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);
      notasdelDictadoGaux.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);
          console.log("clonada3");

    }
    else{
      notasdelCompasG.push(nota[0]);
      notasdelDictadoGaux.push(nota[0]);
        nota[0].style.left="60%";
        nota[0].style.display="block";
        console.log("nota nueva 3");
    }
    break;
    case 4:
      /*-------si la nota está ya en el compas dibujas la nota clonada----*/
    if(band==1)
    {

      $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.left="80%";
      $(".line-space-ar "+".nota"+nombreNota+".clonada")[0].style.display="block";
      notasdelCompasG.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);
      notasdelDictadoGaux.push($(".line-space-ar "+".nota"+nombreNota+".clonada")[0]);
          console.log("clonada4");
    }
    else{
        notasdelCompasG.push(nota[0]);
        notasdelDictadoGaux.push(nota[0]);
        nota[0].style.left="80%";
        nota[0].style.display="block";
        console.log("nota nueva 4");
      }
      /*----receteamos el numero de notas por compas aumentamos el num-compas*/
        contadorNumNotasCompasG=0;
        contadorCompasesG++;
        /*si el dictado ya termino*/
        if(contadorCompasesG>4)
        { console.log(notasdelDictadoG.length+" "+notasdelDictadoG);
          /*contadorCompasesG=0;
          botonArmonico.html("repetir dictado");
          botonCalificacion.html("ver califacion")
          botonCalificacion.appendTo($("div.calificacion"))
          controlDictado=1;
          i=0;*/

        }
        console.log("tamaño de notas del Compas "+notasdelCompasG.length+" ");
    break;
    default:
  }
}//dibujaNotas


function reproducirNotaF(notaReproducir) {
  console.log("reproducirNota"+ notaReproducir+" contador"+contadornotasReproducidasF);
  if(contadornotasReproducidasF<=19 )
  {ion.sound.play(notaReproducir);
    contadornotasReproducidasF++;
  }
  else {
    clearInterval(play2);

  }
}

function reproducirDictado() {
  // play sound

    play =  setInterval(function() {
      reproducirNotaG(dictadoG[contadornotasReproducidasG]);
    },4000);
    play2 =  setInterval(function() {
      reproducirNotaF(dictadoF[contadornotasReproducidasF]);
    },4000);
}

function reproducirNotaG(notaReproducir) {
  console.log("reproducirNota"+ notaReproducir+" contador"+contadornotasReproducidasG);
  if(contadornotasReproducidasG<=19 )
  {ion.sound.play(notaReproducir);
    contadornotasReproducidasG++;
  }
  else {
    clearInterval(play);
    botonRepetir.html("reproducir de nuevo");
    botonRepetir.appendTo( $("div.calificacion") );

  }
}

function verCalG() {
  var aciertos=0;
  var nombreNota;
  console.log("ver cali");
  for (var i = 0; i < notasdelDictadoG.length; i++) {
    console.log("dictado "+notasdelDictadoG[i]);
    console.log("modelo "+dictadoG[i]);
    if( notasdelDictadoG[i]==dictadoG[i])
      aciertos++;
  }
  $("span.aciertos-armonicoG").html("<p>aciertos en el dictado: "+ aciertos+" aciertos de 20 posibles</p>");
}

function verCalF() {
  var aciertos=0;
  var nombreNota;
  console.log("ver cali");
  for (var i = 0; i < notasdelDictadoF.length; i++) {
    console.log("dictado "+notasdelDictadoF[i]);
    console.log("modelo "+dictadoF[i]);
    if( notasdelDictadoF[i]==dictadoF[i])
      aciertos++;
  }
  $("span.aciertos-armonicoF").html("<p>aciertos en el dictado: "+ aciertos+" aciertos de 20 posibles</p>");
}

});
