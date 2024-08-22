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
    $consulta = 'select * from libro;';
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
                                include("conexion.php");
                                $con = conexionDb();
                                if ($con['status']) {
                                    $r = runQuery($consulta, $con['con']);
                                    if ($r['status']) {  ?>

                                        <table class="table is-bordered is-fullwidth  is-striped  is-hoverable ">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Titulo</th>
                                                    <th>Autor</th>
                                                    <th>Editorial</th>
                                                    <th>Año</th>
                                                    <th>Temas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($r['message'] as $row) { ?>
                                                    <tr>
                                                        <td><?php echo $row['libro_id']; ?></td>
                                                        <td><?php echo $row['titulo']; ?></td>
                                                        <td><?php echo $row['autor']; ?></td>
                                                        <td><?php echo $row['editorial']; ?></td>
                                                        <td><?php echo $row['anio']; ?></td>
                                                        <td><?php echo $row['temas']; ?></td>
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