<?php include_once("cabecalho.php"); ?>


<body ng-controller="login">
  
	<div class="pen-title">
	  <h1>AlohaAgencia</h1>
	</div>
	
	<div class="module form-module">
	  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
	    <div class="tooltip">Cadastre-se</div>
	  </div>
	  
	  <div class="form">
	    <h2>Insira seu usuário e senha</h2>
	    <form name="myFormLogin">
	      
	      <input type="text" ng-model="usuario.usuario" placeholder="Usuario" required/>
	      
	      <input type="password" ng-model="usuario.senha" placeholder="Senha" required/>
	      
	      <button ng-disabled="myFormLogin.$invalid" ng-click="loginUsuario()">Acessar</button>
	    </form>
	  </div>
	  
	  <div class="form">
	    <h2>Crie uma conta</h2>
	    <form name="myFormCadastro">
	      
	      <input type="text" ng-model="usuario.nome" placeholder="Nome" required/>
	      
	      <input type="text" ng-model="usuario.user" placeholder="Usuario" required/>
	      
	      <input type="password" ng-model="usuario.password" placeholder="Senha" required/>
	      
	      <input type="tel" ng-model="usuario.telefone" placeholder="Telefone" required/>
	     
	      <input type="email" ng-model="usuario.email" placeholder="Email" required/>
	      
	      <button ng-disabled="myFormCadastro.$invalid" ng-click="cadastrarUsuario()">Cadastrar</button>
	    </form>
	  </div>
	  <div class="cta"><a href="http://andytran.me">Esqueceu sua senha?</a></div>
	</div>
	
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://codepen.io/andytran/pen/vLmRVp.js'></script>

	 <script src="js/index.js"></script>

	<script type="text/ng-template" id="dialogValidaUsuario">
      <div class="ngdialog-message">
          <h3>{{validaUsuario}}</h3>
          <p ng-show="theme">Test content for <code>{{theme}}</code></p>
      </div>
      <div class="ngdialog-buttons">
          <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="okValidaUsuario()">OK</button>
      </div>
    </script>

    <script type="text/ng-template" id="dialogCadastrado">
      <div class="ngdialog-message">
          <h3>{{cadastrado}}</h3>
          <p ng-show="theme">Test content for <code>{{theme}}</code></p>
      </div>
      <div class="ngdialog-buttons">
          <button type="button" class="ngdialog-button ngdialog-button-primary" ng-click="okCadastrado()">OK</button>
      </div>
    </script>

</body>
</html>
