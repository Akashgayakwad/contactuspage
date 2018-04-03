
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <title>Contact Form</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1{
                color: purple;
            }
            .contactForm{
                border: 1px solid #7c73f6;
                margin-top: 50px;
                border-radius: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-offset-1 col-sm-10 contactForm">
                <h1>Contact us:</h1>
                <?php
                $errors;
                $resultmessage;
                //print_r($_POST);
                $name = $_POST["name"];
                $email = $_POST["email"];
                $message = $_POST["message"];
                 if($_POST["submit"])
                 { 
                     if(!$name)
                    {$errors .="<p>Please enter your name!</p>";
                    }
                     else{
                     $name = filter_var($name,FILTER_SANITIZE_STRING);
                     }
                     if(!$email)
                     {$errors .="<p>Please enter your Email address!</p>";
                     }
                     else{
                     $email = filter_var($email,FILTER_SANITIZE_EMAIL);
                     if(filter_var($email,FILTER_VALIDATE_EMAIL))
                     {$errors .="<p>Invalid Email!</p>";
                     }
                     }
                    if(!$message)
                    {$errors .="<p>Please write your message!</p>";
                    }
                     else{
                     $message = filter_var($message,FILTER_SANITIZE_STRING);
                     }
                     if($errors)
                     {
                         $resultmessage = '<div class="alert alert-danger">'. $errors .'</div>';
                     }
                     else{
                        $to= "akashgayakwad123@gmail.com";
                         $subject="Contact";
                        $message="<p>Name: $name.
                        </p>
                        <p>Email: $email.
                        </p>
                        <p>Message:
                        </p>
                        <p><strong>$message
                        </strong></p>"; 
                         $headers="content-type: text/html";
                         if(mail($to, $subject, $message, $headers)){
                             $resultmessage='<div class="alert alert-success">Thanks for the message. We will get back to you ASAP.</div>';
                         }
                         else{
                             $resultmessage= '<div class="alert lert-warning">Unable to email. Please try again later!</div>';
                         }
                     }
                echo $resultmessage;
            }
                ?>
                <form method="post">
                
                    <label for="name">Name:</label>
                
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $_POST["name"];?>">
                 
                    <label for="email">Email:</label>
                
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                           value="<?php echo $_POST["email"];?>">
                
                    <label for="message">Message:</label>
                
                    <textarea name="message" id="message" class="form-control" rows="5">
                    <?php echo $_POST["message"];?>
                    </textarea>
                
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
                </form>
                </div>
            </div>
        </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>