
<!DOCTYPE HTML>
   <html>
    <body>
    <h2><?php
            session_start();
            $id = $_SESSION['log_id'];
            $name = $_SESSION['log_name'];
            echo "Здравствуйте " . $name . ", ваш id: " . $id;
        ?>
</h2>
      <h4><a href="authorization_page.php">Выйти
        <?php
        session_destroy();
         ?>
      </a> </h4>   
    </body>
   </html>
   <?php 
