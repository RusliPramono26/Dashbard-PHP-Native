<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Form Login</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="proses_login.php" method="POST" id="loginForm" novalidate>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required />
            </div>

            <div class="form-group">
                <input type="submit" value="Login" class="btn" />
            </div>

            <p class="error-message" id="errorMsg"></p>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
