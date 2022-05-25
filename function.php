<?php
$conn = mysqli_connect('localhost', 'root', '', 'data');

if($_POST['action'] == 'insert'){
    insert()
}

function insert(){
    global $conn;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $languages = $_POST['languages'];

    //check value

    if(empty($name) || empty($email) || empty($age) || empty($country) || empty($gender)) {
        echo '';
        exit;
    }

    //check email

    $sameEmail = mysqli_query($conn, "SELECT * FROM tb_data WHERE email = '$email'");

    if(mysqli_num_rows($sameEmail) > 0) {
        echo 2;
        exit;
    }

    //Validate languages

    $languagesArray = explode(',', $languages);
    $countLanguages = count($languagesArray);
    if($countLanguages <=1 ){
        echo 3;
        exit;
    }

    //insert value to database
    $query = "INSERT INTO tb_data VALUES('', '$name', '$email', '$age', '$country', '$gender', '$languages')";
    mysqli_query($conn, $query);

    echo 1;
}