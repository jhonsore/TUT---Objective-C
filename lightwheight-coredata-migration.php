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
                    	
                        <h1>How to Perform a Lightweight Core Data Migration</h1>
                        <hr>
                        <a target="_blank" href="http://www.raywenderlich.com/27657/how-to-perform-a-lightweight-core-data-migration">Fonte</a>
                        <hr>
                        
                        <p>All iOS apps deal with data, and many apps need to save data locally. Core Data is a compelling choice for data management and persistence in iOS and OS X, which if you’re here you probably already know! :]<br><br>
But what if you want to change the data model for your app after you ship? To do this, you’ll need to create something called a migration, which is a fancy way of telling Xcode how to transition the data from the old model to the new model.<br><br>
There are three primary ways to create a migration: automatic (aka lightweight), manual, and custom code. In reality, the migration process may involve one or more of these techniques.
The golden rule when it comes to Core Data migrations is, choose lightweight whenever possible. Manual migrations and migrations requiring custom code are a magnitude more complex and memory intensive.<br><br>
Thanks to the über smart engineers on the Core Data team at Apple, you can use lightweight migrations for an increasing percentage of your migration needs with every new release of iOS and OS X. And even when a more complex migration is necessary, you can mix in lightweight migrations to do some of the heavy lifting before you have to dig in.<br>
In this tutorial, you will learn how to successfully perform a lightweight Core Data migration.<br><br>
The app you will create in this tutorial will enable users to record passing thoughts. You know, those moments of inspiration and brilliance that happen where else but when you’re standing in line or sitting on the throne? Soon, there will be an App for that! :]</p>
                        <hr>
                        <h2>Getting Started</h2>
                        <hr>
                        <p>You will be building this app from scratch, utilizing one of Xcode’s built in templates. Create a new project in Xcode (File\New\Project…). Select Master-Detail Application and click Next.</p>
                        <img src="img/SGNewProject1-474x320.png"  class="img-center">
                        <p>Enter PassingThoughts for the Product Name, enter an Organization Name, enter a Company Identifier prefix such as com.mycompany, select iPhone for Devices, and checkmark Use Storyboards, Use Core Data, and Use Automatic Reference Counting.</p>
                        <img src="img/SGNewProject2-474x320.png" class="img-center">
                        <p>Choose a suitable location to save your project and click Create.</p>
                        <p>As far as habits go, here’s a good one: build and run early, build and run often. So let’s do that now. I’ll be using the iPhone 6.0 Simulator in this tutorial, but you can also use a provisioned iPhone or iPod touch device instead if you want (check out this tutorial to learn about device provisioning).</p>
<p>Click Run (or Product\Run), and you should see the standard Master-Detail app in all its glory.</p>
<p>Important: Tap the + button a few times to create some entries – you’ll need some sample data to upgrade with migrations in this tutorial!
</p>
<img src="img/SGMasterDetailApp1-158x320.png" class="img-center">
						<hr>
                        <h2>Core Data Cliff Notes</h2>
                        <hr>
                        <p>Before you continue on, let’s take a quick review of the basics of Core Data.<br><br>
The Core Data model is made up of two components:</p>
<ul>
<li>The managed object model: The managed object model describes the database schema (entities and their properties).</li>
<li>The Core Data stack: The Core Data stack is made up of three parts (you can have more than one set of these):</li>
<li>Persistent store: Think of this as the database itself (usually SQLite).</li>
<li>Persistent store coordinator: Think of this as the “database connection”. Each coordinator can have one and only one managed object model and one persistent store (which it is initialized with).</li>
<li>Managed object context: Think of this as the “scratch pad.” Each context can have one and only one persistent store coordinator (which it is instantiated with).</li>
</ul>
<p>Check out this diagram to see what I mean:</p>

<img src="img/SGCoreDataModel1-320x320.png" class="img-center">
<p>Got the terminology down? OK, let’s talk migrations!</p>
						<hr>
                        <h2>Hello Migration</h2>
                        <hr>
                        <p>When the model does not match the store, a migration is required. In order to perform a migration, Core Data (technically, an instance of NSMigrationManager) requires these things:</p>
