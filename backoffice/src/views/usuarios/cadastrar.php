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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-titulo">Cadastrar</h1>
                        <a href="/usuarios" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Voltar</a>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow h-100">
                                <div class="card-body">
                                    <form id="form-cadastrar">
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <img width="200" height="200"
                                                    src="/backoffice/src/public/img/perfil-do-usuario-frontal.png"
                                                    id="imgavatar" class="mb-3 rounded-circle"
                                                    style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;" />
                                                <input type="file" name="avatar" id="avatar" class="form-control d-none"
                                                    accept=".jpg, .png, .jpeg">
                                                <script>
                                                    $('#imgavatar').click(function () {
                                                        $('#avatar').trigger('click');
                                                    });
                                                    $('#avatar').change(function () {
                                                        var file = this.files[0];
                                                        var img = new Image();
                                                        var objectURL = URL.createObjectURL(file);
                                                        $('#imgavatar').attr('src', objectURL);
                                                    });
                                                </script>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Nome do usuário*</label>
                                                    <input type="text" class="form-control required" name="nome"
                                                        id="nome" aria-describedby="Nome do usuário"
                                                        placeholder="Nome do usuário">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">E-mail*</label>
                                                    <input type="email" class="form-control required" name="email"
                                                        id="nome" aria-describedby="E-mail" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Senha*</label>
                                                    <input type="password" class="form-control required" name="senha"
                                                        id="nome" aria-describedby="Senha" placeholder="Senha">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">CPF*</label>
                                                    <input type="tel" class="form-control required" name="cpf" id="cpf"
                                                        aria-describedby="CPF" placeholder="000.000.000-00">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Telefone / Celular*</label>
                                                    <input type="tel" class="form-control required" name="tel" id="tel"
                                                        aria-describedby="Telefone" placeholder="(xx) x xxxx-xxxx">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Idade*</label>
                                                    <input type="text" class="form-control required" name="idade"
                                                        id="idade" aria-describedby="Idade"
                                                        placeholder="Digite a idade do usuario">
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">UF*</label>
                                                    <input type="text" class="form-control required" maxlength="2"
                                                        name="uf" id="uf" aria-describedby="UF residencia"
                                                        placeholder="UF da residência">
                                                </div>
                                            </div>



                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Tipo do usuario*</label>
                                                    <div class="form-floating">
                                                        <select name="tipo_usuario" class="form-select form-control"
                                                            id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected>Selecione o tipo do usuario</option>
                                                            <option value="cliente">Cliente</option>
                                                            <option value="admin">Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-4">
                                                <div class="form-group">
                                                    <label for="nome">Endereço*</label>
                                                    <input type="text" class="form-control required" name="endereco"
                                                        id="endereco" aria-describedby="Endereço do usuario"
                                                        placeholder="Digite o endereço completo">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-xl-2 offset-xl-10">
                                                <button type="button" class="btn btn-primary m-0 btn-block"
                                                    id="btn-salvar">
                                                    Salvar
                                                    <i class="fas fa-check fa-sm text-white-50"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
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
        $('#btn-salvar').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/usuarios/salvar",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: new FormData(document.getElementById('form-cadastrar')),
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