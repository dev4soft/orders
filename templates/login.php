<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, target-densitydpi=fevice-dpi, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <form action="/auth" method="post">
        логин:<br />
        <select name="login" class="inp" value="" required />
        <option value="123">123</option>
        <?php
            foreach ($list_users as $user) {
                echo '<option value="' . $user['login'] . '">' . $user['login'] . '</option>';
            }
        ?>
        </select><br>
        пароль:<br />
        <input name="password" type="password" class="inp" required /><br />
        <input value="войти" type="submit" class="btn"/>
    </form>
</body>
</html>
