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
                    	
                        <h1>Your iOS Distribution Certificate will expire in 30 days.</h1>
                        <hr>
                        <ul>
                            <li>
                                <strong>Step 1: Revoke the expiring certificate</strong>
                                <p>Login to Member Center > Certificates, Identifiers & Profiles, select the expiring certificate and click the ‘Revoke’ button.</p>
                                <img src="img/uTx8z.png" class="img-center">
                            </li>
                            <li>
                                <strong>Step 2: Request a new certificate using Xcode</strong>
                                <p>Under Xcode > Preferences > Accounts > [Apple ID] > View Details, click on the ‘Create’ button beside the certificate that you've just revoked to let Xcode request a new one for you.</p>
                                <img src="img/QpSDI.png" class="img-center">
                            </li>
                            <li>
                                <strong>Step 3: Update your provisioning profiles to use the new certificate</strong>
                                <p>After which, head back to Member Center > Certificates, Identifiers & Profiles > Provisioning Profiles > All. You'll notice that any provisioning profile that made use of the revoked certificate is now reflected as ‘Invalid’.</p>
                                <img src="img/Riob5.png" class="img-center">
                                <p>Click on any profile that are now ‘Invalid’, click ‘Edit’, then choose the newly created certificate, then click on ‘Generate’. Repeat this until all provisioning profiles are regenerated with the new certificate.</p>
                                <img src="img/dKgLJ.png" class="img-center">
                            </li>
                            <li>
                                <strong>Step 4: Use Xcode to download the new provisioning profiles</strong>
                                <p>Back in Xcode > Preferences > Accounts > [Apple ID] > View Details, use ‘Download all’ to download the newly generated provisioning profiles.</p>
                                <img src="img/sM8O4.png" class="img-center">
                                <p>Tip: Before you download the new profiles, you may want to clear any existing and possibly invalid provisioning profiles from your Mac. You can do so by right-clicking on any existing profile, choose ‘Show in Finder’, then ‘Select All’ and deleting everything.</p>
                                <img src="img/nALfC.png" class="img-center">

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
