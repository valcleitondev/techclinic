<?php
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  $descricao=(isset($_POST['descricao'])?$_POST['descricao']:null);
  $valor=(isset($_POST['valor'])?$_POST['valor']:null);
  $vencimento=(isset($_POST['vencimento'])?$_POST['vencimento']:null);

  if($acao == "cadastro_despesa"){
    $inserir = $conexao->prepare('INSERT INTO despesas(descricao, valor, vencimento) VALUES(:descricao, :valor, :vencimento)');
    
    $inserir->bindValue(':descricao', $descricao);
    $inserir->bindValue(':valor', $valor);
    $inserir->bindValue(':vencimento', $vencimento);
    if ($inserir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa lançada com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa não foi lançada!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php 
  if ($acao == "efetuar_exclusao") {
    $excluir=$conexao->prepare("DELETE FROM despesas WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa excluída com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa não foi excluída!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php 
  if ($acao == "quitar") {
    $excluir=$conexao->prepare("DELETE FROM despesas WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa quitada com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Despesa não foi quitada!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<link href="../../Backup/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="../../Backup/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="../../Backup/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="../../Backup/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- Custom Theme Style -->
<link href="../../Backup/build/css/custom.min.css" rel="stylesheet">

<?php 
  if ($acao == "buscar") {
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Lançar Salário</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Buscar Funcionário</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=financeiro&mod=financeiro">
      <input type="hidden" name="acao" value="lancar">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Funcionário</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select required="" class="form-control" id="funcionario" name="funcionario">
            <option selected="" value="" disabled="">Selecione</option>
            <?php 
              $listar = $conexao->query("SELECT id, nome FROM funcionario");
              $listar->execute();
              while($funcionario = $listar->fetch()){ ?>
                <option value="<?php echo $funcionario['id'] ?>"><?php echo $funcionario['nome'] ?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?pg=financeiro&mod=financeiro" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao == "lancar") {
    $funcionario = isset($_POST['funcionario'])?$_POST['funcionario']:null;
    $listar_funcionario = $conexao->prepare("SELECT id, nome, salario FROM funcionario WHERE id = :id");
    $listar_funcionario->bindValue(":id", $funcionario);
    $listar_funcionario->execute();
    $funcionario = $listar_funcionario->fetch(PDO::FETCH_ASSOC);
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Lançar Salário</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Lançar Salário</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=financeiro&mod=financeiro">
      <input type="hidden" name="acao" value="cadastro_despesa">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Funcionário</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" class="form-control" value="<?php echo $funcionario['nome'] ?>" name="descricao" readonly="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Salário</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" class="form-control" value="<?php echo $funcionario['salario'] ?>" name="valor" readonly="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vencimento</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="date" id="first-name" required="" class="form-control col-md-7 col-xs-12 fa-facalendar" class="form-control" name="vencimento">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?pg=financeiro&mod=financeiro&acao=buscar" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Lançar Salário</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao == "despesas") {
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Lançar Despesa</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Lançar Despesa</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=financeiro&mod=financeiro">
      <input type="hidden" name="acao" value="cadastro_despesa">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo<span class="required"></span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" placeholder="Ex: Limpeza" required="" class="form-control col-md-7 col-xs-12" name="descricao">
        </div>
      </div>
      <div class="form-group">
        <label for="telefone" class="col-md-3 control-label">Gastos p/mês</label>
        <div class="col-md-2">
          <input id="gasto" type="number" placeholder="R$ 100" class="form-control col-md-7" name="valor" required="">
        </div>
      
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Vencimento</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="date" id="first-name" required="" class="form-control col-md-7 col-xs-12 fa-facalendar" class="form-control" name="vencimento">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?pg=financeiro&mod=financeiro" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button class="btn btn-primary" type="reset">Resetar</button>
          <button type="submit" class="btn btn-success">Lançar Despesa</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao != "lancar" and $acao != "buscar" and $acao != "despesas") {
?>
<header class="page-header">
  <h2>Financeiro<small></small></h2>
</header>
<div class="row">
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="panel-heading">
        <h3 class="panel-title">Despesas</h3>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Descrição</th>
                  <th style="text-align: center;">Valor</th>
                  <th style="text-align: center;">Vencimento</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Excluir</th>
                  <th style="text-align: center;">Quitar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $select = $conexao->prepare("SELECT * FROM despesas");
                  $select->execute();
                  include("helper-class.php");
                  $Helper = new Helper();
                  while ($dados = $select->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr>
                  <td style="text-align: center;"><?php echo $dados->id ?></td>
                  <td style="text-align: center;"><?php echo $dados->descricao ?></td>
                  <td style="text-align: center;"><?php echo $dados->valor ?></td>
                  <td style="text-align: center;"><?php echo $Helper->sqlPraBr($dados->vencimento) ?></td>
                  <td style="text-align: center;">
                    <?php 
                      date_default_timezone_set("America/Sao_Paulo");
                      $hoje = date('Y-m-d');

                      if(strtotime($hoje)>strtotime($dados->vencimento)){
                        echo "<span style='background-color: red' class='badge'>Vencida</span>";
                      }else{
                        echo "<span style='background-color: green' class='badge'>Em dia</span>";
                      }
                    ?>
                  </td>
                  <td style="text-align: center;"><a href="?mod=financeiro&pg=financeiro&acao=efetuar_exclusao&id=<?php echo $dados->id ?>" onclick="return excluir();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                  <td style="text-align: center;"><a href="?mod=financeiro&pg=financeiro&acao=quitar&id=<?php echo $dados->id ?>" onclick="return quitar();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-check"></i></button></a></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
          <a href="?pg=financeiro&mod=financeiro&acao=buscar"><button type="submit" class="btn btn-success fa fa-dollar"> Lançar Salário</button></a>
          <a href="?pg=financeiro&mod=financeiro&acao=despesas"><button type="submit" class="btn btn-success fa fa-align-right"> Lançar Despesa</button></a>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function excluir() {
     if ( confirm("Deseja mesmo excluir essa despesa?") ) {
         return true;
     }
     return false;
  }
</script>

<script type="text/javascript">
  function quitar() {
     if ( confirm("Deseja mesmo quitar essa despesa?") ) {
         return true;
     }
     return false;
  }
</script>

<?php } ?>

<script src="../../Backup/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../Backup/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../Backup/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../Backup/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../../Backup/vendors/iCheck/icheck.min.js"></script>
<!-- Custom Theme Scripts -->