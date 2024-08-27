<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion DB</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include("conexion.php");
    $con = conexionDb(); // se realizar la connecion a la DB
    $consulta = 'select * from calificaciones;'; // query a ejecutar
    ?>
    <section class="hero is-fullheight">
        <div class="hero-body has-text-left">
            <div class="container">
                <div class="card">
                    <div class="card-content has-text-centered">
                        <div>
                            <code class="title is-3 has-text-link	"><?php echo $consulta; ?></code>
                        </div>
                    </div>
                    <div class="card-image">
                        <div class="has-background-grey-light box">
                            <div class="table-container">

                                <?php
                                if ($con['status']) { // estado de connecion
                                    $r = runQuery($consulta, $con['con']);
                                    if ($r['status']) {  // estado del query 
                                ?>
                                        <table class="table is-bordered is-fullwidth  is-striped  is-hoverable ">
                                            <thead>
                                                <tr>
                                                    <?php
                                                    foreach ($r['headers'] as $head) { // se recoren los headers a mostrar
                                                    ?>
                                                        <th class="is-capitalized"><?php echo $head; ?></th>
                                                    <?php }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($r['message'] as $row) { //lisatdo de valores que retorna la consulta  
                                                ?>
                                                    <tr>
                                                        <?php
                                                        foreach ($r['rows'] as $val) { // se recoren el key de cada valor 
                                                        ?>
                                                            <td><?php echo $row[$val]; ?></td>
                                                        <?php }
                                                        ?>
                                                    </tr>
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    } else { ?>
                                        <p><?php echo $r['message']; ?></p>
                                    <?php }
                                } else { ?>
                                    <p><?php echo $con['message']; ?></p>
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</body>

</html>