<?php

    require_once('inc/bdd.php');
    
    debug($_POST, 0);

    if($_POST)
    {
        // On vérifie que les valeurs de $_POST soit bien remplis
        if(!empty($_POST['password']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && isset($_POST['check']))
        {
            //Verification du mot de passe
            if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['password']) || strlen($_POST['password']) >= 8 || strlen($_POST['password']) <= 12)
            {
                $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT));
                // Je fais une requête pour récupérer les pseudo en BDD et vérifier que le pseudo n'éxiste pas. On peut faire pareil pour les emails
                $reqPseudo = $bdd->prepare("SELECT pseudo FROM membre WHERE pseudo = :pseudo");
                $reqPseudo->bindValue('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
                $reqPseudo->execute();
                
                // Verification du pseudo
                if(preg_match('#^[a-zA-Z0-9]{4,12}$#', $_POST['pseudo']) && $reqPseudo->rowCount() == 0)
                {
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    // Verification du mail
                    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
                    {
                        $email = htmlspecialchars($_POST['email']);
                        // Je prépare ma requête d'insertion en BDD
                        $reqInsertionMembre = $bdd->prepare("INSERT INTO membre (pseudo, `password`, email, date_inscription) VALUES ( :pseudo, :password, :email, NOW() )");
                        $reqInsertionMembre->bindValue('pseudo', $pseudo);
                        $reqInsertionMembre->bindValue('password', $password);
                        $reqInsertionMembre->bindValue('email', $email);
                        $reqInsertionMembre->execute();
                        $msg = "Bravo vous etes bien inscrit";
                        // header('location:connexion.php')
                    }
                    else
                    {
                        $msg = "Mail non valide";
                    }
                }
                else{
                    $msg = "Pseudo non conform ou déjà pris";
                }
            }
            else
            {
                $msg = "Merci de choisir un mot de passe valide";
            }
        }
        else
        {
            $msg = "Veuillez remplir tout les champs";
        }
    }
    
    require_once('inc/header.php');
?>
        
        <div class="container">
            <div class="msgAlert">
                <?= $msg ?>
            </div>
            <form action="inscription.php" method="post" class="form-group">
                <div class="form-group">
                    <label for="pseudo">Pseudonyme</label>
                    <input type="text" class="form-control" name="pseudo" id="pseudo">
                </div>
                <div class="form-group">
                    <label for="email">Adresse mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelp">
                    <small id="passwordHelp" class="form-text text-muted">Votre mot de passe doit comporter entre 8 et 12 caractère, au moins une majuscule, une minuscule, un chiffre et un caractère spécial.</small>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="check" name="check">
                    <label class="form-check-label" for="check">Je ne suis pas un robot</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

<?php require_once('inc/footer.php') ?>
