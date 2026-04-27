<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>

<style>
:root {
  --bg-dark: #0f0f1a;
  --card-dark: #1c1c2e;

  --rose: #ff4da6;
  --rose-light: #ffb3d9;

  --violet: #8a2be2;
  --white: #ffffff;
}

body {
  background: var(--bg-dark);
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.container {
  background: var(--card-dark);
  padding: 30px;
  border-radius: 15px;
  width: 300px;
  box-shadow: 0 0 20px rgba(138, 43, 226, 0.3);
}

h2 {
  color: var(--rose);
  text-align: center;
  margin-bottom: 20px;
}

label {
  color: var(--rose-light);
  font-size: 14px;
}

input {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  border: none;
  border-radius: 8px;
  background: #2a2a40;
  color: var(--white);
}

input:focus {
  outline: none;
  border: 1px solid var(--violet);
  box-shadow: 0 0 5px var(--violet);
}

button {
  width: 100%;
  padding: 10px;
  background: linear-gradient(45deg, var(--rose), var(--violet));
  border: none;
  border-radius: 8px;
  color: var(--white);
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  opacity: 0.85;
  transform: scale(1.03);
}
</style>

</head>
<body>

<div class="container">
  <h2>Inscription</h2>

  <form>
    <label>Nom d'utilisateur</label>
    <input type="text" required>

    <label>Email</label>
    <input type="email" required>

    <label>Mot de passe</label>
    <input type="password" required>

    <button type="submit">S'inscrire</button>
  </form>
</div>

</body>
</html>