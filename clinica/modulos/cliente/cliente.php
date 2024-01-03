<?php  
  $id=isset($_REQUEST['id'])?$_REQUEST['id']:null;
  $nome=(isset($_POST['nome'])?$_POST['nome']:null);
  $nascimento=(isset($_POST['nascimento'])?$_POST['nascimento']:null);
  $genero=(isset($_POST['genero'])?$_POST['genero']:null);
  $cpf=(isset($_POST['cpf'])?$_POST['cpf']:null);
  $rg=(isset($_POST['rg'])?$_POST['rg']:null);
  $cep=(isset($_POST['cep'])?$_POST['cep']:null);
  $cidade=(isset($_POST['cidade'])?$_POST['cidade']:null);
  $estado=(isset($_POST['estado'])?$_POST['estado']:null);
  $bairro=(isset($_POST['bairro'])?$_POST['bairro']:null);
  $n=(isset($_POST['n'])?$_POST['n']:null);
  $logradouro=(isset($_POST['logradouro'])?$_POST['logradouro']:null);
  $telefone=(isset($_POST['telefone'])?$_POST['telefone']:null);
  $sus=(isset($_POST['sus'])?$_POST['sus']:null);
  $obs=(isset($_POST['obs'])?$_POST['obs']:null);
  
    if($acao == "efetuar_cadastro"){
    $inserir=$conexao->prepare(
      'INSERT INTO cliente (nome, nascimento, genero, cpf, rg, cep, cidade, estado, bairro, n, logradouro, telefone, sus, obs) VALUES (:nome, :nascimento, :genero, :cpf, :rg, :cep, :cidade, :estado, :bairro, :n, :logradouro, :telefone, :sus, :obs)');

    $inserir->bindValue(':nome', $nome);
    $inserir->bindValue(':nascimento', $nascimento);
    $inserir->bindValue(':genero', $genero);
    $inserir->bindValue(':cpf', $cpf);
    $inserir->bindValue(':rg', $rg);
    $inserir->bindValue(':cep', $cep);
    $inserir->bindValue(':cidade', $cidade);
    $inserir->bindValue(':estado', $estado);
    $inserir->bindValue(':bairro', $bairro);
    $inserir->bindValue(':n', $n);
    $inserir->bindValue(':logradouro', $logradouro);
    $inserir->bindValue(':telefone', $telefone);
    $inserir->bindValue(':sus', $sus);
    $inserir->bindValue(':obs', $obs);
?>
<?php
    if($inserir->execute() === TRUE){
?>  
      <div class="col-md-12">
        <div class="alert alert-success">
          <strong>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Cliente cadastrado com sucesso!
              </font>
            </font>
          </strong>
        </div>
      </div>
<?php 
    }else{
?>  
      <div class="col-md-12">
        <div class="alert alert-danger">
          <strong>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Cliente não foi cadastrado!
              </font>
            </font>
          </strong>
        </div>
      </div>
<?php }
  }
?>
<?php 
  if ($acao == "efetuar_edicao") {
    $update = $conexao->prepare("UPDATE cliente SET nome = :nome, nascimento=:nascimento ,genero=:genero,cpf=:cpf,rg=:rg,cep=:cep,cidade=:cidade,estado=:estado,bairro=:bairro,n=:n,logradouro=:logradouro,telefone=:telefone,sus=:sus,obs=:obs WHERE id=:id");
      $update->bindValue(':nome', $nome);
      $update->bindValue(':nascimento', $nascimento);
      $update->bindValue(':genero', $genero);
      $update->bindValue(':cpf', $cpf);
      $update->bindValue(':rg', $rg);
      $update->bindValue(':cep', $cep);
      $update->bindValue(':cidade', $cidade);
      $update->bindValue(':estado', $estado);
      $update->bindValue(':bairro', $bairro);
      $update->bindValue(':n', $n);
      $update->bindValue(':logradouro', $logradouro);
      $update->bindValue(':telefone', $telefone);
      $update->bindValue(':sus', $sus);
      $update->bindValue(':obs', $obs);
      $update->bindValue(":id",$id);
      $update->execute();
?>
<?php
    if($update->execute() === TRUE){
?>  
      <div class="col-md-12">
        <div class="alert alert-success">
          <strong>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Cliente editado com sucesso!
              </font>
            </font>
          </strong>
        </div>
      </div>
<?php 
    }else{
?>  
      <div class="col-md-12">
        <div class="alert alert-danger">
          <strong>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Cliente não foi editado!
              </font>
            </font>
          </strong>
        </div>
      </div>
<?php }
  }
