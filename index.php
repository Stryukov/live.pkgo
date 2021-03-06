
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Городские камеры видеонаблюдения</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">
    <!-- Flowplayer library -->
    <script src="//releases.flowplayer.org/7.2.4/flowplayer.min.js"></script>
    <!-- Flowplayer hlsjs engine (light) -->
    <script src="//releases.flowplayer.org/hlsjs/flowplayer.hlsjs.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//releases.flowplayer.org/7.2.4/skin/skin.css">    
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">О сервисе</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Контакты</h4>
                    <ul class="list-unstyled">
                    	<li><a href="#" class="text-white">Тел.: +7(4152) 303-100 (1234)</a></li>
                        <li><a href="#" class="text-white">Эл. адрес: it@pkgo.ru</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
            	<img src="img/cam.svg" height="25px" class="mr-2"> 
                <strong>Городские камеры видеонаблюдения</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php 
                    $cam = json_decode(file_get_contents("cfg.json"), true);
                    //echo $cam["ams"];
                    foreach ($cam[cams] as $cams){
                        echo '<div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <div id="'.$cams["name"].'" class="fp-slim"></div>
                                <div class="card-body">
                                    <p class="card-text">'.$cams["desc"].'</p>
                                </div>
                            </div>
                        </div>';                          
                        }?>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Наверх</a>
        </p>
        <p>Управление делами администрации Петропавловск-Камчатского городского округа. </p>
        <p><a href="http://pkgo.ru">Официальный сайт администрации Петропавловск-Камчаткого городского округа</a></p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/holder.min.js"></script>
<script type="text/javascript">
	var request = new XMLHttpRequest();
	request.open('GET', 'cfg.json');
	request.responseType = 'json';
	request.send();
	request.onload = function() {
	  var cfg = request.response;
	  var cams = cfg['cams'];
	    for (var j = 0; j < cams.length; j++) {
		    flowplayer("#"+cams[j].name, {
		      autoplay: false,
		      aspectRatio: "16:9",
		      clip: {
		        sources: [
		          { type: "application/x-mpegurl", src: "//"+cfg.ams+"/LiveApp/streams/"+cams[j].id+".m3u8" }
		        ]
		      }
		    });	    	  
	    }
	}	
</script>
</body>
</html>
