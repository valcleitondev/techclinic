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
  $telefone=(isset($_POST['telefone'])?$_POST['telefone']:null);
  $salario=(isset($_POST['salario'])?$_POST['salario']:null);
  $area=(isset($_POST['area'])?$_POST['area']:null);
  $usuario=(isset($_POST['usuario'])?$_POST['usuario']:null);
  $senha=(isset($_POST['senha'])?$_POST['senha']:null);
  $acesso=(isset($_POST['acesso'])?$_POST['acesso']:null);

  if($acao == "efetuar_cadastro_f"){
    $inserir=$conexao->prepare('INSERT INTO funcionario (nome, nascimento, genero, cpf, rg, cep, cidade, estado, telefone, salario, area, usuario, senha, acesso) VALUES (:nome, :nascimento, :genero, :cpf, :rg, :cep, :cidade, :estado, :telefone, :salario, :area, :usuario, :senha, :acesso)');

    $inserir->bindValue(':nome', $nome);
    $inserir->bindValue(':nascimento', $nascimento);
    $inserir->bindValue(':genero', $genero);
    $inserir->bindValue(':cpf', $cpf);
    $inserir->bindValue(':rg', $rg);
    $inserir->bindValue(':cep', $cep);
    $inserir->bindValue(':cidade', $cidade);
    $inserir->bindValue(':estado', $estado);
    $inserir->bindValue(':telefone', $telefone);
    $inserir->bindValue(':salario', $salario);
    $inserir->bindValue(':area', $area);
    $inserir->bindValue(':usuario', $usuario);
    $inserir->bindValue(':senha', $senha);
    $inserir->bindValue(':acesso', $acesso);
?>
<?php
    if($inserir->execute() === TRUE){
?>
      <div class="col-md-12">
        <div class="alert alert-success">
          <strong>
            <font style="vertical-align: inherit;">
              <font style="vertical-align: inherit;">Funcionário cadastrado com sucesso!</font>
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
              <font style="vertical-align: inherit;">Funcionário não foi cadastrado!</font>
            </font>
          </strong>
        </div>
      </div>
<?php
    }
  }
?>
<?php 
  if ($acao == "efetuar_edicao_f") {
    $update = $conexao->prepare("UPDATE funcionario SET nome = :nome, nascimento = :nascimento, genero = :genero, cpf = :cpf, rg = :rg, cep = :cep, cidade = :cidade, estado = :estado, telefone = :telefone, salario = :salario, area = :area, usuario = :usuario, senha = :senha, acesso= :acesso WHERE id = :id");
    $update->bindValue(':nome', $nome);
    $update->bindValue(':nascimento', $nascimento);
    $update->bindValue(':genero', $genero);
    $update->bindValue(':cpf', $cpf);
    $update->bindValue(':rg', $rg);
    $update->bindValue(':cep', $cep);
    $update->bindValue(':cidade', $cidade);
    $update->bindValue(':estado', $estado);
    $update->bindValue(':telefone', $telefone);
    $update->bindValue(':salario', $salario);
    $update->bindValue(':area', $area);
    $update->bindValue(':usuario', $usuario);
    $update->bindValue(':senha', $senha);
    $update->bindValue(':acesso', $acesso);
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
              <font style="vertical-align: inherit;">Funcionário editado com sucesso!</font>
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
              <font style="vertical-align: inherit;">Funcionário não foi editado!</font>
            </font>
          </strong>
        </div>
      </div>
<?php
    }
  }
?>
<?php 
  if ($acao == "efetuar_exclusao_f") {
    $excluir=$conexao->prepare("DELETE FROM funcionario WHERE id=:id");
    $excluir->bindValue(':id',$id);
    $excluir->execute();
    if ($excluir->execute()==TRUE) {
      echo '
        <div class="col-md-12">
          <div class="alert alert-success">
            <strong>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Funcionário excluído com sucesso!</font>
              </font>
            </strong>
          </div>
        </div>
      ';
    }else{
      echo '
        <div class="col-md-12">
          <div class="alert alert-danger">
            <strong>
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Funcionário não foi excluído!</font>
              </font>
            </strong>
          </div>
        </div>
      ';
    }
  }
