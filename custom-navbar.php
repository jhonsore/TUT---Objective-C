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
                    	
                        <h1>Customizing Navigation Bar and Status Bar</h1>
                        <hr>
                        <a href="http://www.appcoda.com/customize-navigation-status-bar-ios-7/">Fonte</a>
                        <hr>
                        <p>Xcode 5 bundles both iOS 6 and iOS 7 Simulators. Try to run the sample project using both versions of Simulators.</p>
                        <img src="img/Default-Navigation-Bar.jpg" class="img-center">
                        <p>As you can see, the navigation bar in iOS 7 is by default intertwined with the status bar. The default color is also changed to light gray, as well.</p>
                        <hr>
                        <h2>Changing the Background Color of Navigation Bar</h2>
                        <hr>
                        <p>In iOS 7, the tintColor property is no longer used for setting the color of the bar. Instead, use the barTintColor property to change the background color. You can insert the below code in the didFinishLaunchingWithOptions: of AppDelegate.m.</p>
                        <div class="destaque codigo">
                            <div class="response"><xmp>[[UINavigationBar appearance] setBarTintColor:[UIColor yellowColor]];</xmp></div>
                        </div>
                        <p>Here is the result:</p>
                        <img src="img/Change-Navigation-Bar-Background-Color.jpg" class="img-center">
                        <p>Normally you want to use your own color as the system color doesn’t look nice. Here is a very useful macro for setting RGB color:</p>
                        <div class="destaque codigo">
                            <div class="response"><xmp>#define UIColorFromRGB(rgbValue) [UIColor colorWithRed:((float)((rgbValue & 0xFF0000) >> 16))/255.0 green:((float)((rgbValue & 0xFF00) >> 8))/255.0 blue:((float)(rgbValue & 0xFF))/255.0 alpha:1.0]
</xmp></div>
                        </div>
                        <p>Simply put it somewhere at the beginning of AppDelegate.m and use it to create any UIColor object with whatever RGB color you want. Below is an example:</p>
                        <div class="destaque codigo">
                            <div class="response"><xmp>[[UINavigationBar appearance] setBarTintColor:UIColorFromRGB(0x067AB5)];</xmp></div></div>
                            <p>By default, the translucent property of navigation bar is set to YES. Additionally, there is a system blur applied to all navigation bars. Under this setting, iOS 7 tends to desaturate the color of the bar. Here are the sample navigation bars with different translucent setting.</p>
                            <img src="img/Navigation-Bar-Translucent.jpg" class="img-center">
                            <p>To disable the translucent property, you can simply select the navigation bar in Storyboard. Under Attribute Inspectors, uncheck the translucent checkbox.</p>
                            <img src="img/Storyboard-Navigation-Bar-Translucent.jpg" class="img-center">
                            <hr>
                            <h2>Using Background Image in Navigation Bar</h2>
                            <hr>
                            <p>If your app uses a custom image as the background of the bar, you’ll need to provide a “taller” image so that it extends up behind the status bar. The height of navigation bar is changed from 44 points (88 pixels) to 64 points (128 pixels).</p>
                            <p>You can still use the setBackgroundImage: method to assign a custom image for the navigation bar. Here is the line of code for setting the background image:</p>
                        <div class="response"><xmp>[[UINavigationBar appearance] setBackgroundImage:[UIImage imageNamed:@"nav_bg.png"] forBarMetrics:UIBarMetricsDefault];
</xmp></div>


<p>The sample Xcode project bundles two different background images: nav_bg.png and nav_bg_ios7.png. Try to test them out.</p>
                        <img src="img/Navigation-Bar-Background-Image.jpg" class="img-center">
                        
                        <hr>
                        <h2>Changing the Font of Navigation Bar Title</h2>
                        <hr>
                        <p>Just like iOS 6, you can customize the text style by using the “titleTextAttributes” properties of the navigation bar. You can specify the font, text color, text shadow color, and text shadow offset for the title in the text attributes dictionary, using the following text attribute keys:</p>
                        <ul>
                        <li>UITextAttributeFont – Key to the font</li>
                        <li>UITextAttributeTextColor – Key to the text color</li>
                        <li>UITextAttributeTextShadowColor – Key to the text shadow color</li>
                        <li>UITextAttributeTextShadowOffset – Key to the offset used for the text shadow</li>
                        </ul>
                        <p>Here is the sample code snippets for altering the font style of the navigation bar title:</p>
                        <div class="response"><xmp>NSShadow *shadow = [[NSShadow alloc] init];
    shadow.shadowColor = [UIColor colorWithRed:0.0 green:0.0 blue:0.0 alpha:0.8];
    shadow.shadowOffset = CGSizeMake(0, 1);
    [[UINavigationBar appearance] setTitleTextAttributes: [NSDictionary dictionaryWithObjectsAndKeys:
                                                           [UIColor colorWithRed:245.0/255.0 green:245.0/255.0 blue:245.0/255.0 alpha:1.0], NSForegroundColorAttributeName,
                                                           shadow, NSShadowAttributeName,
                                                           [UIFont fontWithName:@"HelveticaNeue-CondensedBlack" size:21.0], NSFontAttributeName, nil]];
