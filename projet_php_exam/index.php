<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion / Inscription</title>
    <link rel="stylesheet" href="style_index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="Connexion"> 
        <form action="connexion_database.php" method="GET" class="form">
            <h1>Bienvenue dans Memo_Box !</h1>
            <div class="input-box">
                <input type="text" name="nom_utilisateur" placeholder="username" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="mot_de_passe" placeholder="password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label for=""><input type="checkbox" name="remember"> Se souvenir de moi !</label>
                <a href="#">Mot de passe oublié ?</a>
            </div>
            
            <button type="submit" class="btn">Se connecter</button> 
            <div class="Inscription">
                <a href="inscription.php">S'inscrire !</a>
                
            </div>
        </form>
    </div> 
</body>
</html>
