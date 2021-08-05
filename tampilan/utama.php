<?php 
include_once 'bahasa/'.$bahasa.'.php';
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $bhs['nama']; ?></title>
    <!-- Favicon -->
    <?php $icon=Aset::icon(); foreach ($icon as $href => $rel): ?>
    <link href="<?=$href?>" rel="<?=$rel?>">
    <?php endforeach; ?>
    <!-- End Favicon -->
    <!-- CSS -->
    <?php $css=Aset::css(); foreach ($css as $href => $rel): ?>
    <link href="<?=$href?>" rel="<?=$rel?>">
    <?php endforeach; ?>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            /* padding-top: 40px; */
            padding-bottom: 40px;
            background-color: black;
        }

        main {
            width: 100%;
            /* max-width: 330px; */
            padding: 15px;
            margin: auto;
        }
    </style>
    <!-- End CSS -->
</head>

<body>
    <main class="text-center text-light">
        <img class="mb-4" src="lib/img/logo-512x512.png" alt="raven logo" width="120">
        <p><?= $bhs['nama']; ?></p>
        <h1><?= $bhs['slogan']; ?></h1>
        <p><?= $bhs['dibuat']; ?> <span class="text-danger">&hearts;</span> <?= $bhs['oleh']; ?></p>
        <div class="d-grid gap-2 col-6 mx-auto">
            <a href=" id" class="btn btn-outline-light"><?= $bhs['bhs_id']; ?></a>
            <a href=" en" class="btn btn-outline-light"><?= $bhs['bhs_en']; ?></a>
        </div>
    </main>
    <!-- JS -->
    <?php $js=Aset::js(); foreach ($js as $script): ?>
    <script src="<?=$script;?>"></script>
    <?php endforeach; ?>
    <!-- End JS -->
</body>

</html>