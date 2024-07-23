<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 20px;
        }

        form {
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
            0 10px 10px rgba(0, 0, 0, 0.22);
        }

        input, button {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-sizing: border-box;
        }

        button {
            background-color: #FF4B2B;
            color: white;
            border: none;
            cursor: pointer;

        }

        a {
            display: block;
            margin: 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<small><?= lang('login.rock_watermark'); ?></small>

<div class="container">
    <form action="login" method="post">
        <h1><?= lang('login.label.sign_in'); ?></h1>
        <label for="email"><?= lang('login.label.email'); ?></label>
        <input type="email" name="email" placeholder="<?= lang('login.placeholder.email'); ?>"/>
        <label for="password"><?= lang('login.label.password'); ?></label>
        <input type="password" name="password" placeholder="<?= lang('login.placeholder.password'); ?>"/>
        <button><?= lang('login.button.sign_in'); ?></button>
    </form>

</div>

</body>
</html>