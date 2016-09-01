<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configClassException.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/basicLib.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <META http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>LSA-<?php echo "$contestTitle";?></title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="LSA-English Writing Contests">
  <meta name="keywords" content="LSA-English, Hopwood, Writing, UniversityofMichigan">
  <meta name="author" content="LSA-MIS_rsmoke">
  <link rel="icon" href="img/favicon.ico">

  <!-- <script type='text/javascript' src='js/webforms2.js'></script> -->

<!-- 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w="crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha256-ZT4HPpdCOt2lvDkXokHuhJfdOKSPFLzeAJik5U/Q+l4="crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.css" integrity="sha256-NRYg+xSNb5bHzrFEddJ0wL3YDp6YNt2dGNI+T5rOb2c="crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.structure.min.css" integrity="sha256-BqNqkUORr/AcpXU3ploO0dTrvb0PPjhDEi3q7PiM8ng="crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.theme.min.css" integrity="sha256-HQ93J0nrYQ3eaKvwWaffUshLBHZW+nrgxFLvay4Hzf8="crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.min.css" integrity="sha256-v8+xOYOnVjQoSDMOqD0bqGEifiFCcuYleWkx2pCYsVU="crossorigin="anonymous" media="screen">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css" integrity="sha256-K3Njjl2oe0gjRteXwX01fQD5fkk9JFFBdUHy/h38ggY="crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="css/default.css" media="all">
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> <a class="navbar-brand" href="index.php">
        <?php echo "$contestTitle";?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Signed in as <?php echo $login_name;?><strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="https://weblogin.umich.edu/cgi-bin/logout">logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </nav>

    <div class="container"><!--Container of all things -->
    <div class="row clearfix">
        <div class="col-md-6 col-md-offset-3 jumbotron">

<?php if(isset($_POST['submit'])){
    $to = "rsmoke@umich.edu"; // this is your Email address
    $from = htmlspecialchars($_POST['email']); // this is the sender's Email address
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $subject = "English Class Exception- " . htmlspecialchars($_POST['topic']);
    $subject2 = "Copy of your English Class Exception form submission";
    $messageFooter = "-- Please do not reply to this email. If you requested a reply or if we need more information, we will contact you at the email address you provided. --";
    $message = "logged in as=> " . $login_name . " " . $first_name . " " . $last_name . " email=> " . $from . " wrote the following:" . "\n\n" . htmlspecialchars($_POST['message']);
    $message2 = "Here is a copy of your message " . $first_name . ":\n\n" . htmlspecialchars($_POST['message']) . "\n\n" . $messageFooter;


    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2, "From:english.department@umich.edu"); // sends a copy of the message to the sender
    echo "<h4>Mail Sent.</h4> <p>Thank you " . $first_name . " for sending your class exception! We’ve sent you a copy of this message at the email address you provided.<br>
Have a great day!</p>";
    echo "<a class='btn btn-info' href='index.php'>Return to Hopwood Contest Judging</a>";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    unset($_POST['submit']);
    } else {
        ?>
<h4 class='text-primary'>Please describe the reason for your exception in the message box below.</h4>
<small>If you would like us to contact you please specify that in your message.</small>
<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
<div class="form-group">
<label for="first_name">First Name:</label><input type="text" class="form-control" name="first_name">
</div>
<div class="form-group">
<label for="last_name">Last Name:</label><input type="text" class="form-control" name="last_name">
</div>
<div class="form-group">
<label for="email">Email:</label><input type="email" class="form-control" name="email">
</div>
<div class="form-group">
<label for="topic">Reason I am unable to teach my course:</label>
<select class="form-control" name="topic">
  <option value="">--- Select a reason ---</option>
  <option value="Illness-Injury">Illness/Injury</option>
  <option value="OutOfTown">Out of town</option>
  <option value="Other">Other</option>
</select>

<div class="form-group">
<label for="message">Message:</label><textarea rows="5" class="form-control" name="message" cols="30"></textarea>
</div>
<input type="submit" name="submit" value="Submit">
</form>

<?php
}
?>
</div>
</div>
</div> <!-- END of container of all things -->
<?php
include("footer.php");
?>
</body>
</html>
