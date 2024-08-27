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
    $con = conexionDb();
    $consulta = 'select * from calificaciones;';
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
                                if ($con['status']) {
                                    $r = runQuery($consulta, $con['con']);
                                    if ($r['status']) {  ?>

                                        <table class="table is-bordered is-fullwidth  is-striped  is-hoverable ">
                                            <thead>
                                                <tr>
                                                    <?php
                                                    foreach ($r['headers'] as $head) { ?>
                                                        <th class="is-capitalized"><?php echo $head; ?></th>
                                                    <?php }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($r['message'] as $row) { ?>
                                                    <tr>
                                                        <?php
                                                        foreach ($r['rows'] as $val) { ?>
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