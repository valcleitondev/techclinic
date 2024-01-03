<?php
	  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  	$tipo=(isset($_POST['tipo'])?$_POST['tipo']:null);
  	$preco=(isset($_POST['preco'])?$_POST['preco']:null);

  	if($acao == "efetuar_cadastro"){
    $inserir=$conexao->prepare('INSERT INTO consulta (tipo, preco) VALUES (:tipo, :preco)');

    $inserir->bindValue(':tipo', $tipo);
    $inserir->bindValue(':preco', $preco);
?>
<?php
    if($inserir->execute() === TRUE){
?>  
      <div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Consulta cadastrada com sucesso!</font>
          </font>
        </strong>
      </div>
<?php 
    }else{
?>  
      <div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Não foi possível cadastrar consulta!</font>
          </font>
        </strong>
      </div>
<?php
    }
  }
?>

<?php 
  if ($acao == "efetuar_edicao") {
    $update = $conexao->prepare("UPDATE consulta SET tipo = :tipo, preco = :preco WHERE id = :id");
    $update->bindValue(':tipo', $tipo);
    $update->bindValue(':preco', $preco);
    $update->bindValue(":id",$id);
    $update->execute();
?>
<?php
    if($update->execute() === TRUE){
?>  
      <div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Consulta editada com sucesso!</font>
          </font>
        </strong>
      </div>
<?php 
    }else{
?>  
      <div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Não foi possível editar a consulta!</font>
          </font>
        </strong>
      </div>
<?php
    }
  }
?>

<?php 
  if ($acao == "efetuar_exclusao") {
    $excluir=$conexao->prepare("DELETE FROM consulta WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '<div class="alert alert-success">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Consulta excluída com sucesso!</font>
          </font>
        </strong>
      </div>';
    }else{
      echo '<div class="alert alert-danger">
        <strong>
          <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Não foi possível excluir a consulta!</font>
          </font>
        </strong>
      </div>';
    }
  }
?>

<?php if($acao == "cadastrar"){ ?>
<div class="panel-body">
  <header class="page-header">
    <h2>Consultas</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Cadastro da Consulta</h3>
  </div>
  <div class="panel-body">  
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=consulta&mod=consulta">
      <input type="hidden" name="acao" value="efetuar_cadastro">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo<span class="required"></span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="" placeholder="" required="" class="form-control col-md-7 col-xs-12" name="tipo">
        </div>
      </div>
      <div class="form-group">
        <label for="telefone" class="col-md-3 control-label">Preço da Consulta</label>
        <div class="col-md-2">
          <input id="" type="number" placeholder="R$ 100" class="form-control col-md-7" name="preco" required="">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?mod=consulta&pg=consulta&acao=listar" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <button class="btn btn-primary" type="reset">Resetar</button>
          <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php if($acao == "editar"){
	$select=$conexao->prepare("SELECT * FROM consulta WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados=$select->fetch(PDO::FETCH_OBJ);
?>
<div class="panel-body">
  <header class="page-header">
    <h2>Consultas</h2>
  </header>
  <div class="panel-heading">
    <h3 class="panel-title">Editar Consulta</h3>
  </div>
  <div class="panel-body">
    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=consulta&mod=consulta">
      <input type="hidden" name="acao" value="efetuar_edicao">
      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo<span class="required"></span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="tipo" value="<?php echo $dados->tipo ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="telefone" class="col-md-3 control-label">Preço da consulta</label>
        <div class="col-md-2">
          <input id="phone" type="number" class="form-control col-md-7" name="preco" required="" value="<?php echo $dados->preco ?>">
        </div>
      </div>
      <div class="ln_solid"></div>
      <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
          <a href="?mod=consulta&pg=consulta&acao=listar" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
          <input type="hidden" name="id" value="<?php echo $dados->id?>">
          <button type="submit" class="btn btn-success">Salvar e Editar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php
  if ($acao != "cadastrar" AND $acao != "editar"){
?>
<header class="page-header">
  <h2>Consultas<small></small></h2>
</header>
<div class="row">
  <div class="col-md-12 col-sm-6 col-xs-12">
    <div class="x_panel">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de Consultas</h3>
      </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="text-align: center;">Id</th>
                  <th style="text-align: center;">Tipo</th>
                  <th style="text-align: center;">Preço</th>
                  <th style="text-align: center;">Excluir</th>
                  <th style="text-align: center;">Editar</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $select = $conexao->prepare("SELECT * FROM consulta");
                  $select->execute();
                  while ($dados = $select->fetch(PDO::FETCH_OBJ)){
                ?>
                <tr>
                  <td style="text-align: center;"><?php echo $dados->id ?></td>
                  <td style="text-align: center;"><?php echo $dados->tipo ?></td>
                  <td style="text-align: center;"><?php echo $dados->preco ?></td>
                  <td style="text-align: center;"><a href="?mod=consulta&pg=consulta&acao=efetuar_exclusao&id=<?php echo $dados->id ?>" onclick="return excluir();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                  <td style="text-align: center;"><a href="?mod=consulta&pg=consulta&acao=editar&id=<?php echo $dados->id ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
          <a href="?pg=consulta&mod=consulta&acao=cadastrar"><button type="submit" class="btn btn-success fa fa-plus-square"> Adicionar Consulta</button></a>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function excluir() {
     if ( confirm("Deseja mesmo excluir essa consulta?") ) {
         return true;
     }
     return false;
  }
</script>

<?php } ?>