<?php
$host='localhost';
$db = 'biofefqs_maindata';
$username = 'u1';
$password = "+iiWrgX_]TCv";

$dsn= "mysql:host=$host;dbname=$db";

$conn = new PDO($dsn, $username, $password);
if($conn){
    echo "✅ Connected to the <strong>$db</strong> database successfully!<br>";
} else {
    echo "Error";
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`userdata` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `admin` INT(10) DEFAULT '0', 
        `board` INT(10) DEFAULT '0',
        `practitioner` INT(10) DEFAULT '0',
        `member` INT(10) DEFAULT '0',
        `username` VARCHAR(255),
        `name` VARCHAR(255),
        `surname` VARCHAR(255),
        `email` VARCHAR(255),
        `bemail` VARCHAR(255),
        `password` VARCHAR(255),
        `website` VARCHAR(255),
        `province` VARCHAR(255),
        `location` VARCHAR(255),
        `title` varchar(255),
        `certified` INT(10), 
        `image` TEXT(1000),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ USERDATA Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`articles` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `title` VARCHAR(255),
        `author` VARCHAR(30),
        `body` TEXT(4294967295),
        `permission` INT(10),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ EVENTS Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`events` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `title` VARCHAR(255),
        `author` VARCHAR(30),
        `description` VARCHAR(255),
        `location` VARCHAR(255),
        `body` TEXT(4294967295),
        `permission` INT(4),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ EVENTS Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`publications` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `title` VARCHAR(255),
        `author` VARCHAR(30),
        `body` TEXT(4294967295),
        `link` VARCHAR(255),
        `permission` INT(4),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ PUBLICATIONS Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`faqs` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `question` VARCHAR(255),
        `answer` VARCHAR(255),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ FAQ'S Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}





try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`main` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `title` VARCHAR(255),
        `author` VARCHAR(30),
        `content` VARCHAR(255),
        `post` TEXT(5000),
        `img` TEXT(10000),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ MAIN Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`achievements` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `title` VARCHAR(255),
        `author` VARCHAR(30),
        `description` TEXT(5000),
        `date` VARCHAR(255),
        `price` VARCHAR(255),
        `location` VARCHAR(255),
        `img` TEXT(10000),
        `cr_date` TIMESTAMP
        )"); 
    $stmt->execute();
    echo "✅ EVENTS Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


try {
    $stmt = $conn->prepare("CREATE TABLE `biofefqs_maindata`.`site` (
        `id` INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        `num1` VARCHAR(255),
        `num2` VARCHAR(255),
        `username` VARCHAR(255),
        `password` VARCHAR(255),
        `email` VARCHAR(255),
        `location` VARCHAR(255)
        )"); 
    $stmt->execute();
    echo "✅ SITE Database Created<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

try {
    $stmt = $conn->prepare("INSERT INTO `biofefqs_maindata`.`userdata` (`id`, `name`, `password`, `admin`) VALUES (`0`, 'tred', '123', '1')" ); 
    $stmt->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>

