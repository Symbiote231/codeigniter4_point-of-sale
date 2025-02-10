<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Point of Sale project using CodeIgniter v4.6.0 and PHP v8.3 and MySQL 8.0.37" />
    <meta name="author" content="RicardoGG_Symbiote231" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $title ?? 'My Application'; ?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="principalContainer" class="container-fluid text-center text-wrap text-break flex-grow-1 d-flex align-items-center justify-content-center">
        <?= $this->renderSection('content'); ?>
    </div>

    <footer class="mt-auto">
        <div id="footerContainer" class="container-fluid text-center text-wrap text-break">
            <h6 class="lh-base">
                All rights reserved @2025
                </br>
                Mr. Ricardo Guerra Grajales P.Eng
            </h6>
        </div>
    </footer>
</body>

</html>