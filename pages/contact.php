<?php

//define variables and set to empty
$fullName = $from = $subjectTitle = $messageContent = $message = "";

//error messages
$nameError = $emailError = $subjectError = $messageError = $messageSent = "";

//

//function to validate form data
function validateFormData($formData){
    $formData = trim(stripslashes(htmlspecialchars($formData)));
    return $formData;        
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
//validate data
    if(empty($_POST["fullName"])){
        $nameError = "Please enter your name.";
    }
    else{
        $fullName = validateFormData($_POST['fullName']);
    }

    if(empty($_POST["senderEmail"])){
        $emailError = "Please enter an email address.";
    }
    else{
        $from = validateFormData($_POST['senderEmail']);
    }
    
    if(empty($_POST["subjectTitle"])){
        $subjectError = "Please enter a subject title.";
    }
    else{
        $subjectTitle = validateFormData($_POST['subjectTitle']);
    }
    
    if(empty($_POST["messageContent"])){
        $messageError = "Please enter your message.";
    }
    else{
        $messageContent = validateFormData($_POST['messageContent']);
        $message = $fullName . " wrote the following:" . "\r\n\n" . $messageContent;
    }

    if($fullName && $from && $subjectTitle && $messageContent){
        $to = "amrit2025@hotmail.com"; // this is your Email address  
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from . "\r\n";
        
        mail($to,$subjectTitle,$message,$headers);
        $messageSent = "Mail Sent. Thank you " . $fullName . ", I will contact you shortly.";
    }   
}
?>
<!DOCTYPE html>
<html ng-app="myWebsiteApp" ng-controller="mainController">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <title>Amrit Hanuman</title>

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!--Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

        <!--Fontawesome CDN -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        
        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="../css/styles.css">

    </head>
    <body>
        <header>
			<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="#">AH</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
					    		<a class="nav-link" href="../#!/">Home</a>
					    	</li>
					    	<li class="nav-item">
					    		<a class="nav-link" href="../#!/about">About</a>
					    	</li>
                            <li class="nav-item">
					    		<a class="nav-link" href="../#!/portfolio">Portfolio</a>
					    	</li>
					    	<li class="nav-item">
					    		<a class="nav-link" href="pages/contact.php">Contact</a>
					    	</li>
					    </ul>
				  </div>
				</div>
			</nav>
		</header>
        <main id="contact">
                <div class="banner">
                <div class="banner-content">
                <h1>Contact Me<br><?php echo $messageSent ?></h1>
                </div>
                </div>
                <div class="whitespace"></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <aside id="sidebar">
                                <div id="map" class="border rounded">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d980.2984995079566!2d-61.440173170832416!3d10.64203199952581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDM4JzMxLjMiTiA2McKwMjYnMjIuNyJX!5e0!3m2!1sen!2stt!4v1536678207153" allowfullscreen><p>Your browser does not support iframes.</p></iframe>
                                </div>
                                <div class="whitespace"></div>
                                <div id="details">
                                    <p id="address"><i class="fas fa-map-marker-alt"></i> LP 54 Sundarsingh Drive, Aranguez, San Juan</p>
                                    <p id="phone"><i class="fas fa-phone"></i> 1-868-763-8100</p>
                                    <p id="email"><i class="fas fa-envelope"></i> amrit.hanuman@gmail.com</p>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-8">
                            <div id="message">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="form-group">
                                        <label for="nameField">Name:</label><?php echo " " . $nameError ?>
                                        <input type="text" class="form-control" id="nameField" name="fullName" value="<?php echo $fullName;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailField">Email address:</label><?php echo " " . $emailError ?>
                                        <input type="email" class="form-control" id="emailField" aria-describedby="emailHelp" name="senderEmail" value="<?php echo $from;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="subjectField">Subject:</label><?php echo " " . $subjectError ?>
                                        <input type="text" class="form-control" id="subjectField" name="subjectTitle" value="<?php echo $subjectTitle;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="messageField">Message:</label><?php echo " " . $messageError ?>
                                        <textarea class="form-control" id="messageField" rows="3" name="messageContent"><?php echo $messageContent;?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>           
                            </div> 
                        </div>              
                    </div>

                </div>
            <div class="whitespace"></div>
        </main>
        <!-- Angular CDN and JS -->
        <script src="https://code.angularjs.org/1.7.0-rc.0/angular.min.js"></script>
        <script src="https://code.angularjs.org/1.7.0-rc.0/angular-route.min.js"></script>
        <script src="https://code.angularjs.org/1.7.0-rc.0/angular-resource.min.js"></script>
        <script src="js/myWebsiteApp.js"></script>

        <!-- JQuery, popper and Javascript CDN for Bootstrap-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    </body>
</html>