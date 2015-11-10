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
                    	
                        <h1>Amazon APNS</h1>
                        <hr>
                        <a href="http://stackoverflow.com/questions/238980/how-to-change-the-name-of-an-ios-app">Fonte</a>
                        <hr>
                        <p>1- Click twice slowly on the project root in the project navigator and then it becomes editable.</p>
                        <img src="img/RUQLZ.png" class="img-center">
                        <br><br>
                        <p>2 - Rename the project.</p>
                        <img src="img/Acacl.png" class="img-center">
                        <br><br>
                        <p>3 - After pressing 'ENTER' the assistant will suggest you to automatically change all project-name-related entries and will allow you to de-select some of them, if you want.</p>
                        <img src="img/kjesb.png" class="img-center">
                        <br><br>
                        <p>4 - Press 'RENAME' and Xcode will do the rest. In the meanwhile Xcode may ask you about the option of making a snapshot of the project (it is very recommendable to do so).</p>
                        <br><br>
                        <p>5 - In addition to renaming the project, you may want to rename the scheme so that it matches your new project name.</p>
                        <img src="img/P7txC.png" class="img-center">
                        <br><br>
                        <p>6 - Repeat similar steps like 1 and 2, and press OK.</p>
                        <img src="img/8C3Aq.png" class="img-center">
                        <br><br>
                        <hr>
                        <p><b>Another scenario</b></p>
                        <p>The previous explanation was related to changing the project name, but chances are that you only need to change the display name that appears below the app icon in the home screen. These are the steps:</p>
                        <hr>
                        <p>1 - In the "Supporting Files" group locate the info.plist (or related) file</p>
                        <br>
                        <p>2 - Locate the "Bundle display name" key and change the value to the new name.</p>
                        <img src="img/HZhQq.png" class="img-center">
                        <br><br>
                        <p>3 - Delete the "old" app from the simulator or any other testing device.</p>
                        <br>
                        <p>4 - Clean and Rebuild your app again.</p>
                        <br>
                        <p>5 - That's it, you will now see the new app name in your home screen.</p>
                        
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
