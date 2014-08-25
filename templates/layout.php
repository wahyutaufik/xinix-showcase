<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo f('page.title', 'Xinix Showcase') ?></title>

    <link type="image/x-icon" href="<?php echo URL::base('vendor/img/favicon.ico') ?>" rel="Shortcut icon" />
    <link rel="stylesheet" href="<?php echo Theme::base('vendor/css/naked.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Theme::base('vendor/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo Theme::base('vendor/css/style.css') ?>">
    <script src="<?php echo Theme::base('vendor/jquery/jquery.js') ?>"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="row">
                <div class="span-2">
                    <a class="back-button" href="<?php echo URL::base() ?>"></a>
                </div>
                <div class="span-8">
                    <h6 class="label title"><?php echo f('page.header', 'Xinix Showcase') ?></h6>
                    <p><?php echo f('page.subheader', 'Submit Your Own Here') ?></p>
                </div>
                <div class="span-2">
                    <a href="<?php echo URL::site('/menu') ?>" class="icon-menu"></a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php echo f('notification.show') ?>
        <div class="container">
            <?php echo $body ?>
        </div>
    </main>
    <!-- <footer>
        <div id="footer">
            <div class="container">
                <p class="">Copyright © 2014
                    <a href="http://www.xinix.co.id" target="blank" class="">Xinix Technology</a>. All rights reserved.
                </p>
            </div>
        </div>

    </footer> -->
    
    <script src="<?php echo Theme::base('vendor/js/main.js') ?>"></script>
</body>
</html>
