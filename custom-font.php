<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Objective C</title>

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
                <a class="navbar-brand" >Objective C</a>
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
                    	<h1>Custom font</h1>
                       <a href="http://codewithchris.com/common-mistakes-with-adding-custom-fonts-to-your-ios-app/">Common Mistakes With Adding Custom Fonts to Your iOS App</a>
                       <hr>
                       <h2>Step 1: Include your fonts in your XCode project</h2>
                       <p>Most commonly, you’ll have a TTF or OTF font that you’ll want to use with all of your UILabels or UITextViews in your app. Well, the first step is to include these fonts into your XCode project.</p>
                    	<p>I commonly keep all of my app resources such as images or fonts in their own directory called “Resources”. I find that this helps me stay organized as projects get much more complex and there are a lot of files. Whatever your case may be, either drag and drop your font file(s) into your XCode file tree or right click and “Add Files To…” to select your fonts.</p>
                    	<img class="img-center" src="img/AddingCustomFonts.jpg">
                        <h2>Step 2: Make sure that they’re included in the target</h2>
                        <p>The next thing to do is to make sure that they’re resources and included in your build target that you want to use the fonts in.</p>
                        <img src="img/CheckingFontMembership.jpg" class="img-center" >
                        <h2>Step 3: Double check that your fonts are included as Resources in your bundle</h2>
                        <p>This should not be a problem but sometimes when you’re having trouble getting your font face to show up, this can be a source of headache so let’s double check now to rule it out as a potential pitfall.</p>
                    	<p>Go to your project Build Phases pane by highlighting the XCode project file in your solution explorer and on the right hand side, select “Build Phases”. You’ll see that one of the sections you can expand is “Copy Bundle Resources”. Open that list and make sure that your fonts are included in that list.</p>
                    	<img src="img/iOSCustomFontBundleResources.jpg" class="img-center">
                    	<h2>Step 4: Include your iOS custom fonts in your application plist</h2>
                    	<p>The next thing to do is to modify your app’s plist to include these font faces. By default, your plist will be named something like [appname]-Info.plist and will reside in the “Supporting Files” folder if you haven’t moved it.</p>
                    	<p>Open it and add a new row called “Fonts provided by application” which will be an array that you need to add all the filenames of the fonts you want to use. In my case, it was three of the Neutraface 2 Display fonts as you can see in the screenshot below. Be careful to include the extension and make sure that you don’t perform any typos here. That’s another common problem, as simple as it may seem.</p>
                    	<img src="img/AddingCustomFontsToPlist.jpg" class="img-center">
                    	<h2>Step 5: Find the name of the font</h2>
                    	<p>This is a common pitfall for many people trying to include custom fonts into their iOS app. This was something that eluded me before as well and it’s the fact that when you specify which font you want to use, you’re not specifying the file name but rather, the font name. The tricky part is that the font name may not be what you expect. It could be very different than any of the visible font names that you can see.</p>
                    	<p>So in order to easily find the name of the font that you want to use, you can output something to the console window and see for yourself.</p>
                    	<p>Add this snippet of code to log all the fonts available to your app in the console.</p>
                    	<div class="destaque codigo">
            <div class="response"><xmp>for (NSString* family in [UIFont familyNames])
{
    NSLog(@"%@", family);
        
    for (NSString* name in [UIFont fontNamesForFamilyName: family])
    {
        NSLog(@"  %@", name);
    }
}
            </xmp>
            </div>
        </div>
                      <h2>Step 6: Use UIFont and specify the name of the font</h2>  
                      <p>And finally, you can simply display your custom font using UIFont and whatever UILabel or text view you want.</p>
                      <div class="destaque codigo">
            <div class="response"><xmp>UILabel *label = [[UILabel alloc] initWithFrame:CGRectMake(0, 0, self.view.frame.size.width, 60)];
label.textAlignment = NSTextAlignmentCenter;
label.text = @"Using Custom Fonts";
label.font = [UIFont fontWithName:@"Neutraface2Display-Titling" size:20]
            </xmp>
            </div>
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
