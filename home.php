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

    <link rel="stylesheet" href="css/style.css">

    <title> Home </title>
</head>
<body>

    <div class="nav">
        <div class="logo">
            <p> <a href="home.php"> Logo </a></p>
        </div>

        <div class="right-links">

            <?php 

                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE id=$id");

                while($result = mysqli_fetch_assoc($query)) {
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Idade = $result['idade'];
                    $res_id = $result['id'];
                }

                echo " <a href='edit.php?Id=$res_id'> Editar Perfil </a>";

            ?>

            <a href="php/logout.php"> <button class="btn"> Sair </button> </a>
        </div>
    </div>

    <main>

        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p> Olá <b> <?php echo $res_Uname ?> </b>, Seja Bem-Vindo </p>
                </div>
                <div class="box">
                    <p> Este é seu endereço de E-mail <b> <?php echo $res_Email ?> </b> </p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p> Sua idade é de <b> <?php echo $res_Idade; ?> anos </b> </p>
                </div>
            </div>
        </div>    
    </main>
    
</body>
</html>