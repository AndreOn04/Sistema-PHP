<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro </title>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
    <div class="container">
        <div class="box form-box">

            <?php 
            
                include("php/config.php");
                if(isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $idade = $_POST['idade'];
                    $password = $_POST['password'];

                    $verify_query = mysqli_query($con, "SELECT email FROM users WHERE Email='$email' ");

                    if(mysqli_num_rows($verify_query) !=0 ) {
                        echo "<div class='message'> 
                                  <p> Este E-mail já está cadastrado, Tente outro, Por Favor ! </p>
                              </div> <br>";
                        echo " <a href='javascript:self.history.back()'><button class='btn'> Voltar </button>";
                    }
                    else {
                        mysqli_query($con, "INSERT INTO users(username, Email, Idade, Password) VALUES ('$username', '$email', '$idade', '$password')") or die(" Error... Buscando Dados ");
                        
                        echo "<div class='message'>
                                <p>Cadastrado com sucesso!</p>
                            </div> <br>";
                        echo " <a href='index.php'><button class='btn'> Login </button>";
                    }
                } else {

            ?>

            <header> Cadastro </header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username"> Nome </label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email"> E-mail </label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="Idade"> Idade </label>
                    <input type="number" name="idade" id="idade" autocomplete="off" required>
                </div>
                
                <div class="field input">
                    <label for="password"> Senha </label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Já Possuí uma conta | Faça Login ? <a href="index.php"> Login </a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>

</body>
</html>