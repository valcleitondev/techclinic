<?php 
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  $cliente=isset($_REQUEST['cliente'])?$_REQUEST['cliente']:null;
  $descricao=(isset($_POST['descricao'])?$_POST['descricao']:null);
  $valor=(isset($_POST['valor'])?$_POST['valor']:null);
  $vencimento=(isset($_POST['vencimento'])?$_POST['vencimento']:null);

  if($acao == "lancar_receita"){
    $inserir = $conexao->prepare('INSERT INTO receitas(cliente, descricao, valor, vencimento) VALUES(:cliente, :descricao, :valor, :vencimento)');
    
    $inserir->bindValue(':cliente', $cliente);
    $inserir->bindValue(':descricao', $descricao);
    $inserir->bindValue(':valor', $valor);
    $inserir->bindValue(':vencimento', $vencimento);
    if ($inserir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Pagamento efetuado com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Pagamento não foi efetuado!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php 
  if ($acao == "efetuar_exclusao") {
    $excluir=$conexao->prepare("DELETE FROM receitas WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Receita excluída com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Receita não foi excluída!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php 
  if ($acao == "receber") {
    $excluir=$conexao->prepare("DELETE FROM receitas WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Receita recebida com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Receita não foi recebida!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php 
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  $saldo=(isset($_POST['saldo'])?$_POST['saldo']:null);

  if($acao == "reforcar_c"){
    $selecionar = $conexao->prepare("SELECT saldo FROM caixa_c WHERE id = :id");
    $selecionar->bindValue(":id", 1);
    $selecionar->execute();
    $dados = $selecionar->fetch(PDO::FETCH_ASSOC);
    $novo_saldo = $dados['saldo']+$saldo;
    $editar = $conexao->prepare("UPDATE caixa_c SET saldo = :saldo WHERE id = :id");
    $editar->bindValue(':id',1);
    $editar->bindValue(':saldo', $novo_saldo);
    $editar->execute();
    //header('location: teste/?pg=caixa&mod=caixa&acao=saldo');
  }
?>

<?php 
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  $saldo=(isset($_POST['saldo'])?$_POST['saldo']:null);

  if($acao == "retirar_c"){
    $selecionar = $conexao->prepare("SELECT saldo FROM caixa_c WHERE id = :id");
    $selecionar->bindValue(":id", 1);
    $selecionar->execute();
    $dados = $selecionar->fetch(PDO::FETCH_ASSOC);
    $novo_saldo = $dados['saldo']-$saldo;
    $editar = $conexao->prepare("UPDATE caixa_c SET saldo = :saldo WHERE id = :id");
    $editar->bindValue(':id',1);
    $editar->bindValue(':saldo', $novo_saldo);
    $editar->execute();
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
  if ($acao == "pg_consulta") {
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Pagamento/Consulta</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Buscar Cliente</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="lancar_c">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select required="" class="form-control" id="cliente" name="id_cliente">
            <option selected="" value="" disabled="">Selecione</option>
            <?php 
              $listar = $conexao->query("SELECT id, nome FROM cliente");
              $listar->execute();
              while($cliente = $listar->fetch()){ ?>
                <option value="<?php echo $cliente['id'] ?>"><?php echo $cliente['nome'] ?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?pg=caixa&mod=caixa" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao == "lancar_c") {
    $id_cliente = isset($_POST['id_cliente'])?$_POST['id_cliente']:null;
    $cliente = isset($_POST['cliente'])?$_POST['cliente']:null;
    $listar_cliente = $conexao->prepare("SELECT id, nome FROM cliente WHERE id = :id");
    $listar_cliente->bindValue(":id", $id_cliente);
    $listar_cliente->execute();
    $cliente = $listar_cliente->fetch(PDO::FETCH_ASSOC);

    $listar_consulta = $conexao->query("SELECT id, tipo, preco FROM consulta");
    $listar_consulta->bindValue(':id', $id_cliente);
    $listar_consulta->execute();
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Pagamento/Consulta</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Efetuar Pagamento</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="lancar_receita">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" class="form-control" value="<?php echo $cliente['nome'] ?>" name="cliente" readonly="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Consulta</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" required="" name="descricao" onchange="precoConsulta(this.id)" id="'+input+'">
            <option value="" disabled="" selected="">Selecione a consulta</option>
            <?php 
              while($consulta = $listar_consulta->fetch()){
                echo "<option value=".$consulta['tipo'].">".$consulta['tipo']."</option>";
              } 
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="number" placeholder="Preço unitário" required="" class="form-control" name="valor" step="0.01" id="preco'+input+'">
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
          <a href="?pg=caixa&mod=caixa&acao=pg_consulta" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Efetuar Pagamento</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao == "pg_exame") {
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Pagamento/Exame</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Buscar Cliente</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="lancar_e">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select required="" class="form-control" id="cliente" name="id_cliente">
            <option selected="" value="" disabled="">Selecione</option>
            <?php 
              $listar = $conexao->query("SELECT id, nome FROM cliente");
              $listar->execute();
              while($cliente = $listar->fetch()){ ?>
                <option value="<?php echo $cliente['id'] ?>"><?php echo $cliente['nome'] ?></option>
            <?php
              }
            ?>
          </select>
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?pg=caixa&mod=caixa" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Buscar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php 
  if ($acao == "lancar_e") {
    $id_cliente = isset($_POST['id_cliente'])?$_POST['id_cliente']:null;
    $cliente = isset($_POST['cliente'])?$_POST['cliente']:null;
    $listar_cliente = $conexao->prepare("SELECT id, nome FROM cliente WHERE id = :id");
    $listar_cliente->bindValue(":id", $id_cliente);
    $listar_cliente->execute();
    $cliente = $listar_cliente->fetch(PDO::FETCH_ASSOC);

    $listar_exame = $conexao->query("SELECT id, tipo, preco FROM exame");
    $listar_exame->execute();
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Pagamento/Exame</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Efetuar Pagamento</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="lancar_receita">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="text" class="form-control" value="<?php echo $cliente['nome'] ?>" name="cliente" readonly="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Exame</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <select class="form-control" required="" name="descricao" onchange="precoConsulta(this.id)" id="'+input+'">
            <option value="" disabled="" selected="">Selecione o exame</option>
            <?php 
              while($exame = $listar_exame->fetch()){
                echo "<option value=".$exame['tipo'].">".$exame['tipo']."</option>";
              } 
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
          <input type="number" placeholder="Preço unitário" required="" class="form-control" name="valor" step="0.01" id="preco'+input+'">
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
          <a href="?pg=caixa&mod=caixa&acao=pg_exame" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button type="submit" class="btn btn-success">Efetuar Pagamento</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php
  if ($acao == "reforcar") {
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Caixa</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Reforçar caixa</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="reforcar_c">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reforçar c/</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
         <input type="number" id="first-name" required="" class="form-control" name="saldo">
        </div>
      </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success">Reforçar Caixa</button>
        </div>
    </form>
  </div>
</div>
<?php
  }
?>

<?php
  if ($acao == "retirar") {
?>
<header class="page-header">
  <h2>Caixa</h2>
</header>
<div class="panel-body">
  <div class="panel-heading">
    <h3 class="panel-title">Retirar do caixa</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=caixa&mod=caixa">
      <input type="hidden" name="acao" value="retirar_c">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Retirar</label>
        <div class="col-md-3 col-sm-3 col-xs-12">
         <input type="number" id="first-name" required="" class="form-control" name="saldo">
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">Retirar do Caixa</button>
      </div>
    </form>
  </div>
</div>
<?php
  }
?>

<?php 
  if ($acao != "pg_exame" and $acao != "pg_consulta" and $acao != "lancar_c" and $acao != "lancar_e" and $acao != "reforcar" and $acao != "retirar" and $acao != "saldo" and $acao != "caixa_abrir"){
?>
<header class="page-header">
  <h2>Financeiro<small></small></h2>
</header>
<div class="row">
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="panel-heading">
        <h3 class="panel-title">Receitas</h3>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Cliente</th>
                  <th style="text-align: center;">Descrição</th>
                  <th style="text-align: center;">Valor</th>
                  <th style="text-align: center;">Vencimento</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Excluir</th>
                  <th style="text-align: center;">Receber</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $select = $conexao->prepare("SELECT * FROM receitas");
                  $select->execute();
                  include("helper-class.php");
                  $Helper = new Helper();
                  while ($dados = $select->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr>
                  <td style="text-align: center;"><?php echo $dados->id ?></td>
                  <td style="text-align: center;"><?php echo $dados->cliente ?></td>
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
                  <td style="text-align: center;"><a href="?mod=caixa&pg=caixa&acao=efetuar_exclusao&id=<?php echo $dados->id ?>" onclick="return excluir();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                  <td style="text-align: center;"><a href="?mod=caixa&pg=caixa&acao=receber&id=<?php echo $dados->id ?>" onclick="return receber();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-check"></i></button></a></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
          <a href="?pg=caixa&mod=caixa&acao=pg_consulta"><button type="submit" class="btn btn-success fa fa-user-md"> Pagamento/Consulta</button></a>
          <a href="?pg=caixa&mod=caixa&acao=pg_exame"><button type="submit" class="btn btn-success fa fa-stethoscope"> Pagamento/Exame</button></a>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function excluir() {
     if ( confirm("Deseja mesmo excluir essa receita?") ) {
         return true;
     }
     return false;
  }
</script>

<script type="text/javascript">
  function receber() {
     if ( confirm("Deseja mesmo receber essa receita?") ) {
         return true;
     }
     return false;
  }
</script>

<?php } ?>

<?php 
  if ($acao == "saldo") {
?>
<header class="page-header">
  <h2>Caixa<small></small></h2>
</header>
<div class="row">
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="panel-heading">
        <h3 class="panel-title">Saldo do caixa</h3>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center;">Saldo</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $select = $conexao->prepare("SELECT saldo FROM caixa_c");
                  $select->execute();
                  while ($dados = $select->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr>
                  <td style="text-align: center;"><?php echo $dados->saldo ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
<?php } ?>

<script type="text/javascript">
  function precoConsulta(input_id){
    var valor_select = document.getElementById(input_id).value;
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function(){
      if(xmlHttp.readyState===4&&xmlHttp.status===200){
        document.getElementById('preco'+input_id).value = xmlHttp.responseText;
      }
    };
    xmlHttp.open("GET","buscar_preco_exame.php?id="+valor_select,true);
    xmlHttp.send();
  }
</script>

<script src="../../Backup/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../Backup/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../Backup/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../Backup/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="../../Backup/vendors/iCheck/icheck.min.js"></script>