<ul>
    <li>The destination managed object model (the one with the changes)</li>
    <li>A managed object model that can open the existing store</li>
    <li>The ability to infer mapping between the two models (for a lightweight migration), or a manual mapping model</li>
    <li>Permission to attempt to perform an automatic migration (for a lightweight migration)</li>
</ul>
<p>It is therefore absolutely essential that you never make changes to the managed object model for a released version of an app. That is, if your app is already in the App Store, don’t change a single thing in that version of the managed object model.</p>
<p>But obviously you need to change the database model over time – so what is a poor developer to do?!</p>
<p>I hinted at the answer… create a new version of the managed object model! This reminds me to mention some other best practices to adopt when working with Core Data:</p>
<ul>
<li>Create a new model version for every release version of an app</li>
<li>Keep a copy of every release version of an app (you’re already doing this, right?)</li>
<li>Keep a copy of every release version backing SQLite store containing suitable test data</li>
</ul>

<p class=""><code>Note: Core Data does not perform migrations linearly. It will attempt to perform a migration from whatever the current version is on a user’s device to the newest version available when the user selects to install the latest update in the App Store.</code></p>
<p>For example, let’s say you have an app in the App Store and you have already released a second version of the app with changes to the model. Some of your users install the update. Others do not.</p>
<p>Then you create a 3rd version of the app/model and release it to the App Store. Your existing users may have the 1st or 2nd version of your app on their device. Core Data will attempt to migrate from whatever version the user currently has on their device directly to version 3 of your app/model, e.g., from version 1 to 3, or from version 2 to 3.</p>
<p>Along these lines, here’s a good guide to follow when you need to make changes to your managed object model, to help ensure a smooth migration process (you’ll be going through these steps shortly):</p>

<ul>
<li>Create a new version of your managed object model and switch to that model</li>
<li>Make changes to that new model, being mindful of what kind of migration(s) your changes will require</li>
<li>Test every combination of possible migration, e.g., from version 1 to 2, from 1 to 3, and from 2 to 3</li>
</ul>
<p>Imagine how complex this could get once you’ve released a dozen or more versions! Lightweight migrations will quickly become your BFF, so long as your changes do not require a more complex migration.</p>

						<hr>
                        <h2>Let’s Recap</h2>
                        <hr>
                        
                        <p>So, to sum it all up, here’s what it takes for a migration to work:</p>

<ul>
<li>
When the current version of the model (i.e., the new one with changes) does not match the persistent store coordinator…</li>
<li>…and Core Data finds a model that can open the existing (old) store on the user’s device…</li>
<li>…and it finds either a mapping model or the permission and ability to infer mapping (for a lightweight migration)…</li>
<li>…and it has permission to attempt to automatically perform a migration (for a lightweight migration)…</li>
<li>…a migration is kicked off, w00t! :D</li>
</ul>

<p>And if not, well, Houston, we have a problem ;]
</p>
<hr>
                        <h2>What Lightweight Migrations Can Do For You</h2>
                        <hr>
                        
                        <p>Remember, you want to use lightweight migrations whenever possible because they are the simplest (and least error prone) option.
Lightweight migrations can handle the following changes:</p>

<ul>
<li>Adding or removing an entity, attribute, or relationship</li>
<li>Making an attribute non-optional with a default value</li>
<li>Making a non-optional attribute optional</li>
<li>Renaming an entity or attribute using a renaming identifier</li>
</ul>

<p>A more complex migration will be necessary for any other changes, or if lightweight migration is not enabled (i.e., Core Data is not given permission to infer mapping and perform an automatic migration).</p>

<p>On a related subject, there are some changes that do not require a migration, basically anything that doesn’t change the underlying SQLite backing store, including:</p>

<ul>
<li>Changing the name of an NSManagedObject subclass</li>
<li>Adding or removing a transient property</li>
<li>Making changes to the user info dictionary</li>
<li>Changing validation rules</li>
</ul>

<p>To enable lightweight migrations, you need to pass a dictionary containing two keys to the options parameter of the method that initializes the persistent store coordinator. These keys are:</p>

