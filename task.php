<?php

// Data submitted
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $photo = $_FILES['photo'];

    // Check if data folder exists
    if (!file_exists('data')) {
      mkdir('data', 0777, true);
    }

    // Check if file exists
    if (!file_exists('data/phonebook.csv')) {
      $file = fopen('data/phonebook.csv', 'w');
      $photoName = str_replace(' ', '+', $name);
      fputcsv($file, [$name, $phone, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
    }else{
      $file = fopen('data/phonebook.csv', 'a');
      $photoName = str_replace(' ', '+', $name);
      fputcsv($file, [$name, $phone, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
    }
  }

  // Read data
  $file = fopen('data/phonebook.csv', 'r');
  $phonebook = [];
  while (($line = fgetcsv($file)) !== FALSE) {
    $phonebook[] = $line;
  }
?>


<h1>
    Login
</h1>
<form action="process_form.php" method="post">
    <label for="email">Email:</label><br>
    <input type="text" name="name"><br>

    <label for="password">Password:</label><br>
    <input type="password" name="email"><br>

    <input type='file' name='photo'/><br>

    <input type="submit" value="Submit">
  </form>
