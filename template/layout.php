<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php if (isset($data['title'])) echo $data['title']; ?> - Plugo</title>
        <?php if (isset($data['description'])) { ?>
        <meta name="description" content="<?= $data['description'] ?>">
        <?php } ?>
        <link rel="stylesheet" href="css/app.css">
        <!--<link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">-->
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.40.1/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include '_navbar.php' ?>
        <main class="container mx-auto">
            <?php if(!empty($_SESSION['FLASH'])) { ?>
                <?php foreach($_SESSION['FLASH'] as $flashMessage) { ?>
                    <div class="alert-<?= $flashMessage['type'] ?>"><?= $flashMessage['message'] ?></div>
                <?php } ?>
            <?php } ?>
            <?php require $templatePath ?>
        </main>
        <?php include '_footer.php' ?>
    </body>
</html>