<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error Page BoredApe Store</title>

    <!-- Bootstrap style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Reset Css -->
    <link href="../assets/css/reset.css" rel="stylesheet">

    <!-- Icon Style -->
    <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>

    <style>
      .imagem-wrapper{
        width: 700px;
        height: auto;
        margin: 0 auto;
      }

    </style>
  </head>
  <body>
    <main class="container">

      <div class="row">
        <div class="col-12 text-center">
          <?php 
            if(isset($_GET['error'])){
              echo '<div class="alert alert-danger mt-2" role="alert">
                      <strong>Você não tem permissão para acessar nessa página!</strong> Você será redirecionado em <span id="number"></span>
                    </div>';
            }
          ?>
        </div>
        <div class="col-12 imagem-wrapper">
          <img src="../assets/images/error.svg" class="img-fluid mt-3" alt="Error 404">
        </div>
      </div>
 
    </main>
    
    <script>
      var n = 5;
      var l = document.getElementById("number");
      window.setInterval(function(){
        l.innerHTML = n;
        n--;
      },1000);

        setTimeout(function() {
            window.location.href = "../";
        }, 6000);
    </script>

      <!-- Bootstrap script js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