<ul>
<li>NSMigratePersistentStoresAutomaticallyOption – attempt to automatically migrate versioned stores</li>
<li>NSInferMappingModelAutomaticallyOption – attempt to create the mapping model automatically</li>
</ul>

						<hr>
                        <h2>Preparing For A Model Update: The Challenge!</h2>
                        <hr>
                        
                        <p>In this tutorial, you’re going to update the storyboard and associated view controllers, and then modify the managed object model.<br><br>
But before you do that, you have to prepare your project in order to handle modifications to your managed object model. Based on what you’ve learned so far, see if you can figure out how to do this on your own!
</p>

<p>Important note: Don’t run your project after making these modifications yet. This is because if you do it will upgrade your model to the new version, and you don’t want to do that until you actually modify it :]</p>

<div class="border">
<strong>Hint</strong><br><br>
There are two steps:<br><br>
Add a new model version. Hint: Check the “Editor” menu!
Set options for persistent store coordinator. Hint: see the persistent store coordinator’s addPersistentStoreWithType:configuration:URL:options:error: method!</div>

<div class="border">
<strong>Solution</strong><br><br>
<p>You need to create a new version of the managed object model and switch to it. And while you’re at it, you’ll give the persistent store coordinator the permission it needs to attempt to do lightweight migrations.<br>
Select PassingThoughts.xcdatamodeld in Xcode and then from the menu select Editor\Add Model Version… Leave the version name as PassingThoughts 2 and click Finish.</p>
<img src="img/SGAddModelVersion1-474x320.png" class="img-center">

<p>Select PassingThoughts.xcdatamodeld again (not PassingThoughts.xcdatamodel, that’s the old version) and this time in the File inspector (View\Utilities\Show File Inspector), in the Versioned Core Data Model section, select PassingThoughts 2 for Current.</p>

<img src="img/SGUtilitiesFileInspector1-231x320.png" class="img-center">

<p>You should now see a little green circle with white checkmark badge on PassingThoughts 2.xcdatamodel in the Project Navigator (View\Navigators\Show Project Navigator).<br><br>
You’ll also notice that PassingThoughts.xcdatamodeld is now a folder containing PassingThoughts 2.xcdatamodel and PassingThoughts.xcdatamodel. Actually, it’s a package. If you right-click on it and click Show in Finder and then right-click on the file in Finder and click Show Package Contents, you’ll see your two data model files.</p>

<img src="img/SGProjectNavigator1.png" class="img-center">
<p>Open AppDelegate.m and add the following code immediately after _persistentStoreCoordinator = [[NSPersistentStoreCoordinator alloc] initWithManagedObjectModel:[self managedObjectModel]];</p>


<div class="response"><xmp>NSDictionary *options = @{
NSMigratePersistentStoresAutomaticallyOption : @YES,
NSInferMappingModelAutomaticallyOption : @YES
};
 
And that's it - you're now ready to safely update your model using lightweight migrations!
</xmp></div>


<p>Change the next line to pass the options dictionary you just created to addPersistentStoreWithType:configuration:URL:options:error:</p>

<div class="response"><xmp>if (![_persistentStoreCoordinator addPersistentStoreWithType:NSSQLiteStoreType configuration:nil
        URL:storeURL options:options error:&error]) {
...
</xmp></div>

<p>Congratulations if you knew the answer before showing the solution! :] Be sure to perform the steps in the solution before proceeding.</p>

<hr>
                        <h2>Model</h2>
                        <hr>
                        
                        <p>Open PassingThoughts 2.xcdatamodel (double-check to make sure you have selected the correct one), double-click on the Event entity under ENTITIES in the Document Outline, and rename it to Thought. With the Thought entity still selected, in the Data Model inspector (View\Utilities\Show Data Model Inspector), in the Versioning Section, enter Event for Renaming ID.</p>
 <p>What you just did is let Xcode know that when it upgrades the database, it should move all data from the Event table to the Thought table. Pretty easy, eh?</p>
 <p>Next, click + in the Attributes section to create two additional attributes:</p>
 
 <ul>
 <li>what – Type: string</li>
