//Validate username/ password before submitting
<?php
  $user = strip_tags(trim($_REQUEST['username']));
  if(strlen($user) <= 0) {
    echo json_encode(array('code' => -1,
    'result' => 'Invalid username, please try again.' ));
    die;
  }
  // Query database to check if the username is available
  $query = "Select * from  where username = '$user' ";
  // Execute the above query using your own script and if it return you the // result (row) we should return negative, else a success message.
  $available = true;
  if($available) {
    echo json_encode(array('code' => 1,
    'result' => "Success,username $user is still available" ));
    die;
  } else {
    echo json_encode(array('code' => 0,
    'result' => "Sorry but username $user is already taken." ));
    die;
  } 
  die;
?>
