<?php
/*===========План=============
1. Сделать форму авторизации - done
2. Сделать отправку формы - done
3. Сделать проверку на наличие почты у клиента
*/

// Страничка авторизации пользователей
// Подключаем БД
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
// Подключаем header
include 'parts/header.php';

// проверяем есть ли ссылка на подтверждение
if(isset($_GET['u_code'])) {
	// выбираем из БД поля, где код в GET запросе совпадает с кодом из БД
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";
	$result = $conn->query($sql);
	// если есть совпадение, то меняем с 0 на 1
	if($result->num_rows > 0) {
		// находим нашего пользователя
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE `users` SET `verifided` = '1', confirm_mail = '' WHERE `users`.`id` =" . $user['id'];

		//выполняем запрос
		if($conn->query($sql)) {
			echo "Пользователь верифицирован!";
			header("Location: /login.php");
		}
	}
}

// проверка был ли запрос POST
// проверка, что поля (почта и пароль) не пустые
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"
    && $_POST['email'] !="" && $_POST['pass'] !="") {

	// Выбираем нашего пользователя по почте
	$sql = "SELECT * FROM users WHERE email LIKE '" . $_POST['email'] . "'";
	$result = $conn->query($sql);
	$user = mysqli_fetch_assoc($result);

	// Проверка есть ли пользователь
	if($result->num_rows > 0) { 
		// если клиент верифицирован
		if($user['verifided'] == 1) {
			// создаем куки для хранения данных пользователя
			setcookie("login", $user['id'], time() + 60*60*60, '/');
			// перенаправить на главную страницу
			header("Location: /index.php");
		}  else { // если пользователь не верифицирован перенаправляем на верификацию
			// header("Location: /verification.php");
			// echo "Подтвердите свою почту";
		   }
	} 
}


?>


<!-- Форма авторизации пользователя -->
<div id="templatemo_services" class="section1">
    <div class="container">

		<div class="row">
		    <div class="card-header-register col-md-12">
				<form method="POST">
				    <div class="card-header col-md-12">
				        <h1 class="card-title ">АВТОРИЗАЦИЯ</h1>
				    </div>
				    <p> Введите ваши данные</p>
					<div class="form-group">
					    <h3 > Ваш Email </h3>
					    <input name="email" type="text" class="form-control" placeholder="Email">
					</div>
					<div class="form-group">
					    <h3 > Ваш Пароль </h3>
					    <input name="pass" type="password" class="form-control" placeholder="Пароль">
					</div>
					<button name="submit" value="1" type="submit" class="btn btn-primary btn-lg btn-block">Авторизация</button>
				</form>
		    </div>
		</div>

	</div>
</div>


<?php
// Подключаем footer
include 'parts/footer.php';
?>
