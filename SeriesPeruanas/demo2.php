<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <style>
        .semana {
            color: gray;
        }
        table{
            font-size: 0.8em;
        }
        .titulo1{
            color: white !important;
            padding-bottom: 3%;
        }
    </style>
</head>
<body style="background-color: #bb32c9">
<script>
    //Para saver si ya  cargo la  pagina
    document.addEventListener("DOMContentLoaded", function(event) {
        var iframes =  document.getElementsByTagName("iframe");//todos los iframe
        var i;

        //recorremos los  iframes
        for (i = 0; i < iframes.length; i++) {

            //si llegamos al ultimo iframe
            if(i+1==iframes.length){
               //validamos  si  carlo los  iframes
                document.getElementsByTagName("iframe")[i].addEventListener('load', function() {
                   // alert("cargo sitio");
                    var altoPagina=screen.height;
                    var anchoPagina=screen.width;

                    var altoPagina_min=Math.round(altoPagina-(altoPagina/2));
                    var anchoPagina_min=Math.round(anchoPagina-(anchoPagina/2));

                    console.log("Ancho y alto:"+anchoPagina+"-"+altoPagina);
                    console.log("altoPagina_min:"+altoPagina_min);
                    console.log("anchoPagina_min:"+anchoPagina_min);

                    $("iframe").css({"height": altoPagina-120, "width": anchoPagina-120});
                });
            }
        }
    });


    (function() {


    })();


</script>
<div class="container py-5">


        <?php

       // $link=base64_decode($_GET['link']);
        require 'simple_html_dom_php7.php';
        $html = file_get_html('http://www.seriesperu.com/p/esto-es-guerra-programas-completos.html');

        $CuadradosFechas= $html->find('div[class=separator]',2);
        $fechaUltima_link= $CuadradosFechas->find('a',0);

        $link= $fechaUltima_link->href;



        $html = file_get_html($link);
        $titulo=$html->find('h1[class=post-title entry-title]',0);
        $article= $html->find('article',0);
        //echo $article;




/*
        $titulo = $html->find('div[class=panel]',0);
        echo "<div class='col-12'>";
        echo $titulo->find('h1[class=titulo1]',0);
        echo "</div>";
        $calendario = $html->find('div[class=tabla_calendario]');
        foreach ($calendario as $cal) {
            echo "<div class='col-md-4 col-sm-12'>";
            $mes = $cal->find('div[class=elmes]',0);
            $dias = $cal->find('table',0);

            echo $mes,"\n",$dias;
            echo "</div>";
        }
        */

        ?>

<div class="row">
    <h2><?php echo $titulo->innertext?></h2></div>
</div>

    <?php
    foreach ($article->find('iframe') as $cal) {

          echo "<div class='row'>
         ";

          echo $cal;
          echo "</div><div class='col-md-12'><h1></h1></div><br>";

    }
    ?>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script>

  //  $("iframe").css({"height": "yellow", "width": "200%"});
    /*
    $('table').addClass('table table-bordered table-responsive bg-white');
    $('.elmes a').addClass('text-light');
    $('.elmes').addClass('bg-primary py-2');
    $('.elmes').removeClass('small-12');
    $('.festivo').addClass('text-danger');
    $('.festivo').attr('href','');
    $('.semana').addClass('text-secondary');
    $( ".linkmes" ).attr("href","#");
    $( ".linkmes" ).attr("title","");
    */
</script>
</body>
</html>