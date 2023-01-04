<?php
	if (isset($_POST['name'])) {
		$name = $_POST['name']; 
		
		if ($name == '') { 
			unset($name);
		} 
	} 
	
    if (isset($_POST['email'])) {
    	$email = $_POST['email'];
     
    	if ($email == '') { 
    		unset($email);
    	} 
    }

	
	if (isset($_POST['login'])) {
		$login = $_POST['login']; 
		
		if ($login == '') { 
			unset($login);
		} 
	} 
	
    if (isset($_POST['password'])) {
    	$password = $_POST['password'];
     
    	if ($password == '') { 
    		unset($password);
    	} 
    }
    
	if (empty($name) or empty($email) or empty($login) or empty($password)) {
    	exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
 	$password = stripslashes($password);
    $password = htmlspecialchars($password);
    
 	$email = trim($email);
    $login = trim($login);
    $password = trim($password);
    
    include ("db.php");
    
    $result = mysql_query("SELECT ID FROM Users WHERE Login='$login'", $db);
    $myrow = mysql_fetch_array($result);
    
    if (!empty($myrow['id'])) {
    	exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $result2 = mysql_query ("INSERT INTO Users (Name, Email, Login, Password) VALUES('$name', '$email','$login','$password')");
    
    if ($result2 == 'TRUE') {
    	echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='http:\\index.html'>Главная страница</a>";
    }
 	else {
    	echo "Ошибка! Вы не зарегистрированы.";
    }	
?>