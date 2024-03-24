<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Editar Perfil </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="nav">
        <div class="logo">
            <p> <a href="home.php"> Logo </a></p>
        </div>

        <div class="right-links">
            <a href="#"> Editar Perfil </a>
            <a href="php/logout.php"> <button class="btn"> Sair </button> </a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php 

                if(isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $idade = $_POST['idade'];

                    $id = $_SESSION['id'];

                    $edit_query = mysqli_query($con, "UPDATE users SET Username='$username', Email='$email', idade='$idade' WHERE id=$id ") or die("Error... Tente Novamente");

                    if($edit_query) {
                        echo "<div class='message'>
                                <p>Editado com sucesso!</p>
                            </div> <br>";
                        echo " <a href='home.php'><button class='btn'> Home </button>";
                    }
                } else {

                   $id = $_SESSION['id'];     
                   $query = mysqli_query($con, "SELECT * FROM users WHERE id=$id ");

                   while($result = mysqli_fetch_assoc($query)) {
                       $res_Uname = $result['Username'];
                       $res_Email = $result['Email'];
                       $res_Idade = $result['idade'];
                   }

            ?>
            <header>  Editar Perfil </header>
            <form action="" method="post">
                
                <div class="field input">
                    <label for="username"> Nome </label>
                    <input type="text" name="username" id="username" value=" <?php echo $res_Uname; ?> " autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email"> Email </label>
                    <input type="email" name="email" id="email" value=" <?php echo $res_Email; ?> " autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="idade"> Idade </label>
                    <input type="number" name="idade" id="idade" value=" <?php echo $res_Idade; ?> " autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    
</body>
</html>