<header class="page-header">
  <h2>Seja Bem-Vindo!<small></small></h2>
</header>
<div class="container body">
  <div class="main_container">
    <div class="col-md-12">
      <div class="col-middle">
        <div class="text-center text-center">
          <?php 
            if ($_SESSION['acesso'] == 0){

              $select = $conexao->query("SELECT sum(valor) FROM despesas");
              $select->execute();
              $somaD = $select->fetchColumn();

              $select = $conexao->query("SELECT sum(valor) FROM receitas");
              $select->execute();
              $somaR = $select->fetchColumn(); 

              $select = $conexao->query("SELECT * FROM funcionario");
              $select->execute();
              $linhas = $select->rowCount();

              $select = $conexao->query("SELECT * FROM cliente");
              $select->execute();
              $linhasC = $select->rowCount();
          ?>
          <div class="col-md-12 col-lg-12 col-xl-9">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-tertiary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-tertiary">
                          <i class="fa fa-usd"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Total em Receitas</h4>
                          <div class="info">
                            <strong class="amount">R$ <?php echo $somaR ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-secondary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                          <i class="fa fa-usd"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Total em Despesas</h4>
                          <div class="info">
                            <strong class="amount">R$ <?php echo $somaD ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-quartenary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-quartenary">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Total de Funcionários</h4>
                          <div class="info">
                            <strong class="amount"> <?php echo $linhas ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-primary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Total de Clientes</h4>
                          <div class="info">
                            <strong class="amount"> <?php echo $linhasC ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <img src="modulos/img/logo2.png" width="500" style="margin-top: 50px">
          <?php
            }else if ($_SESSION['acesso'] == 1){
          ?>
              <h1 class="error-number">Bem-Vindo Médico!</h1>
              <h1 class="error-number">Login executado com sucesso!</h1><br>
              <img src="modulos/img/logo2.png" width="500" style="margin-top: 50px">
          <?php
            }else{
              $select = $conexao->query("SELECT * FROM cliente");
              $select->execute();
              $linhasC = $select->rowCount();

              $select = $conexao->query("SELECT saldo FROM caixa_c");
              $select->execute();
              $saldo = $select->fetchColumn();
          ?>
          <div class="col-md-12 col-lg-12 col-xl-9">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-tertiary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-tertiary">
                          <i class="fa fa-usd"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Saldo do Caixa</h4>
                          <div class="info">
                            <strong class="amount">R$ <?php echo $saldo ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <div class="col-md-12 col-lg-6 col-xl-6">
                <section class="panel panel-featured-left panel-featured-primary">
                  <div class="panel-body">
                    <div class="widget-summary">
                      <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary">
                          <i class="fa fa-user"></i>
                        </div>
                      </div>
                      <div class="widget-summary-col">
                        <div class="summary">
                          <h4 class="title">Total de Clientes</h4>
                          <div class="info">
                            <strong class="amount"> <?php echo $linhasC ?></strong>
                          </div>
                        </div>
                        <div class="summary-footer">
                          <a class="text-muted text-uppercase"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
          <img src="modulos/img/logo2.png" width="500" style="margin-top: 50px">
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
          