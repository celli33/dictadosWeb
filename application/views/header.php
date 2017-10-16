<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Dictados Musicales</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <link href="css/gallery-materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/init.js"></script>
    </body>

    <script>
      $(document).ready(function(){
        $('.carousel').carousel();
      });
       $('.carousel.carousel-slider').carousel({fullWidth: true});
    </script>
    <script>
       $( document ).ready(function(){$(".button-collapse").sideNav();})
    </script>
    <script >
       $(document).ready(function(){
        $('.parallax').parallax();
      });
    </script>
    <style type="text/css">       
       h1{
        text-align: center;
        font-size: 60px;
       }
    </style>