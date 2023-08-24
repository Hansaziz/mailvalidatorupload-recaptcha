<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <h1>Login</h1>
    <form action="authenticate.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <div class="g-recaptcha" data-sitekey="6LeQEc4nAAAAADYJrcWtwcPb_E86DdEkn6FZ5nQI"></div>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
