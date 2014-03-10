// insert data to mySQL database

<?php
// creates the new record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable function renderForm($first, $last, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php }
  // connect to the database include('connect-db.php');
  // check if the form has been submitted. If it has, start to process the form and save it to the database
  // get form data, making sure it is valid
  $storigname = mysql_real_escape_string(htmlspecialchars($_POST[''])); $strCIP = mysql_real_escape_string(htmlspecialchars($_POST['']));
  $cipname=substr($strCIP,12); $strCIP=substr($strCIP,0,7);
  $cip = mysql_real_escape_string(htmlspecialchars($_POST[''])); $bach = mysql_real_escape_string(htmlspecialchars($_POST['']));
  // check to make sure both fields are entered if ($storigname == '' || $strCIP == '')
  {
    // generate error message
    $error = 'ERROR: Please fill in all required fields!';
    // if either field is blank, display the form again renderForm($storigname, $strCIP, $error);
    }
  else
  {
  // save the data to the database
    mysql_query(INSERT STATEMENT) or die(mysql_error());
    // once saved, redirect back to the view page header("Location: success.php");
  }
?>
