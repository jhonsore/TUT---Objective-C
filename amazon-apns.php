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
                        <a href="https://bckstage.signin.aws.amazon.com/console*">https://bckstage.signin.aws.amazon.com/console*</a>
                        <hr>
                        <h2>Step 1: Create an iOS App</h2>
                        <p>To get started with sending a push notification message to an iOS app, you must have an Apple developer account, created an App ID (application identifier), registered your iOS device, and created an iOS Provisioning Profile. For more information, see the <a class="ulink" href="https://developer.apple.com/library/mac/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/Introduction.html" target="_blank">Apple Local and Push Notification Programming Guide</a>.</p>
                        <h2>Step 2: Obtain an APNS SSL Certificate</h2>
                        <p><p>
        Amazon SNS requires the APNS SSL certificate of the app in the .pem format when using the Amazon SNS API. 
        When using the Amazon SNS console you can upload the certificate in .p12 format and Amazon SNS will convert it to .pem and display it in the console.
        You use the Keychain Access application on your Mac computer to export the APNS SSL certificate.
        For more information about the SSL certificate, see
        <a class="ulink" href="https://developer.apple.com/library/ios/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/Chapters/ProvisioningDevelopment.html" target="_blank">Provisioning and Development</a> in the 
        Apple Local and Push Notification Programming Guide.
    </p></p>
    <div class="procedure"><a name="d0e3042"></a><p class="title"><b>To download an APNS SSL certificate</b></p><ol class="procedure" type="1"><li class="step"><p>
                On the <a class="ulink" href="https://developer.apple.com/" target="_blank">Apple Developer web site</a>,
                click <span class="guilabel">Member Center</span>, click <span class="guilabel">Certificates, Identifiers and Profiles</span>, 
                and then click <span class="guilabel">Certificates</span>. 
            </p></li><li class="step"><p>
                Select the certificate you created for iOS APNS development, click
                    <span class="guilabel">Download</span>, and then save the file, which will have the .cer
                extension type. </p></li></ol></div>
                <div class="procedure"><a name="d0e3066"></a><p class="title"><b>To convert the APNS SSL certificate from .cer format to .pem format</b></p><p>
            The following steps use the <span class="application">openssl</span> utility. 
        </p><ul class="procedure"><li class="step"><p>
                At a command prompt, type the following command. Replace <code class="filename">myapnsappcert.cer</code> 
                with the name of the certificate you downloaded from the Apple Developer web site.
            </p><pre class="programlisting"><code class="nohighlight">openssl x509 -in <em class="replaceable"><code class=""><span class="">myapnsappcert</span><span class="">.cer</span></code></em> -inform DER -out <em class="replaceable"><code class=""><span class="">myapnsappcert</span><span class="">.pem</span></code></em></code></pre><p>
                The newly created .pem file will be used to configure Amazon SNS for sending mobile push notification messages.                 
            </p></li></ul></div>
            
            <div class="section"><div class="titlepage"><div><div><h2 class="title" style="clear: both" id="private-key-apns">Step 3: Obtain the App Private Key</h2></div></div></div><p>
        Amazon SNS requires an app private key in the .pem format. You use the <span class="guilabel">Keychain
        Access</span> application on your Mac computer to export the app private key.
    </p><div class="procedure"><a name="d0e3097"></a><p class="title"><b>To obtain the app private key</b></p><p> The private key associated with the SSL certificate can be exported from the
            <span class="application">Keychain Access</span> application on your Mac computer. This is
            based on the assumption that you have already imported the .cer file you downloaded from
            the Apple Developer web site into <span class="application">Keychain Access</span>. You can do this
            either by copying the .cer file into <span class="application">Keychain Access</span> or
            double-clicking the .cer file. </p><ol class="procedure" type="1"><li class="step"><p>
                Open <span class="application">Keychain Access</span>, select <span class="guilabel">Keys</span>, and then highlight your app private key.
            </p></li><li class="step"><p>
                Click <span class="guilabel">File</span>, click <span class="guilabel">Export Items...</span>, and then enter a name in the <span class="guilabel">Save As:</span> 
                field.
            </p></li><li class="step"><p>
                Accept the default .p12 file format and then click <span class="guilabel">Save</span>. 
            </p><p>
                The .p12 file will then be converted to .pem file format.
            </p></li></ol></div><div class="procedure"><a name="d0e3140"></a><p class="title"><b>To convert the app private key from .p12 format to .pem format</b></p><ul class="procedure"><li class="step"><p>
                At a command prompt, type the following command. Replace <code class="filename">myapnsappprivatekey.p12</code> 
                with the name of the private key you exported from <span class="application">Keychain Access</span>.</p><pre class="programlisting"><code class="nohighlight">openssl pkcs12 -in <em class="replaceable"><code class=""><span class="">myapnsappprivatekey</span><span class="">.p12</span></code></em> -out <em class="replaceable"><code class=""><span class="">myapnsappprivatekey</span><span class="">.pem</span></code></em> -nodes -clcerts</code></pre><p>
                The newly created .pem file will be used to configure Amazon SNS for sending mobile push notification messages.
            </p></li></ul></div></div>
            
            <div class="section"><div class="titlepage"><div><div><h2 class="title" style="clear: both" id="verify-cert-private-key-apns">Step 4: Verify the Certificate and App Private Key</h2></div></div></div><p>
        You can verify the .pem certificate and private key files by using them to connect to APNS.
    </p><div class="procedure"><a name="d0e3167"></a><p class="title"><b>To verify the certificate and private key by connecting to APNS</b></p><ul class="procedure"><li class="step"><p>
                At a command prompt, type the following command. Replace <code class="filename">myapnsappcert.pem</code> 
                and <code class="filename">myapnsappprivatekey.pem</code> with the name of your certificate and private key.</p><pre class="programlisting"><code class="nohighlight">openssl s_client -connect gateway.sandbox.push.apple.com:2195 -cert <em class="replaceable"><code class=""><span class="">myapnsappcert</span><span class="">.pem</span></code></em> -key <em class="replaceable"><code class=""><span class="">myapnsappprivatekey</span><span class="">.pem</span></code></em></code></pre></li></ul></div></div>
                
                <div class="section"><div class="titlepage"><div><div><h2 class="title" style="clear: both" id="device-token-apns">Step 5: Obtain a Device Token</h2></div></div></div><p>
        When you register your app with APNS to receive push notification messages,
        a device token (64-byte hexadecimal value) is generated. The following steps describe how to use the sample iOS app
        provided by AWS to obtain a device token from APNS. You can use this sample iOS app to
        help you get started with Amazon SNS push notifications.
        For more information, see
        <a class="ulink" href="http://developer.apple.com/library/mac/#documentation/NetworkingInternet/Conceptual/RemoteNotificationsPG/Introduction.html" target="_blank">Registering for Remote Notifications</a> in the Apple Local and Push Notification Programming Guide.
    </p><div class="procedure"><a name="d0e3195"></a><p class="title"><b>To obtain a device token from APNS for your app</b></p><ol class="procedure" type="1"><li class="step"><p> Download and unzip the
                <a class="ulink" href="samples/snsmobilepush.zip" target="_blank">snsmobilepush.zip</a> file.</p></li><li class="step"><p>Navigate to the <code class="filename">AppleMobilePushApp</code> folder and then open either the <code class="filename">iOS 7 and earlier</code> or <code class="filename">iOS 8</code> folder.</p></li><li class="step"><p>
                In <span class="application">Xcode</span>, open the <code class="filename">AmazonMobilePush.xcodeproj</code> project.  
            </p></li><li class="step"><p>
                Run the app in <span class="application">Xcode</span>. In the output window, you
                should see the device token displayed, which is similar to the following:
                </p><pre class="programlisting"><code class="nohighlight">Device Token = &lt;examp1e 29z6j5c4 df46f809 505189c4 c83fjcgf 7f6257e9 8542d2jt 3395kj73&gt;</code></pre><p> 
            </p><div class="aws-note"><p class="aws-note">Note</p><p>
                    Do not include spaces in the device token when submitting it to Amazon SNS.
                </p></div></li></ol></div></div>
                
                <div class="section"><div class="titlepage"><div><div><h2 class="title" style="clear: both" id="mobile-push-apns-next-steps">Next Steps</h2></div></div></div><p>
        You should now have the necessary information from APNS (SSL certificate, app private key, and device token) to send 
        push notification messages to your mobile endpoint. 
        You can now send a notification to the iOS app on your device by either using the
        Amazon SNS console or the Amazon SNS API. 
    </p><div class="itemizedlist"><ul class="itemizedlist" type="disc"><li class="listitem"><p>To send a notification to the iOS app on your device using the Amazon SNS console, see <a class="xref" href="mobile-push-send.html" title="Using Amazon SNS Mobile Push">Using Amazon SNS Mobile Push</a>.</p></li><li class="listitem"><p>To use the Amazon SNS API, see
        <a class="xref" href="SNSMobilePushAPNSAPI.html" title="Send a push notification message to an iOS app using Amazon SNS and APNS">Send a push notification message to an iOS app using Amazon SNS and APNS</a>.</p></li><li class="listitem"><p>To send a push notification message to a VoIP app using Amazon SNS and APNS, see <a class="xref" href="sns-mobile-push-send-apns-voip.html" title="Send a push notification message to a VoIP iOS app using Amazon SNS and APNS">Send a push notification message to a VoIP iOS app using Amazon SNS and APNS</a>.</p></li><li class="listitem"><p>To send a push notification message to a Mac OS X app using Amazon SNS and APNS, see <a class="xref" href="sns-mobile-push-send-apns-macos-os-x.html" title="Send a push notification message to a Mac OS X app using Amazon SNS and APNS">Send a push notification message to a Mac OS X app using Amazon SNS and APNS</a>.</p></li></ul></div></div>
            
            
                        
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
