<?php
$menuItems = include APPPATH . 'Config/Menu.php';
$assets = config('Pages');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>

    <?php foreach ($assets->globalCSS as $css): ?>
        <link rel="stylesheet" href="<?= $css ?>">
    <?php endforeach; ?>

    <?php
    foreach ($assets->globalJS as $js) {
        echo "<script src=\"$js\"></script>";
    }

    $page = 'home';
    if (isset($assets->specific[$page])) {
        foreach ($assets->specific[$page]['css'] as $css) {
            echo "<link rel=\"stylesheet\" href=\"$css\">";
        }
        foreach ($assets->specific[$page]['js'] as $js) {
            echo "<script src=\"$js\"></script>";
        }
    }
    ?>

    <style>
        html {
            display: flex;
            flex-direction: row;
            background-color: #F5F8FA;
        }

        .sidebar {
            position: fixed;
            left: 50px;
            top: 50px;
            bottom: 50px;
            z-index: 100;
            overflow: hidden;
            border-radius: 2rem;
            background-color: #F2F3F5;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: start;
            align-items: start;
            flex-direction: column;
            padding: 20px;
            transition: 0.5s;
        }

        .sidebar-logo {
            margin-right: auto;
            margin-left: auto;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #EFF2F5;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-bottom: 20px;
            img {
                width: 100px;
                height: 100px;
            }

            span {
                color: #333;
                text-align: center;
                font-size: 1.5rem;
                font-weight: 700;
                line-height: 125%;
                letter-spacing: -0.061rem;
            }

        }

        .sidebar ul {
            list-style: none;
            padding: 5px;
        }

        .sidebar ul li a {
            display: flex;
            align-items: center;
            padding: 10px;
            gap: 20px;
            text-decoration: none;
            color: gray;
            transition: 0.3s;

            svg {
                opacity: 0.5;
            }

            &:hover {
                background-color: #E5E7EB;
                border-radius: 10px;
            }

        }
        .sidebar ul li a i {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="sidebar">

        <div class="sidebar-logo">
            <img src="<?= base_url('assets/images/sidebar_logo.png') ?>" alt="My Image">
            <span>Rock CodeIgniter</span>
        </div>
        <ul>
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <a href="<?= $item['url']; ?>">
                        <?= $item['svg']; ?>
                        <?= $item['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>


    </div>