?>
<?php 
  if ($acao == "cadastrar_f"){
?>
<header class="page-header">
  <h2>Funcionários<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Cadastro de Funcionário</h3>
      </div>
      <div class="panel-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=funcionario&mod=funcionario">
          <input type="hidden" name="acao" value="efetuar_cadastro_f">
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
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="cpf" required="">
            </div>
            <label for="telefone" class="col-md-2 control-label">RG</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="rg" required="">
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
            <label for="telefone" class="col-md-3 control-label">Telefone</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="(99) 9 9999-9999" placeholder="(99) 9 9999-9999" class="form-control" name="telefone" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Área de Trabalho</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" required="" name="area">
                <option selected="" value="" disabled="">Selecione</option>
                <option value="Médico">Médico</option>
                <option value="Dentista">Dentista</option>
                <option value="Fisioterapeuta">Fisioterapeuta</option>
                <option value="Fonoaudiólogo(a)">Fonoaudiólogo(a)</option>
                <option value="Esteticista">Esteticista</option>
                <option value="Outra">Outro profissional da saúde</option>
                <option value="Gerente">Gerente</option>
                <option value="Atendente">Atendente</option>
                <option value="Bem-estar">Bem-estar</option>
              </select>
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Salário</label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="number" id="first-name" required="" class="form-control col-md-3 col-xs-12" data-plugin-masked-input data-input-mask="" placeholder="R$ 1000" class="form-control" name="salario">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Usuário<span class="required"></span></label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="usuario" minlength="8" maxlength="16">
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Senha<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="password" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="senha" minlength="4" maxlength="8">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nível de Acesso</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" required="" name="acesso">
                <option selected="" value="" disabled="">Selecione</option>
                <option value="0">Gerente</option>
                <option value="1">Médico</option>
                <option value="2">Atendente</option>
                <option value="3">Sem Acesso</option>
              </select>
            </div>  
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="?pg=funcionario&mod=funcionario" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
              <button class="btn btn-primary" type="reset">Resetar</button>
              <a><button type="submit" class="btn btn-success">Cadastrar</button></a>
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
  if ($acao == "editar_f") {
    $select=$conexao->prepare("SELECT * FROM funcionario WHERE id=:id");
    $select->bindValue(':id',$id);
    $select->execute();
    $dados=$select->fetch(PDO::FETCH_OBJ);
?>
<header class="page-header">
  <h2>Funcionários<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
    <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Editar Funcionário</h3>
      </div>
      <div class="panel-body">
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"  method="POST" action="?pg=funcionario&mod=funcionario">
          <input type="hidden" name="acao" value="efetuar_edicao_f">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome<span class="required"></span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" maxlength="60" name="nome" value="<?php echo $dados->nome ?>">
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
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="cpf" required="" value="<?php echo $dados->cpf ?>">
            </div>
            <label for="telefone" class="col-md-2 control-label">RG</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="999.999.999-99" placeholder="999.999.999-99" class="form-control" name="rg" required="" value="<?php echo $dados->rg ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CEP<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input id="cep" required="" data-plugin-masked-input data-input-mask="99999-999" placeholder="99999-999" class="form-control" class="form-control col-md-7 col-xs-12" name="cep" onblur="pesquisacep(this.value);" value="<?php echo $dados->cep ?>">
            </div>
            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Cidade<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="text" id="cidade" required="" class="form-control col-md-7 col-xs-12" name="cidade" maxlength="32" value="<?php echo $dados->cidade ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado<span class="required"></span></label>
            <div class="col-md-1 col-sm-6 col-xs-12">
              <input type="text" id="uf" required="" class="form-control col-md-7 col-xs-12" name="estado" maxlength="2" value="<?php echo $dados->estado ?>">
            </div>
            <label for="telefone" class="col-md-3 control-label">Telefone</label>
            <div class="col-md-2">
              <input id="phone" data-plugin-masked-input data-input-mask="(99) 9 9999-9999" placeholder="(99) 9 9999-9999" class="form-control" name="telefone" required="" value="<?php echo $dados->telefone ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Área de Trabalho</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" required="" name="area">
                <option selected="" value="" disabled="">Selecione</option>
                <option value="Médico">Médico</option>
                <option value="Dentista">Dentista</option>
                <option value="Fisioterapeuta">Fisioterapeuta</option>
                <option value="Fonoaudiólogo(a)">Fonoaudiólogo(a)</option>
                <option value="Esteticista">Esteticista</option>
                <option value="Outra">Outro profissional da saúde</option>
                <option value="Gerente">Gerente</option>
                <option value="Atendente">Atendente</option>
                <option value="Bem-estar">Bem-estar</option>
              </select>
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Salário</label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="number" id="first-name" name="salario" required="" class="form-control col-md-7 col-xs-12" data-inputmask="'mask' : 'R$ 1000'" placeholder="R$ 1000" value="<?php echo $dados->salario ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Usuário<span class="required"></span></label>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="usuario" minlength="8" maxlength="16" value="<?php echo $dados->usuario ?>">
            </div>
            <label class="control-label col-md-1 col-sm-3 col-xs-12" for="first-name">Senha<span class="required"></span></label>
            <div class="col-md-2 col-sm-6 col-xs-12">
              <input type="password" id="first-name" required="" class="form-control col-md-7 col-xs-12" name="senha" minlength="4" maxlength="8" value="<?php echo $dados->senha ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nível de Acesso</label>
            <div class="col-md-3 col-sm-3 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" required="" name="acesso">
                <option selected="" value="" disabled="">Selecione</option>
                <option value="0">Gerente</option>
                <option value="1">Médico</option>
                <option value="2">Atendente</option>
                <option value="3">Sem Acesso</option>
              </select>
            </div>  
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <a href="?pg=funcionario&mod=funcionario" style="color: #fff;"><button class="btn btn-primary" type="button">Cancelar</button></a>
              <input type="hidden" name="id" value="<?php echo $dados->id?>">
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
?><?php 
  if ($acao != "cadastrar_f" AND $acao != "editar_f") {
?>
<header class="page-header">
<h2>Funcionários<small></small></h2>
</header>
<div class="col-md-12">
  <section class="panel-body">
  <div class="panel">
      <div class="panel-heading">
        <h3 class="panel-title">Lista de Funcionários</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Nome</th>
                  <th style="text-align: center;">Área de trabalho</th>
                  <th style="text-align: center;">Salário em R$</th>
                  <th style="text-align: center;">Usuário</th>
                  <th style="text-align: center;">Excluir</th>
                  <th style="text-align: center;">Editar</th>
                </tr>
          </thead>
          <tbody>
            <?php 
                  $select = $conexao->prepare("SELECT * FROM funcionario");
                  $select->execute();
                  while ($dados = $select->fetch(PDO::FETCH_OBJ)) {?>
                    <tr>
                      <td style="text-align: center;"><?php echo $dados->id ?></td>
                      <td style="text-align: center;"><?php echo $dados->nome ?></td>
                      <td style="text-align: center;"><?php echo $dados->area ?></td>
                      <td style="text-align: center;"><?php echo $dados->salario ?></td>
                      <td style="text-align: center;"><?php echo $dados->usuario ?></td>
                      <td style="text-align: center;"><a href="?mod=funcionario&pg=funcionario&acao=efetuar_exclusao_f&id=<?php echo $dados->id ?>" onclick="return excluir();"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="fa fa-trash-o"></i></button></a></td>
                      <td style="text-align: center;"><a href="?mod=funcionario&pg=funcionario&acao=editar_f&id=<?php echo $dados->id ?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                    </tr>
                  <?php }?>
          </tbody>
        </table>
        <a href="?pg=funcionario&mod=funcionario&acao=cadastrar_f" type="button" class="mb-xs mt-xs mr-xs btn btn-success fa fa-fax"> Adicionar Funcionário</a>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  function excluir() {
     if ( confirm("Deseja mesmo excluir esse funcionário?") ) {
         return true;
     }
     return false;
  }
</script>

<?php
  }
?>

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
<script src="../../Backup/build/js/custom.min.js"></script>