</xmp></div>
<p>If you apply the change to the sample app, the title of navigation bar should look like this:</p>
<img src="img/Custom-Navigation-Bar-Title.jpg" class="img-center">
						<hr>
                        <h2>Customizing the Color of Back button</h2>
                        <hr>
                        <p>In iOS 7, all bar buttons are borderless. The back button is now a chevron plus the title of the previous screen (or just displays ‘Back’ as the button title if the title of the previous screen is nil). To tint the back button, you can alter the tintColor property, which provides a quick and simple way to skin your app with a custom color. Below is a sample code snippet:</p>
<div class="response"><xmp>[[UINavigationBar appearance] setTintColor:[UIColor whiteColor]];</xmp></div>
<p>In addition to the back button, please note that the tintColor property affects all button titles, and button images.</p>
<img src="img/Custom-Back-Button-Color.jpg" class="img-center">
<p>If you want to use a custom image to replace the default chevron, you can set the backIndicatorImage and backIndicatorTransitionMaskImage to your image.</p>
<div class="response"><xmp>[[UINavigationBar appearance] setBackIndicatorImage:[UIImage imageNamed:@"back_btn.png"]];
    [[UINavigationBar appearance] setBackIndicatorTransitionMaskImage:[UIImage imageNamed:@"back_btn.png"]];</xmp></div>
    <p>The color of the image is controlled by the tintColor property.</p>
    <img src="img/Chevron-replacement.jpg" class="img-center">
    <hr>
                        <h2>Use Image as Navigation Bar Title</h2>
                        <hr>
                        <p>Don’t want to display the title of navigation bar as plain text? You can replace it with an image or a logo by using a line of code:</p>
    <div class="response"><xmp>self.navigationItem.titleView = [[UIImageView alloc] initWithImage:[UIImage imageNamed:@"appcoda-logo.png"]];
</xmp></div>
<p>We simply change the titleView property and assign it with a custom image. This is not a new feature in iOS 7. The code also applies to lower versions of iOS.</p>
<img src="img/Custom-Navigation-Title-Image.jpg" class="img-center">
						<hr>
                        <h2>Adding Multiple Bar Button Items</h2>
                        <hr>
                        <p>Again, this tip is not specifically for iOS 7. But as some of you have raised such question before, I decide to put the tip in this tutorial. From time to time, you want to add more than one bar button item on one side of the navigation bar. Both the leftBarButtonItems and rightBarButtonItems properties lets you assign custom bar button items on the left/right side of the navigation bar. Say, you want to add a camera and a share button on the right side of the bar. You can use the following code:</p>
<div class="response"><xmp>UIBarButtonItem *shareItem = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemAction target:self action:nil];
    UIBarButtonItem *cameraItem = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemCamera target:self action:nil];
    
    NSArray *actionButtonItems = @[shareItem, cameraItem];
    self.navigationItem.rightBarButtonItems = actionButtonItems;
</xmp></div>
<p>Here is the sample result:</p>
<img src="img/Add-Multiple-Bar-Button-Items.jpg" class="img-center">
<hr>
                        <h2>Changing the Style of Status Bar</h2>
                        <hr>
                        <p>In older versions of iOS, the status bar was always in black style and there is not much you can change. With the release of iOS 7, you’re allowed to change the appearance of the status bar per view controller. You can use a UIStatusBarStyle constant to specify whether the status bar content should be dark or light content. By default, the status bar displays dark content. In other words, items such as time, battery indicator and Wi-Fi signal are displayed in dark color. If you’re using a dark background in navigation bar, you’ll end up with something like this:</p>
                        <img src="img/Dark-Navigation-Bar.jpg" class="img-center">
                        <p>In this case, you probably need to change the style of status bar from dark to light. There are two ways to do this. In iOS 7, you can control the style of the status bar from an individual view controller by overriding the preferredStatusBarStyle:</p>
<div class="response"><xmp>-(UIStatusBarStyle)preferredStatusBarStyle 
{ 
    return UIStatusBarStyleLightContent; 
}
</xmp></div>
<p>For the sample app, simply put the above code in the RecipeNavigationController.m and the status bar will display light content.</p>
<img src="img/Dark-Navigation-Bar-Light-Status-Bar.jpg" class="img-center">
<p>The method introduced above is the preferred way to change the status bar style in iOS 7. Alternatively, you can set the status bar style by using the UIApplication statusBarStyle method. But first you’ll need to opt out the “View controller-based status bar appearance”. Under the Info tab of the project target, insert a new key named “View controller-based status bar appearance” and set the value to NO.</p>
<img src="img/View-Controller-based-Status-Bar.jpg" class="img-center">
<p>By disabling the “View controller-based status bar appearance”, you can set the status bar style by using the following code:</p>
    <div class="response"><xmp>[[UIApplication sharedApplication] setStatusBarStyle:UIStatusBarStyleLightContent];
</xmp></div>
<hr>
                        <h2>Hiding the Status Bar</h2>
                        <hr>
                        <div class="response"><xmp>- (BOOL)prefersStatusBarHidden
{
    return YES;
}
</xmp></div>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
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