<li>where – Type: string</li>
 </ul>
 
 <p>Double-click the timeStamp attribute in the Attributes section in the Editor and rename it when. With the when attribute still selected, in the Data Model inspector, in the Versioning Section, enter timeStamp for Renaming ID.</p>
<p>Your managed object model should look like this:</p>
<img src="img/SGXcode1a-480x134.png" class="img-center">
<p>That’s it for the changes to the model – now let’s fix up the views to display this!</p>

<hr>
                        <h2>Views</h2>
                        <hr>
                        
                        <p>Open up MainStoryboard.storyboard in Xcode, select the Master View Controller Scene, double-click on the word Master in the navigation bar and change the text to “Thoughts.”</p>
<p>Add a “+” bar button to the navigation bar on the right by dragging a UIBarButtonItem from the Object library (View\Utilities\Show Object Library) to the right of the word “Thoughts.” Select the bar button and in the Attributes inspector (View\Utilities\Show Attributes Inspector) in the Bar Button Item section, change Identifier to Add.</p>
<img src="img/SGXcode2a-480x186.png" class="img-center">
<p>Control-drag from the “+” bar button to the Detail View Controller scene and release. Select push in the popup.</p>
<img src="img/SGXcode1b-480x117.png" class="img-center">
<p>There will now be two segues from the Master View Controller scene to the Detail View Controller scene. Select the top segue, which should be the new one, and in the Attributes inspector (View\Utilities\Show Attributes Inspector), in the Storyboard Segue section, enter AddThought for Identifier. Note that Identifier should be blank at first. If it’s not (i.e., it is showDetail), select the other segue.</p>
<img src="img/SGXcode1c-480x261.png" class="img-center">
<p>Select the other segue and rename it ShowThought.</p>
<p><code>Note: It would be a better user experience, and more inline with Apple’s Human Interface Guidelines, to present an “add” view via a modal segue and include a Cancel button. When using Core Data, I would instantiate an undo manager with the managed object context, and then call rollback on the context in a delegate method when the user taps Cancel. However, I will not be covering how to implement this, in order to keep things focused on the tutorial topic.</code></p>
<p>Select the prototype cell, and in the Attributes inspector (View\Utilities\Show Attributes Inspector), in the Table View Cell section, change Style to Subtitle.</p>
<img src="img/SGXcode2b-184x320.png" class="img-center">
<p>Select the Detail View Controller scene, delete the UILabel with the placeholder text “Detail view content goes here,” and add the following objects by dragging them from the Object library (View\Utilities\Show Object Library) with the specified additional attributes (View\Utilities\Show Attributes Inspector) in the Label section) and size dimensions (View\Utilities\Show Size Inspector) in the View section:</p>

<ul>
<li>UILabel – Font: System Bold, Tighten Letter Spacing: checked, Text: When, Width: 60</li>
<li>UILabel – Font: System Bold, Text: Where, Width: 60</li>
<li>UILabel – Font: System Bold, Text: When, Width: 60</li>
<li>UILabel – (delete text), Width: 140</li>
<li>UITextField – Width: 140</li>
<li>UITextView – Width: 280, Height: 120</li>
</ul>

<p>Arrange the layout of the Detail View Controller scene to look the this:</p>
<img src="img/SGStoryboard1-192x320.png" class="img-center">

<p>Control-drag from the UITextField to the Detail View Controller yellow proxy icon in the scene dock and select delegate in the popup.</p>
<img src="img/SGStoryboard2-181x320.png" class="img-center">
<p>Now let’s hook these new views up to code!</p>



<hr>
                        <h2>Controllers</h2>
                        <hr>
                        
                        <p>Open MasterViewController.m and in the viewDidLoad method, delete the following two lines of code:
</p>



<div class="response"><xmp>UIBarButtonItem *addButton = [[UIBarButtonItem alloc] initWithBarButtonSystemItem:UIBarButtonSystemItemAdd target:self action:@selector(insertNewObject:)];
self.navigationItem.rightBarButtonItem = addButton;
</xmp></div>

<p>Change the signature of the insertNewObject: method to the following:
</p>

