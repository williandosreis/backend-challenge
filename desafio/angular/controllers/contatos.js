app.controller('contatos', function($scope, $rootScope, $http, ngDialog)
{

  
  // declaração da variavel global da url da api
  url = "http://localhost/desafio/";

  $scope.contato = {};

  $scope.mostraListaContatos = true;

  $scope.novoContato = function()
  {
    $scope.mostraFormContatos  = true;
    $scope.mostraListaContatos = false;
  }

  $scope.cancelarNovoContato = function()
  {
     $scope.mostraFormContatos  = false;
     $scope.mostraListaContatos = true;
  }

  function getContatos()
  {
      var config = 
      {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        method: 'GET',
        url :  url+"contatos/getContatos"  
      }
      $http(config).then(function successCallback(response) 
      { 
     
        $scope.contatos = response.data;
     
      }, function errorCallback(response)
      {
        console.log(response);
      }); 
  }

  getContatos();
  
  $scope.cadastrarContato = function()
  {
      var contato = $scope.contato;
      
      
      var config = 
      {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data : contato, 
        method: 'POST',
        url :  url+"contatos/cadastrarContato"  
      }
      $http(config).then(function successCallback(response) 
      { 
        
        $scope.cadastrado = "Contato cadastrado";
          
        ngDialog.openConfirm({template: 'dialogCadastrado',
          scope: $scope //Pass the scope object if you need to access in the template
        }).then(
            
        );
        
        $scope.contato = ""; 

        getContatos();

        $scope.mostraFormContatos  = false;
        $scope.mostraListaContatos = true;
      
      }, function errorCallback(response)
      {
        console.log(response);
      });
  }

  $scope.updateContato = function(contato)
  {
    $scope.contato = contato;
    $scope.mostraFormContatos  = true;
    $scope.mostraListaContatos = false;
  }

  $scope.okCadastrado = function()
  {
     ngDialog.close();
  }

  $scope.deleteContato = function(idcontato)
  {
      var config = 
      {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data : idcontato, 
        method: 'POST',
        url :  url+"contatos/deleteContato"  
      }
      $http(config).then(function successCallback(response) 
      { 
                
        getContatos();

        $scope.mostraFormContatos  = false;
        $scope.mostraListaContatos = true;
      });  
  }
 
  $scope.logout = function()
  {
    var config = 
    {
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      method: 'GET',
      url :  url+"contatos/sair"  
    }
    $http(config).then(function successCallback(response) 
    { 
      // redireciona para a tela de login 
        window.location.href = url;

    }, function errorCallback(response)
    {
      console.log(response);
    }); 
  }
  

  
  $scope.buscarContato = function()
  {
    
    var idcontato = $scope.contato.buscar.idcontato;
   
    var config = 
    {
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      data: idcontato,
      method: 'POST',
      url :  url+"contatos/buscarContato"  
    }
    $http(config).then(function successCallback(response) 
    { 

      $scope.contatos = response.data;
         
    }, function errorCallback(response)
    {
      console.log(response);
    });
   
  }

  // auto complete do tipo de exercicio
  $scope.autoContato = function(buscarContato)
  {
    $http.post('contatos/autoContato', { "buscarContato" : buscarContato}).
    success(function(data) 
    {
        // JSON retornado do banco
        $scope.autoContatos = data;  
    })
  }  

});
