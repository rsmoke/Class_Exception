<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/configClassException.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/../Support/basicLib.php');

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>LSA-<?php echo "$appTitle";?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo "$appTitle";?>">
        <meta name="keywords" content="LSA,<?php echo $deptLngName;?>,<?php echo "$appTitle";?>,University of Michigan">
        <meta name="author" content="LSA-MIS_rsmoke">
        <link type="text/plain" rel="author" href="humans.txt" />

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="icon" href="favicon.ico">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha256-ZT4HPpdCOt2lvDkXokHuhJfdOKSPFLzeAJik5U/Q+l4=" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.css" integrity="sha256-NRYg+xSNb5bHzrFEddJ0wL3YDp6YNt2dGNI+T5rOb2c=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.structure.min.css" integrity="sha256-BqNqkUORr/AcpXU3ploO0dTrvb0PPjhDEi3q7PiM8ng=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.theme.min.css" integrity="sha256-HQ93J0nrYQ3eaKvwWaffUshLBHZW+nrgxFLvay4Hzf8=" crossorigin="anonymous">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.min.css" integrity="sha256-v8+xOYOnVjQoSDMOqD0bqGEifiFCcuYleWkx2pCYsVU=" crossorigin="anonymous" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css" integrity="sha256-K3Njjl2oe0gjRteXwX01fQD5fkk9JFFBdUHy/h38ggY=" crossorigin="anonymous">

<!--        <link rel="stylesheet" href="css/normalize.css">-->
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
<!--        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>-->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="index.php">
                        <?php echo "$appTitle";?></a>
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
                <div class="col-md-8 col-md-offset-2 jumbotron">

                    <?php if(isset($_POST['submit'])){
                        $to = "engClassExceptionNotices@umich.edu"; // this is your Email address
                        $from = htmlspecialchars($_POST['email']); // this is the sender's Email address
                        $first_name = htmlspecialchars($_POST['first_name']);
                        $last_name = htmlspecialchars($_POST['last_name']);
                        $course_no = htmlspecialchars($_POST['course_no']);
                        $comment = htmlspecialchars($_POST['message']);
                        $subject = "English Class Exception- " . htmlspecialchars($_POST['topic']);
                        $subject2 = "Copy of your English Class Exception form submission";
                        $messageFooter = "-- Please do not reply to this email. If you requested a reply or if we need more information, we will contact you at the email address you provided. --";
                        $message = "logged in as=> " . $login_name . "\n\nFull Name=> " . $first_name . " " . $last_name . "\n\nemail=> " . $from . "\n\nCourse Number=> " . $course_no . "\n\nReason=> " . htmlspecialchars($_POST['topic']) .  "\n\nMessage:" . "\n\n" . $comment;
                        $message2 = "Here is a copy of your Class Exception message " . $first_name . "\n\nCourse Number=> " . $course_no . ":\n\nReason=> " . htmlspecialchars($_POST['topic']) . "\n\n Message:" . "\n\n" . $comment;


                        $headers = "From:" . $from;
                        $headers2 = "From:" . $to;
                        mail($to,$subject,$message,$headers);
                        mail($from,$subject2,$message2, "From:english.department@umich.edu"); // sends a copy of the message to the sender
                        echo "<h4>Mail Sent.</h4> <p>Thank you " . $first_name . " for sending your class exception! We’ve sent you a copy of this message at the email address you provided.<br>
Have a great day!</p>";

                        // prepare and bind
                        $sqlInsert = <<<_SQL
    INSERT INTO `responses`
    (`login_name`,
    `first_name`,
    `last_name`,
    `reason`,
    `email`,
    `message`,
    `course_no`)
    VALUES
    (?,?,?,?,?,?,?);
_SQL;

                        $stmt = $db->prepare($sqlInsert);
                        if( false === $stmt ) {
                            db_fatal_error('prepare() failed: ', htmlspecialchars($db->error), $stmt, $login_name);
                        }
                        $rc = $stmt->bind_param("sssssss", $login_name, $first_name, $last_name, $subject, $from, $comment, $course_no);
                        if ( false===$rc ) {
                            // again execute() is useless if you can't bind the parameters. Bail out somehow.
                            db_fatal_error('bind_param() failed: ',htmlspecialchars($stmt->error), $stmt, $login_name);
                        }

                        // set parameters and execute
                        $rc = $stmt->execute();
                        // execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
                        // 2006 "server gone away" is always an option
                        if ( false===$rc ) {
                            db_fatal_error('execute() failed: ',htmlspecialchars($stmt->error), $stmt, $login_name);
                        }

                        $stmt->close();

                        $login_name = $first_name = $last_name = $subject = $from = $comment = $course_no = null;

                        echo "<a class='btn btn-info' href='https://webapps.lsa.umich.edu/english/secure/userservices/profile.asp'>Return to UofM English Department</a>";
                        // You can also use header('Location: thank_you.php'); to redirect to another page.
                        unset($_POST['submit']);
                    } else {
                        ?>
                        <h3>If you are unable to teach one of your classes please fill out and submit this form so the English Department staff can communicate you absence to your students.</h3>
                        <h4 class='text-primary'>Please describe the reason for your exception in the message box below.</h4>
                        <small>If you would like us to contact you please specify that in your message.</small>
                        <h5>Your Uniqname: <?php echo $login_name ?></h5>
                        <?php $username = ldapGleaner($login_name);?>
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
                            <div class="form-group">
                                <label for="first_name">First Name:</label><input required type="text" class="form-control" name="first_name" value="<?php echo $username[0] ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label><input required type="text" class="form-control" name="last_name" value="<?php echo $username[1] ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label><input required type="email" class="form-control" name="email" value="<?php echo $login_name ?>@umich.edu">
                            </div>
                            <div class="form-group">
                                <label for="course_no">Course Number: </label><input required type="text" class="form-control" name="course_no">
                            </div>
                            <div class="form-group">
                                <label for="topic">Reason I am unable to teach my course:</label>
                                <select required class="form-control" name="topic">
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

<!--        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.min.js" integrity="sha256-H7Mu9l17V/M6Q1gDKdv27je+tbS2QnKmoNcFypq/NIQ=" crossorigin="anonymous"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-84157001-1 to be your site's ID. -->
        <?php include_once("analyticstracking.php") ?>
    </body>
</html>
