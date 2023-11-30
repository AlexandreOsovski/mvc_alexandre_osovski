<?php include(__DIR__ . '/../includes/head.php'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(__DIR__ . '/../includes/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(__DIR__ . '/../includes/navbar_cliente.php') ?>
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-titulo">Usuarios</h1>
                        <a href="/usuarios/cadastrar" class="btn btn-primary"><i class="fa fa-plus"></i> Cadastrar</a>
                    </div>
                    <div class="row">

                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <table class="table text-center table-striped-columns">
                                        <thead>
                                            <tr>
                                                <th scope="col">#ID</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">UF</th>
                                                <th scope="col">Tipo do usuario</th>
                                                <th scope="col">Ação</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <tr>
                                                    <th scope="row">
                                                        <?php echo $usuario['id']; ?>
                                                    </th>
                                                    <td>
                                                        <?php echo $usuario['nome']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $usuario['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $usuario['uf']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $usuario['tipo_usuario']; ?>
                                                    </td>
                                                    <td class="d-flex align-items-center justify-content-center">
                                                        <a class="btn btn-primary" href="/usuarios/ver?id=<?php echo $usuario['id']; ?>">
                                                            Ver
                                                        </a>
                                                        <form  id="form-remover">
                                                            <input type="hidden" name="remover" value="<?php echo $usuario['id']; ?>">
                                                        </form>
                                                        <a class="btn btn-danger ml-2" id="btn-remover">
                                                            Excluir
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include(__DIR__ . '/../includes/scriptsJs.php'); ?>
</body>

<script>
    $(function () {
        $('#btn-remover').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/usuarios/remover",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: new FormData(document.getElementById('form-remover')),
                beforeSend: function () {

                },
                complete: function () {

                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        Swal.fire(response.title, response.message, response.status);
                        setTimeout(() => {
                            window.location.href = '/usuarios';
                        }, 1500);
                    } else {
                        Swal.fire(response.title, response.message, response.status);
                    }
                }
            });
        });
    });
</script>
