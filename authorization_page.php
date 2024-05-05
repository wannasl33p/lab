<?php
header('Content-Type: text/html');
?>
<!DOCTYPE HTML>
   <html>
    <body>
      <h4><a href="index.php">Перейти к странице регистарции</a> </h4>
        <h2>Авторизация</h2>
    <form action=""method="post">
    <label for="email_a">Email</label><br>
    <input name="email_a" id="email_a" type="text">
    <br>
    <label for="pass_a">Пароль</label><br>
    <input name="pass_a" id="pass_a" type="text"><br><br>
    <button type="submit">Авторизоваться</button><br>
    </form>
    </body>
   </html>
   <?php 
function verifyPassword($password, $hashedPassword) {
   if (password_verify($password, $hashedPassword)) {
       return true;
   } else {
       return false;
   }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset( $_POST['pass_a'], $_POST['email_a'])) {
       $pass_a = $_POST['pass_a'];
       $email_a = $_POST['email_a'];
       if (empty($email_a) || empty($pass_a)) {
         echo "<br>Введены некорректные данные формы";
   }else {
      $connA = mysqli_connect("localhost", "app", "secret", "app");
            if ($connA === false) {
                die("Ошибка: " . mysqli_connect_error());
            }
                else
                {$email_ca = "SELECT * FROM users";
                  $resultA = mysqli_query($connA, $email_ca);
                  $email_ea = false;
                  while ($row = mysqli_fetch_assoc($resultA)) {
                      if ($row['email'] == $email_a && verifyPassword($pass_a,$row['password_hash'])==true) {
                        echo "<br>Здравствуйте ". $row['username'];
                        $email_ea=true;
                        $user=$row['username'];
                        $id=$row['id'];
                        break;
                      }
                     echo "<br>";
                  }
                  if ($email_ea==false) {
                     echo "<br> Неверный пароль или адресс почты";
                  }
                  else {
                    session_start();
                    $_SESSION['log_id'] =$id;
                    $_SESSION['log_name'] = $user;
                    header("Location: head.php");
                    mysqli_close($conn);
                    exit();
                                   
                  }

                }
               }
            }
         }
            
      ?>