<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Se Connecter</title>
	<link rel="stylesheet" href="../css/login.css">
</head>
<body>
  <!-- la classe qui contient tout -->
	<div class="content">
        <!-- Partie pour se connecter -->
		<div class="top">
            <!-- Logo de l'entreprise, ici Titanic -->
			<div class="logo">
				<img src="../image/logo.jpg" alt="titanic">
			</div>
			<form action="" method="post">
            <!-- Formulaire de l'utilisateur -->
			<div class="form">
				<div class="input-F-usr">
					<input type="text" placeholder="Téléphone, l'email, ou Nom L'utilisation" class="input usrname" name="user" required>
				</div>
				<div class="input-F-usr">
					<input type="password" placeholder="Mot de passe" class="input" name="password" required>
				</div>
				<!-- PHP pour vérifier les informations de connexion -->
				<?php
                            if (isset($_POST['submit'])) {
                                include "connect.php";
                                extract($_POST);
                                $query = "SELECT * FROM client WHERE (username = '$user' OR telephone='$user' OR email='$user' OR cin='$user') AND password = '$password'";
                                $result = mysqli_query($con, $query) or die("Erreur de requête");
                                if (mysqli_num_rows($result) == 0) {
                                    echo "<p class='pEreur'>Identifiant ou mot de passe sont incorrect</p>";
                                } else {
									
                                    header("Location: Acce.php");
                                }
                            }
                            ?>

              <!-- Bouton pour se connecter -->
				<div class="btn">
                    <input type="submit" name="submit" class="se_coneter" value="Se Connecter">
                </div>
				</form>
                
			</div>
			
            <!-- Si l'utilisateur oublie le mot de passe -->
			<div class="forgot-pas">
				<a href="#">Mot de passe oublié?</a>
			</div>
		</div>
         <!-- Partie pour s'inscrire -->
		<div class="signup">
			<p>Je n'ai pas de compte? <a href="sign-up.php">S'inscrire</a></p>
		</div>
	</div>
</body>
</html>