<div class="response"><xmp>- (NSManagedObject *)insertNewObject
</xmp></div>

<p>And add the following line to the bottom of the method:
</p>

<div class="response"><xmp>return newManagedObject;
</xmp></div>

<p>In the insertNewObject method, change [newManagedObject setValue:[NSDate date] forKey:@”timeStamp”]; to:</p>

<div class="response"><xmp>[newManagedObject setValue:[NSDate date] forKey:@"when"];
</xmp></div>

<p>Change the prepareForSegue:sender: method to look like this:
</p>

<div class="response"><xmp>- (void)prepareForSegue:(UIStoryboardSegue *)segue sender:(id)sender
{
    // 1
    if ([[segue identifier] isEqualToString:@"AddThought"]) {
        NSManagedObject *object = [self insertNewObject];
        [[segue destinationViewController] setDetailItem:object];
 
        // 2
    } else if ([[segue identifier] isEqualToString:@"ShowThought"]) {
        NSIndexPath *indexPath = [self.tableView indexPathForSelectedRow];
        NSManagedObject *object = [[self fetchedResultsController] objectAtIndexPath:indexPath];
        [[segue destinationViewController] setDetailItem:object];
    }
}
</xmp></div>

<p>You’re handling two cases here:<br></p>

<ul>
<li>Create a new thought when the user taps “+.”</li>
<li>Change the name of the segue to ShowThought to match what you renamed it to in the storyboard.</li>
</ul>

<p>Change the fetchedResultsController method to look like this:</p>

<div class="response"><xmp>- (NSFetchedResultsController *)fetchedResultsController
{
    if (_fetchedResultsController != nil) {
        return _fetchedResultsController;
    }
 
    NSFetchRequest *fetchRequest = [[NSFetchRequest alloc] init];
    // Edit the entity name as appropriate.
 
    // 1
    NSEntityDescription *entity = [NSEntityDescription entityForName:@"Thought" inManagedObjectContext:self.managedObjectContext];
    [fetchRequest setEntity:entity];
 
    // Set the batch size to a suitable number.
    [fetchRequest setFetchBatchSize:20];
 
    // Edit the sort key as appropriate.
 
    // 2
    NSSortDescriptor *sortDescriptor = [[NSSortDescriptor alloc] initWithKey:@"when" ascending:NO];
    NSArray *sortDescriptors = @[sortDescriptor];
 
    [fetchRequest setSortDescriptors:sortDescriptors];
 
    // Edit the section name key path and cache name if appropriate.
    // nil for section name key path means "no sections".
 
    // 3
    NSFetchedResultsController *aFetchedResultsController = [[NSFetchedResultsController alloc] initWithFetchRequest:fetchRequest managedObjectContext:self.managedObjectContext sectionNameKeyPath:nil cacheName:@"AllThoughts"];
    aFetchedResultsController.delegate = self;
    self.fetchedResultsController = aFetchedResultsController;
 
	NSError *error = nil;
	if (![self.fetchedResultsController performFetch:&error]) {
	     // Replace this implementation with code to handle the error appropriately.
	     // abort() causes the application to generate a crash log and terminate. You should not use this function in a shipping application, although it may be useful during development. 
	    NSLog(@"Unresolved error %@, %@", error, [error userInfo]);
	    abort();
	}
 
    return _fetchedResultsController;
}
</xmp></div>

<p>This does the following:</p>

<ul>
<li>Change the entityForName parameter to what you renamed the entity to.</li>
<li>Change the initWithKey paramenter to what you renamed the timeStamp attribute to.</li>
<li>Change the cacheName parameter to AllThoughts to more accurately describe this cache.</li>
</ul>

<p>Next, change the configureCell:atIndexPath: method to look like this:</p>


