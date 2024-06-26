<?php 
$title = "ContactUs";
include "header.php"; 

// Initialize $user_email variable
$user_email = '';
// Check if au_id is stored in session
if(isset($_SESSION['au_id'])) {
    $au_id = $_SESSION['au_id'];

 
    
    // Connect to the database
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'white_board_rules';
$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Run a query to search for email using au_id
    $query = "SELECT email FROM teachers WHERE au_id = $au_id";
    $result = $connection->query($query);

    // Check if the query was successful
    if($result && $result->num_rows == 1) {
        // Fetch the email
        $row = $result->fetch_assoc();
        $user_email = $row['email'];
    }
    
    $connection->close();
} else {
    // If au_id is not stored in session, default $user_email to an empty string
    $user_email = '';
}

require ($_SERVER['DOCUMENT_ROOT'] . '/directory/PHPMailer-master/PHPMailerAutoload.php');
$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   if (empty($name)) {
       $errors[] = 'Name is empty';
   }

   if (empty($email)) {
       $errors[] = 'Email is empty';
   } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $errors[] = 'Email is invalid';

   }

   if (empty($message)) {
       $errors[] = 'Message is empty';
   }

   if (!empty($errors)) {
       $allErrors = join('<br/>', $errors);
       $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
   } else {
       $mail = new PHPMailer();
       $mail->isSMTP();
       $mail->SMTPSecure = 'ssl';
       $mail->SMTPAuth = true;
       $mail->SMTPDebug=0; //4; //this is very verbose, just for testing, change to 0
       $mail->Host = 'smtp.gmail.com';
       $mail->Port = 465;
       $mail->Username = 'white.board.rules.24@gmail.com';
       $mail->Password = 'qern spkz tstw pbqo';
       $mail->setFrom('white.board.rules.24@gmail.com');
       $mail->addAddress('white.board.rules.24@gmail.com');
       $mail->Subject = 'New message from your website';

       // Enable HTML if needed
       $mail->isHTML(true);
       $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", nl2br($message)];
       $body = join('<br />', $bodyParagraphs);
       $mail->Body = $body;

       if($mail->send()){
           header('Location: thank_you.php'); 
       } else {
           $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
       }
   }
}
?>

<form action="" method="post" id="contact-form">
   <h2>Contact us</h2>
   <div class="form-border">
   <p>
     <label>First Name:</label>
     <input name="name" type="text"/>
   </p>
   <p>
     <label>Email Address:</label>
     <input style="cursor: pointer;" name="email" type="text" value="<?php echo $user_email; ?>"/>
   </p>
   <p>
     <label>Message:</label>
     <textarea name="message"></textarea>
   </p>
   <p>
     <input type="submit" class="btn" value="Send"/>
   </p>
   </div>
 </form>

<?php include "footer.php"; ?>
