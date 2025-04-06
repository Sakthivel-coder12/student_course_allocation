<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cactus+Classical+Serif&display=swap');

        body {
            font-family: 'Cactus Classical Serif', serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(45deg, #aa99e3, #8a58a3, #c795d1, #420450, #bc34da);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            color: #212162;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 350px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            position: relative;
            border: 5px solid transparent;
            animation: borderAnimation 3s linear infinite;
        }

        @keyframes borderAnimation {
            0% {
                border-image: linear-gradient(0deg, red, transparent) 1;
            }
            25% {
                border-image: linear-gradient(90deg, rgb(123, 2, 252), transparent) 1;
            }
            50% {
                border-image: linear-gradient(180deg, rgb(2, 108, 230), transparent) 1;
            }
            75% {
                border-image: linear-gradient(270deg, rgb(233, 3, 164), transparent) 1;
            }
            100% {
                border-image: linear-gradient(360deg, red, transparent) 1;
            }
        }

        input {
            width: calc(100% - 40px);
            padding: 10px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-left: 40px;
        }
        input:focus {
            border-color: #762887;
            outline: none;
        }
        .input-container {
            position: relative;
        }
        .input-container i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #762887;
            color: #efecf0;
            font-size: 20px;
            border: none;
            border-radius: 5px;
            transition: transform 0.3s;
        }
        button:hover {
            cursor: pointer;
            transform: scale(1.05);
        }
        .switch {
            margin-top: 50px;
            cursor: pointer;
            color: #bc34da;
            padding: 8px;
            border-radius: 10px;
            display: inline-block;
        }
        .hidden {
            display: none;
        }
        h2 {
            color: #070508;
        }
    </style>
</head>
<body >
    <div class="container" id="form-container">
        <h2 id="form-title">Login</h2>
        <form action="login.php" name = "login-form" method="post">
            <div id="login-fields">
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" id="login-username" placeholder="Username" name="login_username" required>
                </div>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="login-password" placeholder="Password" name="login_password" required>
                </div>
                <button type="submit">Submit</button>
                <br><br>
                <button type="reset">Reset</button>
            </div>
        </form>
        
        <br><br>
        <b class="switch" onclick="toggleForm()">Don't have an account? Sign up</b>
    </div>

    <script>
        function toggleForm() 
        {
            window.location.href = "signup_form.html";
        }

        function go_to_home() {
            const username = document.getElementById("login-username").value.trim();
            const password = document.getElementById("login-password").value.trim();

            if (username === "" || password === "") {
                alert("Please fill in both username and password.");
                event.preventDefault();
                return;
            }
            document.getElementById("login-form").submit();
        }
        function sub()
        {
            alert("Signup successful! Redirecting to login page...");
            document.getElementById("auth-form").submit();
        }
    </script>
</body> 
</html>