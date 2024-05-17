
<link rel="stylesheet" href="../../../webroot/css/style.css">





<form method="POST" action="/update">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Se connecter</button>
</form>

<form action="/deleteUser" method="post">
    <button type="submit" class="btn">Delete Account</button>
</form>


<form action="/read" method="post">
    <button type="submit" class="btn">Voir mes informations</button>
</form>


<form action="/readAll" method="post">
    <button type="submit" class="btn">Voir touts les utilisateurs</button>
</form>