<div class="response"><xmp>- (void)configureCell:(UITableViewCell *)cell atIndexPath:(NSIndexPath *)indexPath
{
    NSManagedObject *object = [self.fetchedResultsController objectAtIndexPath:indexPath];
 
    // 1
    NSDate *date = [object valueForKey:@"when"];
    cell.textLabel.text = [NSDateFormatter localizedStringFromDate:date dateStyle:NSDateFormatterShortStyle timeStyle:NSDateFormatterShortStyle];
 
    // 2
    NSString *where = [object valueForKey:@"where"];
    NSString *what = [object valueForKey:@"what"];
 
    if ([where length]) {
        cell.detailTextLabel.text = [NSString stringWithFormat:@"Where: %@", where];
    } else if ([what length]) {
        cell.detailTextLabel.text = [NSString stringWithFormat:@"What: %@", what];
    } else {
        cell.detailTextLabel.text = nil;
    }
}
</xmp></div>


<p>This does the following:</p>

<ul>
<li>Set the textLabel to a localized formatted date.</li>
<li>Set the detailTextLabel to either where or what or nil.</li>

</ul>

<p>Next you are going to use a pretty cool feature in Xcode (as of version 4) that will allow you to declare IBOutlet properties in the class file by Control-dragging from the object in the storyboard scene to the class file.</p>

<p>With MainStoryboard.storyboard open in Xcode, select the Detail View Controller scene, open the Assistant editor (View\Assistant Editor\Show Assistant Editor), make sure that Automatic is displayed in the ribbon menu above the right editor (or click on whatever is displayed there and select Automatic), and make sure that the MasterViewController.h interface file is displayed in the right editor (Navigate\Jump to Next Counterpart to toggle between interface and implementation files).<br><br>
Let’s also close the Document Outline by clicking anywhere in the storyboard editor and then select Editor\Hide Document Outline from the menu. Your Xcode workspace should look similar to this (by the way, you can click on any image to open it in a larger view):</p>

<img src="img/SGXcode3-480x248.png" class="img-center">

<p>In DetailViewController.h, delete the following orphaned property declaration (this was for the “Detail view content goes here” UILabel that you deleted earlier):</p>


<div class="response"><xmp>@property (weak, nonatomic) IBOutlet UILabel *detailDescriptionLabel;
</xmp></div>

<p>Switch to DetailViewController.m (Navigate\Jump to Next Counterpart), and declare adopting the UITextFieldDelegate and UITextViewDelegate protocols by changing the line @interface DetailViewController () to look like this:</p>

<div class="response"><xmp>@interface DetailViewController () <UITextFieldDelegate, UITextViewDelegate>
</xmp></div>

<p>Change the configureView method to look like this:</p>

<div class="response"><xmp>- (void)configureView
{
    // Update the user interface for the detail item.
 
    if (self.detailItem) {
 
        // 1
        NSDate *date = [self.detailItem valueForKey:@"when"];
        self.whenLabel.text = [NSDateFormatter localizedStringFromDate:date dateStyle:NSDateFormatterShortStyle timeStyle:NSDateFormatterShortStyle];
 
        // 2
        self.whereTextField.text = [self.detailItem valueForKey:@"where"];
        self.whatTextView.text = [self.detailItem valueForKey:@"what"];
    }
}
</xmp></div>


<p>You’ll get some errors when you add in this code, but don’t worry – you’ll fix them up soon. Here you’ve done the following:</p>

<ul>
<li>Set the whenLabel to a localized formatted date.</li>
<li>Set whereTextField and whatTextView text to where and what, respectively.</li>
</ul>


<p>Add the following code after the didReceiveMemoryWarning method:</p>

<div class="response"><xmp>- (void)viewWillDisappear:(BOOL)animated
{
    [super viewWillDisappear:animated];
    [self saveContext];
}
</xmp></div>

<p>When the user taps the Thoughts (back) button, the saveContext method will be called.
</p>

<p>In the storyboard in the left editor, Control-drag from the empty UILabel (to the right of the “When” UILabel) to the extension in DetailViewController.m in the right editor, so that your pointer is right between @interface DetailViewController () and – (void)configureView; (a blue line should separate those two lines of code) and release the click. In the pop-up that appears, enter whenLabel for Name and click Connect.</p>
<img class="img/SGXcode4-480x130.png" class="img-center">

<p>The class extension should now look like this:</p>

<div class="response"><xmp>@interface DetailViewController ()
@property (weak, nonatomic) IBOutlet UILabel *whenLabel;
- (void)configureView;
@end
</xmp></div>

