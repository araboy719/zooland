<?php
/*===========План=============
1. Сделать форму регистрации - done
2. Сделать отправку формы - done
3. Сделать отправку письма со ссылкой на подтверждение регистрации - done
4. Сделать страницу с подтверждением регистрации - done
*/

// Страничка регистрации всех пользователей
// Подключаем БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// Подключаем header
include 'parts/header.php';


// проверка был ли запрос POST
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" && $_POST['username'] !="" && $_POST['phone'] !="" && $_POST['email'] !="" && $_POST['pass'] !=""){
	// Выбираем нашего пользователя по почте
	$sql = "SELECT * FROM users WHERE email LIKE '" . $_POST['email'] . "'";
	$user_id = 0;
	$result = $conn->query($sql);
	// Проверка есть ли пользователь
	if($result->num_rows > 0) { //Если есть, то
		$user = mysqli_fetch_assoc($result); // получаем результат
		$user_id = $user['id']; // записываем id кот. нашли
		// Регистрация
		$password = md5($_POST['pass']);
		//вызываем ф-цию и передаем 20 символов
		$u_code = generateRandomString(20);
		// обновляем данные
		$sql = "UPDATE users SET login = '" . $_POST['username'] . "', phone =  '" . $_POST['phone'] . "', password = '" . $password . "', confirm_mail = '$u_code' WHERE id= '" . $user_id . "'";
		// если данные обновились в БД, то отправляем письмо подтверждение
		if($conn->query($sql)) {
			echo "Пользователь зарегистрирован, перейдите по ссылке на почте";

			$link = "<a href='http://zooland.local/register.php?u_code=$u_code'>Confirm</a>";
			mail($_POST['email'], 'Register', $link);		
			header("Location: /login.php");// если данные добавились, то перенаправляем на Авторизацию
		}  
	}  else { // если не найден, то добавляем данные в БД	
		// Регистрация
		$password = md5($_POST['pass']);
		//вызываем ф-цию и передаем 20 символов
		$u_code = generateRandomString(20);		
		
		$sql = "INSERT INTO users (login, phone, email, password, confirm_mail) VALUES ('" . $_POST['username'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'] . "', '" . $password . "', '$u_code')";
		// если данные добавились в БД, то отправляем письмо подтверждение
		if($conn->query($sql)) {
			echo "Пользователь зарегистрирован, перейдите по ссылке на почте";

			$link = "<a href='http://zooland.local/register.php?u_code=$u_code'>Confirm</a>";
			mail($_POST['email'], 'Register', $link);
			// получаем новый id
			$user_id = $conn->insert_id;
			header("Location: /login.php");// если данные добавились, то перенаправляем на Авторизацию
		} else {
			echo "Error!";
		}
	}	
}
// проверяем есть ли ссылка на подтверждение
if(isset($_GET['u_code'])) {
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		// находим нашего пользователя
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET `verifided` = '1' WHERE `users`.`id` =" . $user['id'];

		//выполняем запрос
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
			header("Location: /login.php");// если данные добавились, то перенаправляем на Авторизацию
		}
	}
}
// Ф-ция создания случайной строки
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>


<!-- Форма регистрации пользователя -->
<div id="templatemo_services" class="section1">
    <div class="container">

		<div class="row">
		    <div class="card-header-register col-md-12">
				<form method="POST">
				    <div class="card-header col-md-12">
				        <h1 class="card-title ">РЕГИСТРАЦИЯ</h1>
				    </div>
				    <p> Введите ваши данные</p>
					<div class="form-group">
					    <h3 > Ваше Имя </h3>
					    <input name="username" type="text" class="form-control" placeholder="Имя">
					</div>
					<div class="form-group">
					    <h3 > Ваш номер телефона </h3>
					    <input name="phone" type="phone" class="form-control" placeholder="Номер телефона">
					</div>			
					<div class="form-group">
					    <h3 > Ваш Email </h3>
					    <input name="email" type="text" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
					    <h3 > Ваш Пароль </h3>
					    <input name="pass" type="password" class="form-control" placeholder="Пароль">
					</div>
					<button name="submit" value="1" type="submit" class="btn btn-primary btn-lg btn-block">Регистрация</button>
				</form>
		    </div>
		</div>

	</div>
</div>


<?php
// Подключаем footer
include 'parts/footer.php';
?>