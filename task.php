<?php

// Data submitted
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_FILES['photo'];

    // Check if data folder exists
    if (!file_exists('data')) {
      mkdir('data', 0777, true);
    }

    // Check if file exists
    if (!file_exists('data/phonebook.csv')) {
        $file = fopen('data/phonebook.csv', 'w');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
      }else{
        $file = fopen('data/phonebook.csv', 'a');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
      }
    
  }

  // Check if photo folder exists 
  if (!file_exists('photo')) {
    mkdir('photo', 0777, true);
}

// Check if file exists 
if (!file_exists('photo/photo.csv')) {
    $photos = fopen('photo/photo.csv', 'w');  
    $photoName = str_replace(' ', '+', $name);
    fputcsv($photos, [$photo, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
}else{
    $photos = fopen('photo/photo.csv', 'a');
    $photoName = str_replace(' ', '+', $name);
    fputcsv($photos, [$photo, 'https://ui-avatars.com/api/?name='.$photoName.'?size=128']);
}


  // Read data
  $file = fopen('data/phonebook.csv', 'r');
  $phonebook = [];
  while (($line = fgetcsv($file)) !== FALSE) {
    $phonebook[] = $line;
  }



?>

<div style="justify-content: center;">

    <div style="background-color: #e9e9e9; width: 300px; height: 400px; margin: auto; margin-top: 30px; padding: 20px; border-radius: 20px;">
        <h1 style= "font-weight: bold; text-align: center;">
            Login
        </h1>
        <form action="#" method="post" enctype='multipart/form-data' style="float: right;">
            <div style="margin-bottom: 10px">
                <label>
                    Name: <br>
                    <input type="text" name="name" placeholder="jahangir"><br>
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Email: <br>
                    <input type="text" name="email" placeholder="jahangir@gmail.com">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Password:<br>
                    <input type="password" name="password" placeholder="password">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <input type='file' name='photo'/>
            </div>
            <input type="submit" name= "submit" value="Submit">
        </form>
    </div>

</div>