?>
<?php 
  if ($acao == "efetuar_exclusao") {
    $excluir=$conexao->prepare("DELETE FROM cliente WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '
        <div class="col-md-12">
          <div class="alert alert-success">
            <strong>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Cliente excluído com sucesso!</font>
              </font>
            </strong>
          </div>
        </div>';
    }else{
      echo '
        <div class="col-md-12">
          <div class="alert alert-danger">
            <strong>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Cliente não foi excluído!</font>
              </font>
            </strong>
          </div>
        </div>';
    }
  }
?>
<?php 
  if ($acao == "cadastrar") {
?>
<header class="page-header">
<h2>Cliente<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Cadastro de Cliente</h3>
        </div>
        <div class="panel-body">
        	<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=cliente&mod=cliente">
            <input type="hidden" name="acao" value="efetuar_cadastro">
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome<span class="required"></span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="nome" maxlength="60">
            </div>
          </div>
          <div class="form-group">
            <label for="nascimento" class="col-md-3 control-label">Nascimento</label>
            <div class="col-md-2">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12 fa-facalendar" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="99/99/9999" class="form-control" name="nascimento">
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" style="margin-left: 5px;">Sexo</label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="genero" value="Masculino" required=""> &nbsp; Masculino &nbsp;
                </label>
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="genero" value="Feminino"> Feminino
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="telefone" class="col-md-3 control-label">CPF</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="cpf" required>
            </div>

            <label for="telefone" class="col-md-2 control-label">RG</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="rg" required>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CEP<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input data-plugin-masked-input data-input-mask="99999-999" placeholder="99999-999" id="cep" required="" class="form-control col-md-7 col-xs-12" name="cep">
            </div>

            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cidade<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="text" id="cidade" required="" class="form-control col-md-7 col-xs-12" name="cidade" maxlength="32">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado<span class="required"></span></label>
            <div class="col-md-1 col-sm-6 col-xs-12">
              <input type="text" id="uf" required="" class="form-control col-md-7 col-xs-12" name="estado" maxlength="2">
            </div>

               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12" name="bairro">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logradouro<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="logradouro">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nº<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="Number" id="first-name" required class="form-control col-md-7 col-xs-12" name="n">
              </div>
            </div>

            <div class="form-group">
              <label for="telefone" class="col-md-3 control-label">Telefone</label>
              <div class="col-md-2">
                <input id="phone" data-plugin-masked-input data-input-mask="(99) 9 9999-9999" placeholder="(99) 9 9999-9999" class="form-control" name="telefone" required="">
              </div>

              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nº SUS<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="Number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="sus">
              </div>
            </div>

            <div class="form-group">
              <label for="message" class="col-md-3 control-label">OBS (100 caracteres máx) :</label>
              <div class="col-md-6">
                <textarea id="message" class="form-control" name="obs" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-minlength-message="Vamos! Você precisa inserir pelo menos uma observação de 20 caracteres."
                  data-parsley-validation-threshold="10"></textarea>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="?pg=cliente&mod=cliente" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
                <button class="btn btn-primary" type="reset">Resetar</button>
                <button type="submit" class="btn btn-success">Cadastrar</button>
              </div>
            </div>
          </form>
        </div>
    </div>
  </section>
</div>
<?php }?>
<?php 
  if ($acao == "editar") {
    $select=$conexao->prepare("SELECT * FROM cliente WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados=$select->fetch(PDO::FETCH_OBJ);
?>
<header class="page-header">
  <h2>Cliente<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title">Editar Cliente</h3>
        </div>
        <div class="panel-body">
          <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=cliente&mod=cliente">
            <input type="hidden" name="acao" value="efetuar_edicao">
            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome<span class="required"></span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="nome" maxlength="60" value="<?php echo $dados->nome ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="nascimento" class="col-md-3 control-label">Nascimento</label>
            <div class="col-md-2">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12 fa-facalendar" data-plugin-masked-input data-input-mask="99/99/9999" placeholder="99/99/9999" class="form-control" name="nascimento" value="<?php echo $dados->nascimento ?>">
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" style="margin-left: 5px;">Sexo</label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="genero" value="Masculino" required=""> &nbsp; Masculino &nbsp;
                </label>
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input type="radio" name="genero" value="Feminino"> Feminino
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="telefone" class="col-md-3 control-label">CPF</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="cpf" required value="<?php echo $dados->cpf ?>">
            </div>

            <label for="telefone" class="col-md-2 control-label">RG</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="rg" required value="<?php echo $dados->rg ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CEP<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
             <input type="text" id="cep" required="required" class="form-control col-md-7 col-xs-12" data-plugin-masked-input data-input-mask="99999-999" placeholder="99999-999" name="cep" onblur="pesquisacep(this.value);" value="<?php echo $dados->cep ?>">
            </div>

            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cidade<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="text" id="cidade" required class="form-control col-md-7 col-xs-12" name="cidade" maxlength="32" value="<?php echo $dados->cep ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado<span class="required"></span></label>
            <div class="col-md-1 col-sm-6 col-xs-12">
              <input type="text" id="uf" required class="form-control col-md-7 col-xs-12" name="uf" maxlength="2" value="<?php echo $dados->estado ?>">
            </div>

               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bairro<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12" name="bairro" value="<?php echo $dados->bairro ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nº<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="Number" id="first-name" required class="form-control col-md-7 col-xs-12" name="n" value="<?php echo $dados->n ?>">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logradouro<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="logradouro" value="<?php echo $dados->logradouro ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="telefone" class="col-md-3 control-label">Telefone</label>
              <div class="col-md-2">
                <input id="phone" data-plugin-masked-input data-input-mask="(99) 9 9999-9999" placeholder="(99) 9 9999-9999" class="form-control" name="telefone" required="" value="<?php echo $dados->telefone ?>">
              </div>

              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nº SUS<span class="required"></span></label>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <input type="Number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="sus" value="<?php echo $dados->sus ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="message" class="col-md-3 control-label">OBS (100 caracteres máx) :</label>
              <div class="col-md-6">
                <textarea id="message" class="form-control" name="obs" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-minlength-message="Vamos! Você precisa inserir pelo menos uma observação de 20 caracteres."
                  data-parsley-validation-threshold="10" value="<?php echo $dados->obs ?>"></textarea>
              </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="?pg=cliente&mod=cliente" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
                <button class="btn btn-primary" type="reset">Resetar</button>
                <button type="submit" class="btn btn-success">Salvar e Editar</button>
              </div>
            </div>
          </form>
        </div>
    </div>
  </section>
</div>
<?php   
  } 
?>

<?php 
  if ($acao == "receita") {
    $select = $conexao->prepare("SELECT * FROM cliente WHERE id = :id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados = $select->fetch(PDO::FETCH_OBJ);
?>
<header class="page-header">
  <h2>Receita<small></small></h2>
</header>
<div class="col-sm-12">
  <section class="panel-body">
    <div class="panel-heading">
      <h3 class="panel-title">Gerar Receita</h3>
    </div>
    <div class="panel" id="printable">
      <div class="panel-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=cliente&mod=cliente">
          <input type="hidden" name="acao" value="">
          <div class="form-group" >
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Unidade de saude:<span class="required"></span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
               <input type="text" required="" class="form-control col-md-7 col-xs-12" maxlength="60">
            </div>
          </div>
          <div class="form-group" >
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Parciente:<span class="required"></span></label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" required="" class="form-control col-md-7 col-xs-12" name="nome" maxlength="60" disabled value="<?php echo $dados->nome ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="nascimento" class="col-md-3 control-label">Data:</label>
            <div class="col-md-2">
              <input type="text"  required="" class="form-control col-md-7 col-xs-12 fa-facalendar" data-plugin-masked-input data-input-mask="99/99/9999"  class="form-control" name="data">
            </div>
          </div>
          <div class="form-group" >
            <label for="message" class="col-md-3 control-label">Prescrição:</label>
            <div class="col-md-6">
              <textarea rows="15" cols="40" id="message" required="required" class="form-control"></textarea>
            </div>
          </div>
          <div class="ln_solid"></div>
        </form>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <a href="?pg=cliente&mod=cliente" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
        <a style="color: #fff;"><button class="btn btn-success" value="Imprimir" onClick="window.print()" type="button"> Imprimir</button></a>
      </div>
    </div>
  </section>
</div>

<style type="text/css">
  @media print {
  body * {
    visibility: hidden;
  }
  #printable, #printable * {
    visibility: visible;
  }
  #printable {
    position: fixed;
    left: 0;
    top: 0;
  }
}
</style>
<?php
  }
