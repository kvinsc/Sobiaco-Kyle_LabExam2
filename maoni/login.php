<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($username) || empty($password)) {
        $error = "Both fields are required.";
    } else {
        $success = "Login Successful! Welcome, " . htmlspecialchars($username) . ".";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – UM CCE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f0f7e6 0%, #e8f5e9 40%, #e0f0e8 100%);
            font-family: 'Segoe UI', sans-serif;
        }

        .card {
            background: #3a9e5a;
            border-radius: 16px;
            padding: 40px 36px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            text-align: center;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #fff;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            
            border: 3px solid #d4a017;
        }

        h1 { color: #fff; font-size: 26px; margin-bottom: 6px; }
        .subtitle { color: rgba(255,255,255,0.85); font-size: 14px; margin-bottom: 28px; }

        label {
            display: block;
            text-align: left;
            color: #fff;
            font-size: 13px;
            margin-bottom: 5px;
            margin-top: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            background: #fff;
            outline: none;
            transition: box-shadow .2s;
        }
        input:focus { box-shadow: 0 0 0 3px rgba(255,255,255,0.5); }

        .forgot {
            text-align: right;
            margin-top: 6px;
        }
        .forgot a { color: rgba(255,255,255,0.8); font-size: 12px; text-decoration: none; }
        .forgot a:hover { text-decoration: underline; }

        .btn {
            margin-top: 22px;
            width: 100%;
            padding: 11px;
            background: #1a1a1a;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
            transition: background .2s;
        }
        .btn:hover { background: #333; }

        .msg-error {
            background: rgba(220,53,69,0.2);
            border: 1px solid rgba(220,53,69,0.5);
            color: #ffe0e3;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 10px;
        }
        .msg-success {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.5);
            color: #fff;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 14px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .footer-text { color: rgba(255,255,255,0.85); font-size: 13px; margin-top: 18px; }
        .footer-text a {
            display: block;
            margin-top: 8px;
            color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.15);
            padding: 8px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            transition: background .2s;
        }
        .footer-text a:hover { background: rgba(255,255,255,0.3); }
    </style>
</head>
<body>
<div class="card">
    <div class="logo"><img src="images.png" alt="UM CCE Logo" style="width:60px;height:60px;border-radius:50%;object-fit:cover;"></div>
    <h1>Welcome Back</h1>
    <p class="subtitle">Sign in to access your account</p>

    <?php if ($error): ?>
        <div class="msg-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="msg-success">✅ <?= $success ?></div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST" action="">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username"
               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password">

        <div class="forgot"><a href="#">Forgot password?</a></div>

        <button type="submit" class="btn">Login</button>
    </form>
    <?php endif; ?>

    <div class="footer-text">
        Don't have an account?
        <a href="register.php">Create Account</a>
    </div>
</div>
</body>
</html>