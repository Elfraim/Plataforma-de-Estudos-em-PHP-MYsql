<?php

if(isset($_POST['submit'])){

include_once('config.php');

print_r($_POST['nome']);
print_r($_POST['username']);
print_r($_POST['senha']);
print_r($_POST['nasc']);

$nome =$_POST['nome'];
$username = $_POST['username'];
$password = $_POST['senha'];
$nasc = $_POST['nasc'];

$resultado= mysqli_query($conecta,"INSERT INTO estudante (nome,usuario,senha,datanasc) VALUES ('$nome','$username', '$password','$nasc');");

}


?><html lang="pt-br"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body class="bg-light" style="
    text-align: center;
">
       <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  
        .b-example-divider {
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }

        .col-10 {
    flex: 0 0 auto;
   width: 83.33333333% !important;
}
      </style>
  
      
      <!-- Custom styles for this template -->
      <link href="form-validation.css" rel="stylesheet">
    
    
      
  <div class="container" style="margin-top: calc(2rem + 2vw);
">
    <main>
      
  
      <div class="row g-5" style="
">
        <div class="col-md-5 col-lg-4 order-md-last" style="
    margin: auto;
">
          <h4 class="d-flex text-center align-items-center mb-3">
            
            
          </h4>
          <form method="post" action="cadastro.php"><ul class="list-group mb-3">
            <li class="list-group-item d-flex text-center justify-content-between lh-sm" style="
">
              <div style="
    margin: auto;
">
                <h2 class="text-center my-0" style="">Cadastre-se</h2>
                
              </div>
              
            </li><li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Cadastre-se para estudar no seu tempo e criar seu cronograma de estudo.</h6>
                
              </div>
              
            </li>

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="col-12">
                <button type="submit" class="btn btn-primary" style="
    width: 100%;
">Cadastre-se com F4cebook</button>
<p style="
    margin: 0;
    text-align: center;
">OU</p>
                
              </div>
              
            </li><li class="list-group-item d-flex justify-content-between lh-sm">
              <div class="row g-3">
  <div class="col-12">

                <input type="text" class="form-control" id="nome" placeholder=" Ex: Fulano da Silva" name="nome" required="">
                <div class="invalid-feedback">
                  Por favor coloque seu nome.
                </div>
  
              <div class="col-12">
                
                <div class="input-group has-validation">
                  
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username"required="">
                <div class="invalid-feedback">
                    Seu nome de usuario e necessário.
                  </div>
                </div>
              </div>
  
              <div class="col-12">

                <input type="password" class="col-10 form-control " name="senha"style="
                margin: 0;
                float: left;
            " id="senha" placeholder="coloque uma senha de 8 digitos" minlength="8">
                <button style="
                margin-top: calc(0.5rem + 0.5vw) !important;" class="btn-white rounded border-0 col-2" onmouseover="var ver = document.getElementById('senha');  if(ver.type=='password'){ver.type='text';setTimeout(() => {console.log('Delayed for 1 second.'); }, '1000')}else{ver.type='password';setTimeout(() => {console.log('Delayed for 1 second.'); }, '1000')}"><svg onmouseover="var ver = document.getElementById('senha');  if(ver.type=='password'){ver.type='text';}else{ver.type='password'}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                  </svg></button>
                   <div class="invalid-feedback">
                 Por favor coloque uma senha com 8 dígitos
                </div>
               
              </div>
  
            
              </div>
  
              <div class="col-12">

                <input type="date" class="form-control" id="nasc" name="nasc"placeholder="Ex: 01/01/2000">
              </div>
</div>
              
            </li>
            
            
            
            <li class="list-group-item d-flex justify-content-between">
              </li><li class="list-group-item d-flex justify-content-between">
        
            <div class="input-group">
              
              <button type="submit" name="submit" id="submit" class="btn btn-primary" style="
    width: 100%;
">Cadastre-se</button>
            </div>
               </li>
          </ul></form>
  
          <form class="col-12 card p-2">
            <div class="input-group">
              
              <p class="_ab25">Tem uma conta? <a class="" href="login.php" role="link" tabindex="0" style="
    text-decoration: none;
">Conecte-se</a></p>
            </div>
          </form><form class="col-12 ">
            <div class="input-group">
              

        
      </div>
    </main>
  
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">
Feito por Efraim Oliveira Melo
<br>
<p>Visite meu:</p>
<a class="" href="https://www.linkedin.com/in/efraim-oliveira-melo-2659911a6/" role="link" tabindex="0" style="    text-decoration: none;">Linkedin</a> 
e 
<a class="" href="https://github.com/Elfraim" role="link" tabindex="0" style=" text-decoration: none;">Github</a>
<br>
Português (Brasil)
 01/2023 </p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



 </body></html>