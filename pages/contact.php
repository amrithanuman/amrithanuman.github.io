<?php

//define variables and set to empty
$fullname = $from = $subjectTitle = $messageContent = "";

//error messages
$nameError = $emailError = $subjectError = $messageError = "";

//function to validate form data
function validateFormData($formData){
    $formData = trim(stripslashes(htmlspecialchars($formData)));
    return $formData;        
}

if(isset($_POST['submit'])){
//validate data
    if(!$_POST["fullname"]){
        $nameError = "Please enter your name.";
    }
    else{
        $full_name = validateFormData($_POST['fullName']);
    }

    if(!$_POST["senderEmail"]){
        $emailError = "Please enter an email address.";
    }
    else{
        $from = validateFormData($_POST['senderEmail']);
    }
    
    if(!$_POST["subjectTitle"]){
        $subjectError = "Please enter a subject title.";
    }
    else{
        $subject = validateFormData($_POST['subjectTitle']);
    }
    
    if(!$_POST["messageContent"]){
        $messageError = "Please enter your message.";
    }
    else{
        $message = $full_name . "wrote the following:" . "\r\n\n" . validateFormData($_POST['messageContent']);
    }


    $to = "amrit2025@hotmail.com"; // this is your Email address  
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from . "\r\n";
    
    mail($to,$subject,$message,$headers);
    echo "Mail Sent. Thank you " . $full_name . ", I will contact you shortly.";
    }
?>

<main id="contact">
        <div class="banner">
        <div class="banner-content">
        <h1>Contact Me</h1>
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
                        <form action="contact.php" method="POST">
                            <div class="form-group">
                                <label for="nameField">Name</label><?php echo $nameError ?>
                                <input type="text" class="form-control" id="nameField" name="fullName">
                            </div>
                            <div class="form-group">
                                <label for="emailField">Email address</label><?php echo $emailError ?>
                                <input type="email" class="form-control" id="emailField" aria-describedby="emailHelp" name="senderEmail">
                            </div>
                            <div class="form-group">
                                <label for="subjectField">Subject</label><?php echo $subjectError ?>
                                <input type="text" class="form-control" id="subjectField" name="subjectTitle">
                            </div>
                            <div class="form-group">
                                <label for="messageField">Message</label><?php echo $messageError ?>
                                <textarea class="form-control" id="messageField" rows="3" name="messageContent"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>           
                    </div> 
                </div>              
            </div>
                          
        </div>
    <div class="whitespace"></div>
</main>