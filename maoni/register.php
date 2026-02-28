<?php
$errors = [];
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname  = trim($_POST["fullname"]  ?? "");
    $email     = trim($_POST["email"]     ?? "");
    $username  = trim($_POST["username"]  ?? "");
    $password  = $_POST["password"]       ?? "";
    $confirm   = $_POST["confirm"]        ?? "";

    if (empty($fullname))  $errors[] = "Full name is required.";
    if (empty($email))     $errors[] = "Email address is required.";
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Enter a valid email address.";
    if (empty($username))  $errors[] = "Username is required.";
    if (empty($password))  $errors[] = "Password is required.";
    elseif (strlen($password) < 8) $errors[] = "Password must be at least 8 characters.";
    if ($password !== $confirm) $errors[] = "Passwords do not match.";

    if (empty($errors)) {
        $success = "Registration Successful! Welcome, " . htmlspecialchars($fullname) . ". You can now log in.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account – UM CCE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f0f7e6 0%, #e8f5e9 40%, #e0f0e8 100%);
            font-family: 'Segoe UI', sans-serif;
            padding: 24px 0;
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
        .subtitle { color: rgba(255,255,255,0.85); font-size: 14px; margin-bottom: 24px; }

        label {
            display: block;
            text-align: left;
            color: #fff;
            font-size: 13px;
            margin-bottom: 5px;
            margin-top: 14px;
        }

        input[type="text"],
        input[type="email"],
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

        .errors {
            background: rgba(220,53,69,0.2);
            border: 1px solid rgba(220,53,69,0.5);
            color: #ffe0e3;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 13px;
            text-align: left;
            margin-bottom: 10px;
        }
        .errors ul { padding-left: 18px; }
        .errors li { margin-bottom: 3px; }

        .msg-success {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.5);
            color: #fff;
            padding: 12px 14px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
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
    <h1>Create Account</h1>
    <p class="subtitle">Join the UM CCE community today</p>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="msg-success">✅ <?= $success ?></div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST" action="">
        <label for="fullname">Fullname</label>
        <input type="text" id="fullname" name="fullname" placeholder="Enter fullname"
               value="<?= htmlspecialchars($_POST['fullname'] ?? '') ?>">

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter email"
               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Choose a username"
               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Min 8 characters">

        <label for="confirm">Confirm Password</label>
        <input type="password" id="confirm" name="confirm" placeholder="Re-enter password">

        <button type="submit" class="btn">Register</button>
    </form>
    <?php endif; ?>

    <div class="footer-text">
        Already have an account?
        <a href="login.php">Back to Login</a>
    </div>
</div>
</body>
</html>