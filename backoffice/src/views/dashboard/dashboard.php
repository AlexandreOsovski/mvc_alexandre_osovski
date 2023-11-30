<?php include(__DIR__ . '/../../public/includes/head.php'); ?>


<body class="g-sidenav-show   bg-gray-100">

  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php include(__DIR__ . '/../../public/includes/sidebar.php') ?>

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <?php include(__DIR__ . '/../../public/includes/navbar.php') ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Quantidade de funcionários</p>
                        <h5 class="font-weight-bolder">

                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+5</span>
                          Desde o mês passado
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="fa fa-user-circle text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Faturamento mensal total</p>
                        <h5 class="font-weight-bolder">

                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+55%</span>
                          Desde o mês passado
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
                        <i class="fa fa-money text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Despesa mensal total</p>
                        <h5 class="font-weight-bolder">

                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+55%</span>
                          Desde o mês passado
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="fa fa-money text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Lucro mensal total</p>
                        <h5 class="font-weight-bolder">

                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+55%</span>
                          Desde o mês passado
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="fa fa-money text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
              <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                  <h6 class="text-capitalize">Sales overview</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                  </p>
                </div>
                <div class="card-body p-3">
                  <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="600"
                      style="display: block; box-sizing: border-box; height: 300px; width: 572.8px;"
                      width="1145"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  

  <?php include(__DIR__ . '/../../public/includes/configuracaovisual.php'); ?>
  <?php include(__DIR__ . '/../../public/includes/footer.php'); ?>
  <?php include(__DIR__ . '/../../public/includes/scriptsJS.php'); ?>

</body>

</html>