<?php

// Data submitted
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if data folder exists
    if (!file_exists('data')) {
      mkdir('data', 0777, true);
    }
     // Check if photo folder exists
    if (!file_exists('photo')) {
        mkdir('photo', 0777, true);
    }

    $image = $_FILES['photo'];
    
    //Stores the filename as it was on the client computer.
    $imagename = $_FILES['photo']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['photo']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['photo']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['photo']['tmp_name'];

    $photos = 'photo/' . str_replace(' ', '_', $imagename);
    //The path you wish to upload the image to
    $imagePath = "images/";

    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $photos)) {
            // echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }

    // Check if file exists
    if (!file_exists('data/phonebook.csv')) {
        $file = fopen('data/phonebook.csv', 'w');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password, $photos]);
      }else{
        $file = fopen('data/phonebook.csv', 'a');
        $photoName = str_replace(' ', '+', $name);
        fputcsv($file, [$name, $email, $password, $photos]);
      }

    
}

// Read data
$file = fopen('data/phonebook.csv', 'r');
$phonebook = [];
while (($line = fgetcsv($file)) !== FALSE) {
  $phonebook[] = $line;
}

?>

<div style=" display: flex; justify-content: center;">

    <div style="background-color: #e9e9e9; width: 270px; height: 350px; padding-left: 50px; border-radius: 20px; margin-top: 20px;">
        <h1 style= "font-weight: bold; text-align: center;">
            Login
        </h1>
        <form action="#" method="post" enctype='multipart/form-data'>
            <div style="margin-bottom: 10px">
                <label>
                    Name: <br>
                    <input type="text" name="name" placeholder="jahangir"style="margin-top: 10px;"><br>
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Email: <br>
                    <input type="text" name="email" placeholder="jahangir@gmail.com" style="margin-top: 10px;">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <label>
                    Password:<br>
                    <input type="password" name="password" placeholder="password"style="margin-top: 10px;">
                </label>
            </div>
            <div style="margin-bottom: 10px">
                <input type='file' name='photo' tmp_name="man"/>
            </div>
            <input type="submit" name= "submit" value="Submit">
        </form>
    </div>

    <ul style='list-style: none;'>
    <?php foreach ($phonebook as $contact): ?>
      <li style='display: flex; align-items: center; margin-bottom: 10px; border: 1px solid gray; padding: 10px; box-shadow: 0 0 5px 0 gray;'>
        <img src='<?php echo $contact[3]; ?>' width='50px' height='50px' style='border-radius: 50%; margin-right: 10px;' />
        <?php echo $contact[0]; ?> - <?php echo $contact[1]; ?>
      </li>
    <?php endforeach; ?>
</div>
