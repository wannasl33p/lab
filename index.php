
<!DOCTYPE HTML>
   <html>
    <body>
    <h4><a href="authorization_page.php">Перейти к странице авторизации</a> </h4>
        <h2>Регистрация</h2>
    <form action=""method="post">
    <label for="name">Имя:</label><br>
    <input name="name" id="name" type="text">
    <br>
    <label for="email">Email</label><br>
    <input name="email" id="email" type="text">
    <br>
    <label for="pass">Пароль</label><br>
    <input name="pass" id="pass" type="text"><br><br>
    <button type="submit">Зарегистрироваться</button><br>
    </body>
   </html>
   <?php
function hashPassword($password) {
   $options = [
       'cost' => 12, 
   ];
   $salt = password_hash('random_salt', PASSWORD_DEFAULT, $options);
   $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
   return $hashedPassword;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'], $_POST['pass'], $_POST['email'])) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        if (empty($name) || empty($email) || empty($pass)) {
            echo "<br>Введены некорректные данные формы";
        } else {
            $conn = mysqli_connect("localhost", "app", "secret", "app");
            if ($conn === false) {
                die("Ошибка: " . mysqli_connect_error());
            } else {
                $email_c = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($conn, $email_c);
                $email_e = false;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['email'] == $email) {
                        $email_e = true;
                        break;
                    }
                }
                if ($email_e == true) {
                    echo "Пользователь с такой почтой уже существует";
                } else {
                    $password_hash = hashPassword($pass);
                    $sql = "INSERT INTO users (username, email, password_hash) VALUES ('$name','$email','$password_hash')";
                    if (mysqli_query($conn, $sql)) {
                        echo "Пользователь успешно зарегистрирован.";
                    } else {
                        echo "Ошибка " . mysqli_error($conn);
                    }
                }
                mysqli_close($conn);
            }
        }
    } else {
        echo "<br>Введены некорректные данные формы";
    }
}
?>