?>

<?php 
  if ($acao == "lc_medico") {
?>
<header class="page-header">
  <h2>Cliente<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de Clientes</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Nome</th>
                  <th style="text-align: center;">CPF</th>
                  <th style="text-align: center;">Telefone</th>
                  <th style="text-align: center;">SUS</th>
                  <th style="text-align: center;">Receita</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $select = $conexao->prepare("SELECT * FROM cliente");
                $select->execute();
                while ($dados = $select->fetch(PDO::FETCH_OBJ)){ ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $dados->id ?></td>
                    <td style="text-align: center;"><?php echo $dados->nome ?></td>
                    <td style="text-align: center;"><?php echo $dados->cpf ?></td>
                    <td style="text-align: center;"><?php echo $dados->telefone ?></td>
                    <td style="text-align: center;"><?php echo $dados->sus ?></td>
                    <td style="text-align: center;"><a href="?mod=cliente&pg=cliente&acao=receita&id=<?php echo $dados->id ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-pencil-square-o"></i></button></a></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
  }
?>

<?php 
  if ($acao != "cadastrar" AND $acao != "editar" AND $acao != "receita" AND $acao != "lc_medico") {
?>
<header class="page-header">
  <h2>Cliente<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de Clientes</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Nome</th>
                  <th style="text-align: center;">CPF</th>
                  <th style="text-align: center;">Telefone</th>
                  <th style="text-align: center;">SUS</th>
                  <th style="text-align: center;">Excluir</th>
                  <th style="text-align: center;">Editar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $select = $conexao->prepare("SELECT * FROM cliente");
                $select->execute();
                while ($dados = $select->fetch(PDO::FETCH_OBJ)){ ?>
                  <tr>
                    <td style="text-align: center;"><?php echo $dados->id ?></td>
                    <td style="text-align: center;"><?php echo $dados->nome ?></td>
                    <td style="text-align: center;"><?php echo $dados->cpf ?></td>
                    <td style="text-align: center;"><?php echo $dados->telefone ?></td>
                    <td style="text-align: center;"><?php echo $dados->sus ?></td>
                    <td style="text-align: center;"><a href="?mod=cliente&pg=cliente&acao=efetuar_exclusao&id=<?php echo $dados->id ?>" onclick="return excluir();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                    <td style="text-align: center;"><a href="?mod=cliente&pg=cliente&acao=editar&id=<?php echo $dados->id ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
        <a href="?pg=cliente&mod=cliente&acao=cadastrar" type="button" class="mb-xs mt-xs mr-xs btn btn-success fa fa-fax"> Adicionar Cliente</a>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  function excluir() {
     if ( confirm("Deseja mesmo excluir esse cliente?") ) {
         return true;
     }
     return false;
  }
</script>

<?php
  }
?>