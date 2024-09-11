<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php

    include __DIR__ . '/../config/data-source.php';
    include __DIR__ . '/../controllers/book.controller.php';
    include __DIR__ . '/../models/book.model.php';

    $db = Database::getInstance()->getConnection();
    $bookController = new BookController($db);

    // Obtener todos los libros
    $allBooks = $bookController->getAllBooks();

    ?>
    <section class="hero is-fullheight">
        <div class="hero-body has-text-left">
            <div class="container">
                <div class="card">
                    <div class="card-content has-text-centered">

                    </div>
                    <div class="card-image">
                        <div class="has-background-grey-light box">
                            <div class="table-container">

                                <table class="table is-bordered is-fullwidth  is-striped  is-hoverable ">
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($allBooks['headers'] as $head) { // se recoren los headers a mostrar
                                            ?>
                                                <th class="is-capitalized"><?php echo $head; ?></th>
                                            <?php }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($allBooks['message'] as $row) { //lisatdo de valores que retorna la consulta  
                                        ?>
                                            <tr>
                                                <?php
                                                foreach ($allBooks['rows'] as $val) { // se recoren el key de cada valor 
                                                ?>
                                                    <td><?php echo $row[$val]; ?></td>
                                                <?php }
                                                ?>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>