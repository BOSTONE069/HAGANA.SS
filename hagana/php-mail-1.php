<html>
    <head>
          <script src="sweetalert2.js"></script>
          <script src="sweetalert2.all.js"></script>
    </head>
</html>
<?php

//Open a new connection to the MySQL server

$mysqli = new mysqli('', '', '', '');

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
//require set.in();
$errors = [];
$errorMessage = '';


if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
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


    if (empty($errors)) {
        $toEmail = 'bostoneochieng69@gmail.com';
        $emailSubject = 'New email from your contant form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        
if ($result->num_rows != 1) {
        echo '<script>
    Swal.fire({
        title: "Failed!",
        icon: "warning",
        text: "Incorrect Email/Password",
        timer: 3000,
        showConfirmButton: false,
      })
      </script>';;
    } else {
        // Authenticated, set session variables
        echo "<script>
    Swal.fire({
      title: 'Success',
      text: 'successfully submitted your order',
      icon: 'success',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
  }).then((result) => {
      if (result.value) {
          Swal.fire(
              'Success!',
              'We have successfully receive your order.',
              'success',
              'timer: 1500',
              window.location.href = 'Location: ../index.html'
          )
      }
  })
      </script>";;


        $user = $result->fetch_array();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        // update status to online
sleep(2);

        //redirect_to("dashboard.php");
        // do stuffs
    }
}

if (isset($_GET['msg'])) {
    echo "<p style='color:red;'>" . $_GET['msg'] . "</p>";
}

}
?>