<p>Control-drag from the empty UITextField (to the right of the “Where” UILabel) to the extension in DetailViewController.m in the right editor, right below the whenLabel property declaration you just made and release. In the pop-up that appears, enter whereTextField for Name and click Connect. The class extension should now look like this:</p>



<div class="response"><xmp>@interface DetailViewController ()
@property (weak, nonatomic) IBOutlet UILabel *whenLabel;
@property (weak, nonatomic) IBOutlet UITextField *whereTextField;
@end
</xmp></div>

<p>Control-drag from the empty UITextView (below the “What” UILabel) to the extension in DetailViewController.m in the right editor, right below the whereTextField property declaration you just made and release. In the pop-up that appears, enter whatTextView for Name and click Connect. The class extension should now look like this:</p>

<div class="response"><xmp>@interface DetailViewController ()
@property (weak, nonatomic) IBOutlet UILabel *whenLabel;
@property (weak, nonatomic) IBOutlet UITextField *whereTextField;
@property (weak, nonatomic) IBOutlet UITextView *whatTextView;
@end
</xmp></div>

<p>Enter the following code in viewDidLoad, right below [self configureView];:</p>

<div class="response"><xmp> // 1
    [self.whatTextView becomeFirstResponder];
 
    // 2
    UITapGestureRecognizer *tapGestureRecognizer = [[UITapGestureRecognizer alloc] initWithTarget:self action:@selector(hideKeyboard)];
    tapGestureRecognizer.cancelsTouchesInView = NO;
    [self.view addGestureRecognizer:tapGestureRecognizer];
</xmp></div>


<p>This does the following:</p>


<ul>
<li>Place the insertion cursor in the what text view and display the keyboard.</li>
<li>Add a tap gesture recognizer to the view, so that if the keyboard is displayed, tapping anywhere outside of an input object will call the hideKeyboard method to dismiss the keyboard.</li>
</ul>


<p>Enter the following code at the bottom of the file, right above @end:</p>

<div class="response"><xmp>#pragma mark - Private methods
 
- (void)hideKeyboard
{
    [self.view endEditing:YES];
}
</xmp></div>


<p>Enter the following code after the hideKeyboard method:</p>

<div class="response"><xmp>- (void)saveContext
{
    NSError *error = nil;
    NSManagedObjectContext *managedObjectContext = [self.detailItem managedObjectContext];
 
    if (managedObjectContext != nil) {
        if ([managedObjectContext hasChanges] && ![managedObjectContext save:&error]) {
            NSLog(@"Unresolved error %@, %@", error, [error userInfo]);
            abort();
        }
    }
}
</xmp></div>

<p>This method will save the managed object context, which essentially saves any changes in the database.</p>
<p>Finally, add this last bit of code:</p>

<div class="response"><xmp>#pragma mark - UITextFieldDelegate
 
// 1
- (BOOL)textFieldShouldReturn:(UITextField *)textField
{
    [textField resignFirstResponder];
    return YES;
}
 
// 2
- (void)textFieldDidEndEditing:(UITextField *)textField
{
    if ([textField isEqual:self.whereTextField]) {
        [self.detailItem setValue:textField.text forKey:@"where"];
    }
}
 
#pragma mark - UITextViewDelegate
 
// 3
- (void)textViewDidEndEditing:(UITextView *)textView
{
    if ([textView isEqual:self.whatTextView]) {
        [self.detailItem setValue:textView.text forKey:@"what"];
    }
}
</xmp></div>

<p>These methods do the following:</p>

<ul>
<li>Hide the keyboard when return is tapped.</li>
<li>Set the detailItem’s where attribute to the contents of the whereTextField.</li>
<li>Set the detailItem’s what attribute to the contents of the whatTextView.</li>
</ul>


<p><code>Note: I would normally create NSManagedObject subclasses for all entities, which would enable using dot notation for getter and setter accessors (vs. using KVC setValue:forKey:). I’ve omitted doing so here in order to keep things focused on the tutorial topic. Check out this tutorial to learn more about NSManagedObject subclasses.</code></p>








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
