
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.1/examples/blog/blog.css" rel="stylesheet">
</head>
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


?>
<body>
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



                    // var ele = document.getElementsByTagName("iframe")[i];
                    // var offSetWidth = ele.offsetWidth;
                    // console.log(offSetWidth);
                    $("iframe").css({"height": 100, "width": "100%"});

                    var ancho_minRepro=this.offsetWidth -(this.offsetWidth/2);
                    ancho_minRepro=Math.round(ancho_minRepro);
                    $("iframe").css({"height": ancho_minRepro, "width": "100%"});


                });
            }
        }
    });



</script>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-2 pt-1">
                <a class="text-muted" href="#">Cesar Auris</a>
            </div>
            <div class="col-8 text-center">
                <a class="blog-header-logo text-dark" href="#"><?php echo $titulo->innertext?></a>
            </div>
            <div class="col-2 d-flex justify-content-end align-items-center">

                <a class="btn btn-sm btn-outline-secondary" href="#">Para mi mama(Mercedez saga)</a>
            </div>
        </div>
    </header>
    <br>

    <div class="row mb-2" id="lista_iframes" >

<!--    --><?php
    foreach ($article->find('iframe')as $clave =>  $cal) {
        ?>
        <div class="col-md-3">

        </div>


        <div class="col-md-6">
            <div><h2>Capitulo - <?php echo ($clave+1)?></h2></div>
            <div class="card flex-md-row mb-4 shadow-sm">
                <div class="card-body d-flex flex-column align-items-start">

                   <?php echo $cal;?>
                </div>

            </div>
        </div>
        <div class="col-md-3">

        </div>
        <?php
    }
        ?>

    </div>
</div>

<footer class="blog-footer">

    <p>
        <a href="#">Para Dereck y mi mama</a>
    </p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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


</body>
</html>





