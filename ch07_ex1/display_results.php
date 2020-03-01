<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // get the rest of the data for the form
    $password = filter_input(INPUT_POST, 'password');

    $phone = filter_input(INPUT_POST, 'phone');

    // for the heard_from radio buttons,
    // display a value of 'Unknown' if the user doesn't select a radio button
    $heard_from = filter_input(INPUT_POST, 'heard_from');
    if ($heard_from == NULL) {
        $heard_from = 'unknown';
    }

    // for the wants_updates check box,
    // display a value of 'Yes' or 'No'
    $wants_updates = isset($_POST['wants_updates']);
    

    //drop-down list
    $contact_via = filter_input(INPUT_POST, 'contact_via');

    //text area
    $comments = filter_input(INPUT_POST, 'comments');
    $comments = nl2br($comments, false);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br>

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo htmlspecialchars($heard_from); ?></span><br>

        <label>Send Updates:</label>
        <span>
        <?php
            if ($wants_updates == TRUE) {
            echo 'Yes';
        } else { echo 'No';
        }
        ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo htmlspecialchars($contact_via); ?></span><br><br>

        <span>Comments:</span><br>
        
        <span><?php 
        // to display text with lines breaking correctly, but not displaying new line br tags:
        //     echo ($comments); 
        // to display with line br tags being displayed:
        echo htmlspecialchars($comments); 
        ?></span><br>        
    </main>
</body>
</html>