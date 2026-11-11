<?php
session_start();

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['role'] = 'admin';
        header("Location: admin.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("img/background.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(5px);
            z-index: -1;
            transform: scale(1.1);
        }

        body { 
            background: #333; 
            color: white; 
            font-family: sans-serif; 
            text-align: center; 
            padding-top: 20vh; 
        }

        .card { 
            background: #8a7474; 
            padding: 40px; 
            border-radius: 15px; 
            display: inline-block; 
            width: 350px; /* Lebar form disesuaikan */
        }

        h3 {
            margin-bottom: 25px;
            letter-spacing: 1px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input {
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            outline: none;
        }

        button {
            margin-top: 10px;
            padding: 15px 30px;
            background: #643333; 
            color: white; 
            border: none;
            border-radius: 8px; 
            font-size: 1.2em; 
            cursor: pointer;
            transition: 0.3s; 
        }

        button:hover { 
            background: #4a2525; 
            transform: scale(1.05); 
        }

        .error {
            color: #ffcccc;
            margin-bottom: 15px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <div class="card">
        <h3>MASUK AKUN</h3>
        
        <?php if(isset($error)) { echo "<div class='error'>$error</div>"; } ?>

        <form action="login.php" method="POST">
            <input type="text" placeholder="username" name="username" required />
            <input type="password" placeholder="password" name="password" required />
            <button type="submit" name="login">masuk sekarang</button>
        </form>
    </div>

</body>
</html>