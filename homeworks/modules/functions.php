<!DOCTYPE html>
<html lang="en" data-theme="light">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Bienvenida</title>


    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .my-flex {
            display: flex;


        }

        .card-number {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>



</head>

<body>


    <?php
    include("operations.php");
    $name = 'Deve';


    operation(4, 20, 'SuMa');



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
                                        <h1 class="title is-1" id="val_1"></h1>
                                    </div>

                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="sing"></h1>
                                    </div>

                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="val_2"></h1>
                                    </div>

                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1">=</h1>
                                    </div>

                                    <div class="cell box card-number has-background-white">
                                        <h1 class="title is-1" id="res"></h1>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <a href="../functions/operations.php?param1=valor1&param2=valor2">Enviar parámetros a PHP</a>

                    <div class="card-content has-text-left">

                        <form action="../functions/operations.php" method="GET">


                            <div class="fixed-grid has-3-cols">
                                <div class="grid">
                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Primer valor</label>
                                            <div class="control">
                                                <input class="input is-large" type="number" placeholder="4" id="valor_1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Segundo valor</label>
                                            <div class="control">
                                                <input class="input is-large" type="number" placeholder="2" id="valor_2">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cell">
                                        <div class="field">
                                            <label class="label">Operacion</label>
                                            <div class="select is-large">
                                                <select>
                                                    <option selected>Seleccionar</option>
                                                    <option>Suma</option>
                                                    <option>Resta</option>
                                                    <option>Multiplicacion</option>
                                                    <option>Division</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <button type="submit">Enviar</button>


                            </div>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>