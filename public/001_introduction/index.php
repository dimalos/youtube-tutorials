<?php

if (isLoginFormSubmitted()) {
    $email = getSubmittedEmail();
    $password = getSubmittedPassword();

    if (isUserValid($email, $password)) {
        goToSuccessPage();
    } else {
        goToFailPage();
    }
}

//<editor-fold desc="useful functions">
function isLoginFormSubmitted()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isUserValid($email, $password)
{
    $ourWebsiteUsers = [
        [
            'email' => 'dimalos.vl@gmail.com',
            'password' => '123456',
        ],
        [
            'email' => 'john.doe@gmail.com',
            'password' => 'qwerty',
        ],
    ];

    foreach ($ourWebsiteUsers as $ourWebsiteUser) {
        if ($ourWebsiteUser['email'] === $email && $ourWebsiteUser['password'] === $password) {
            return true;
        }
    }

    return false;
}

function getSubmittedEmail() {
    return $_POST['email'];
}

function getSubmittedPassword() {
    return $_POST['email'];
}

function goToSuccessPage()
{
    header('Location: /success.php');
    exit;
}

function goToFailPage()
{
    header('Location: /fail.php');
    exit;
}
//</editor-fold>
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login</title>

    <style>
        form {
            display: flex;
            gap: 10px;
            flex-direction: column;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh">
    <div style="max-width: 600px; ">

        <form action="" method="post">
            <div>
                <label>
                    Email:
                    <input type="email" name="email">
                </label>
            </div>
            <div>
                <label>
                    Password:
                    <input type="password" name="password">
                </label>
            </div>

            <div>
                <input type="submit" value="Log in">
            </div>
        </form>

    </div>
</div>
</body>
</html>