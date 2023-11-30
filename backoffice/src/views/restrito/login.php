<?php include(__DIR__ . '/../../public/includes/head.php'); ?>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Entrar</h4>
                  <p class="mb-0">Digite seu e-mail e senha para entrar na plataforma</p>
                </div>
                <div class="card-body">
                  <form role="form" id="form-login">
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email">
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control form-control-lg" placeholder="Senha"
                        aria-label="Senha" name="senha">
                    </div>
                    <div class="text-center">
                      <button type="button" id="btn-entrar" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
                <div class="col-lg-12 mb-lg-0 mb-4">
                  <div class="copyright text-center text-sm text-muted">
                    © <script>
                      const year = new Date().getFullYear();
                      document.write(year);
                    </script>
                    Feito por <i class="fa fa-code" aria-hidden="true"></i>
                    <a href="https://github.com/AlexandreOsovski" class="font-weight-bold" target="_blank">Alexandre Osovski</a>
                    <i class="fa fa-code" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div
                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg'); background-size: cover;">
                <span class="mask bg-gradient-primary opacity-6"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                <p class="text-white position-relative">The more effortless the writing looks, the more effort the
                  writer actually put into the process.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
  
  <?php include(__DIR__ . '/../../public/includes/scriptsJS.php'); ?>
</body>
<script>
    $(function () {
        $('#btn-entrar').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/restrito/login",
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                data: new FormData(document.getElementById('form-login')),
                beforeSend: function () {

                },
                complete: function () {

                },
                success: function (response) {
                    console.log(response);
                    if (response.status == 'success') {
                        Swal.fire(response.title, response.message, response.status);
                        setTimeout(() => {
                            window.location.href = '/dashboard';
                        }, 1500);
                    } else {
                        Swal.fire(response.title, response.message, response.status);
                    }
                }
            });
        });
    });
</script>
</html>