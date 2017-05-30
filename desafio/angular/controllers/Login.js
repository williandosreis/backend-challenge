app.controller('login', function($scope, $rootScope, $http, ngDialog)
{

  $scope.usuario = {};

  // declaração da variavel global da url da api
  url = "http://localhost/desafio/";

  $scope.loginUsuario = function()
  {
      var usuario = $scope.usuario;

      var config = 
      {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data : usuario, 
        method: 'POST',
        url :  url+"login/logar"  
      }
      $http(config).then(function successCallback(response) 
      { 
        
        if (response.data == 'false')
        {
          $scope.validaUsuario = "Nenhum usuário encontrado";
          
          ngDialog.openConfirm({template: 'dialogValidaUsuario',
            scope: $scope //Pass the scope object if you need to access in the template
          }).then(
            
          );
        }
        else
        {
          window.location.href = "http://localhost/desafio/contatos";
        }  
      
      }, function errorCallback(response)
      {
        console.log(response);
      });
  }

  $scope.okValidaUsuario = function()
  {
       ngDialog.close();
  }

  $scope.cadastrarUsuario = function()
  {
      var usuario = $scope.usuario;

      var config = 
      {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data : usuario, 
        method: 'POST',
        url :  url+"usuario/cadastrarUsuario"  
      }
      $http(config).then(function successCallback(response) 
      { 
                
        $scope.cadastrado = "Usuário cadastrado";
          
        ngDialog.openConfirm({template: 'dialogCadastrado',
          scope: $scope //Pass the scope object if you need to access in the template
        }).then(
            
        );
        
        $scope.usuario = ""; 
      
      }, function errorCallback(response)
      {
        console.log(response);
      });
  }

  $scope.okCadastrado = function()
  {
     ngDialog.close();
  }

});
