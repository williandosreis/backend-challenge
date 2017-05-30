<?php include_once("cabecalho.php") ?>

<link rel="stylesheet" type="text/css" href="css/contatos.css">
<link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
	
<body ng-controller="contatos">
	<div id="tudo">
		<div id="topo">
			
		</div><br>
		<div class="logout">
			<center>
			<button class="btn btn-danger" ng-click="logout()">Sair</button>
			</center> 
		</div>
		<div class="form" ng-show="mostraFormContatos">
			<form name="formContato">

			    <div class="row">
			        
			        <div class="col-md-10 form-group">
			            <label> Nome </label>
			            <input ng-model="contato.nome" required type="text" name="nome"  class="form-control" value="">
			        </div>
			    </div>

			    
			    <div class="row">
			    	<div class="col-md-2 form-group">
			            <label> Telefone </label>
			            <input  ng-model="contato.telefone" required type="text" name="telefone" class="form-control" value="">
			        </div>
			        <div class="col-md-8 form-group">
			            <label> Email </label>
			            <input ng-model="contato.email" required type="text" name="email" class="form-control" value="">
			        </div>
		       
			    </div>
			    <div class="row pull-left">
			        <div class="col-md-12 form-group">
			            <button ng-click="cancelarNovoContato()" class="btn btn-danger"> Cancelar </button>
			            
			            <button ng-click="cadastrarContato()"  ng-disabled="formContato.$invalid" class="btn btn-success"> Cadastrar Contato </button>
			        </div>
			    </div>
			</form>
					
		</div>

		
		<div ng-show="mostraListaContatos">
			
			<div class="lista">

				<div>
					<button ng-click="novoContato()" class="btn btn-info">Novo Contato</button>
				</div><br>

				<div class="row">
					<div class="col-md-6 form-group">
						<input type="text" class="form-control" ng-model="contato.buscar"
						placeholder="Digite o nome do contato para a busca"
						ng-keyup="autoContato(contato.buscar)" uib-typeahead="autoContato as autoContato.nome for autoContato in autoContatos | filter:$viewValue | limitTo:8">
					</div>
					<div class="col-md-2 form-group">
						<button ng-click="buscarContato()" class="btn btn-info">Buscar</button>
					</div>
				</div><br>

				<table class="table table-bordered table-striped table-hover">
					<tr>
						<th>id Contato</th>
						<th>Nome</th>
						<th>Telefone</th>
						<th>Email</th>
						<th>Alterar</th>
						<th>Deletar</th>
					</tr>
					<tr dir-paginate="contato in contatos|itemsPerPage:7" >
						<td>{{contato.idcontato}}</td>
						<td>{{contato.nome}}</td>
						<td>{{contato.telefone}}</td>
						<td>{{contato.email}}</td>
						<td><a href="#" class="btn btn-info"   ng-click="updateContato(contato)">Alterar</a></td>
						<td><a href="#" class="btn btn-danger" ng-click="deleteContato(contato.idcontato)">Excluir</a></td>
					</tr>
				</table>
			</div>

			<!-- div dos botões do paginator -->
	        <div id="green" style="margin: auto;">
	            
	        </div>	
		</div>
	</div>

	<script type="text/ng-template" id="dialogCadastrado">
      <div class="ngdialog-message">
          <h3>{{cadastrado}}</h3>
          <p ng-show="theme">Test content for <code>{{theme}}</code></p>
      </div>
      <div class="ngdialog-buttons">
          <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="okCadastrado()">OK</button>
      </div>
    </script>
			
	<script type="text/ng-template" id="dialogExcCliente">
		<div class="ngdialog-message">
            <h3>Tem ceteza que deseja excluir esse cliente?</h3>
            <p ng-show="theme">Test content for <code>{{theme}}</code></p>
        </div>
    	<div class="ngdialog-buttons">
        	<button type="button" class="ngdialog-button ngdialog-button-danger"  ng-click="cancelExcCliente()">Não</button>
        	<button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="confirmExcCliente()">Sim</button>
    	</div>
	</script>
</body>