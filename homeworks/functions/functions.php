<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        <?php include("style.css"); ?>
    </style>
</head>

<body>

    <?php
    include("operations.php");

    $val_1 = isset($_POST['val_1']) ? (float)$_POST['val_1'] : 1;
    $val_2 = isset($_POST['val_2']) ? (float)$_POST['val_2'] : 1;
    $operation = isset($_POST['operation']) ? $_POST['operation'] : '+';
    $res = operation($val_1, $val_2, $operation);

    ?>
    <section class="hero is-fullheight">
        <div class="hero-body has-text-centered">
            <div class="container">
                <div class="card">
                    <div class="card-image">
                        <div class="has-background-grey-light box">
                            <div class="fixed-grid has-5-cols">
                                <div class="grid">
                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="val_1">
                                            <?php echo $res['val_1']; ?></p>
                                        </h1>
                                    </div>
                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="sing">
                                            <?php echo $res['symbol']; ?></p>
                                        </h1>
                                    </div>
                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="val_2">
                                            <?php echo $res['val_2']; ?></p>
                                        </h1>
                                    </div>
                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1">=</h1>
                                    </div>
                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title <?php echo $res['error'] == 0 ? 'is-1' : 'is-3 has-text-danger'; ?>" id="res">
                                            <?php echo $res['result']; ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content has-text-left">
                        <form method="POST" action="">

                            <div class="fixed-grid has-3-cols">
                                <div class="grid">
                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Primer valor</label>
                                            <div class="control">
                                                <input class="input is-large" type="number" placeholder="4" name="val_1" step="any" value="<?php echo htmlspecialchars($val_1); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Segundo valor</label>
                                            <div class="control">
                                                <input class="input is-large" type="number" placeholder="2" name="val_2" step="any" value="<?php echo htmlspecialchars($val_2); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Operacion</label>
                                            <div class="select is-large my-width-full">
                                                <select name="operation" class="my-width-full">
                                                    <option selected>Seleccionar</option>
                                                    <option value="+" <?php echo $operation == '+' ? 'selected' : ''; ?>>Suma</option>
                                                    <option value="-" <?php echo $operation == '-' ? 'selected' : ''; ?>>Resta</option>
                                                    <option value="*" <?php echo $operation == '*' ? 'selected' : ''; ?>>Multiplicación</option>
                                                    <option value="/" <?php echo $operation == '/' ? 'selected' : ''; ?>>División</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell is-row-start-3 is-col-start-2">
                                        <button class="button is-dark is-large is-responsive my-width-full" type="submit">Enviar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>