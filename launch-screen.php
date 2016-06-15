<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Componentes</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" >Componentes</a>
            </div>
        </div>
        <!-- /.container -->
    </nav>
	
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php
				$secao = "primeiros_passos";
			 include "menu.php"; ?>

            <div class="col-md-9">

                <div class="thumbnail wrapper-geral">
                   
                   <!-- /////////////////////////////////// -->
                   <!-- /////////conteúdo da seção///////// -->
                   <!-- /////////////////////////////////// -->
                    <div>
                    	
                        <h1>Launch Screen with Story Board</h1>
                        <hr>
                        <ul>
                            <li>
                                Set launch file in tab > General
                                <img src="img/launch-01.png" class="img-center">
                            </li>
                            <li>
                                Select LaunchScreen.storyboard in Project navigator, check the option "Use as Launch Screen" in file Inspector
                                <img src="img/launch-02.png" class="img-center">
                            </li>
                            <li>
                                Drag and drop an ImageView inside the Views Controller Scene
                                <img src="img/launch-3.png" class="img-center">
                            </li>
                            <li>
                                Select the ImageView added before, change its width and height. I put w x h 200<br>
                                First, check the box and after change the size value<br>
                                Click "Add 2 constraints" button
                                <img src="img/launch-4.png" class="img-center">
                            </li>
                            <li>
                                With ImageView selected, change position to centralize it.<br>
                                First, check the box and after change the size value<br>
                                Click "Add 2 constraints" button
                                <img src="img/launch-5.png" class="img-center">
                            </li>
                            <li>
                                It is almost done!!!<br>
                                Now let's resolve Auto Layout Issues, click the button "Resolve Auto Layout Issues" and update frames
                                <img src="img/launch-6.png" class="img-center">
                            </li>
                            <li>
                                It's time to pick out our image<br>
                                With ImageView selected go to > Atributes Inspector tab and choose the image u want, remender to remove its extension (it is the trick, because the image may note appear when building the app on real device, happened with me!!!).
                                <img src="img/launch-7.png" class="img-center">
                            </li>
                            <li>
                               So, CMD+R to build and run your app. Voilá!!!!!
                            </li>
                        </ul>



                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                    </div>                   
                   <!-- /////////////////////////////////// -->
                   <!-- /////////////////////////////////// -->
                   
                </div>
            </div>

        </div>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
