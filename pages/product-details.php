<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BoredApe Store</title>



  <!-- Bootstrap Style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Reset Style -->
  <link rel="stylesheet" href="../assets/css/reset.css">
  <!-- Icon Style -->
  <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>

  <style>
    nav{
      box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
    }

    .details-wrapper h5, 
    .details-wrapper h2, .favorites{
      width: 100%;
    }

    .grid-container{
      display: grid;
      grid-template-columns: 40% auto auto;
      grid-template-rows: auto 1fr auto;
      grid-template-areas:"a b b"
                          "a c c";	
      grid-gap: 1em;
/*       background-color: #2196F3; */
      padding: 10px;
    }

    .grid-container > .card-wrapper{
      grid-area: a;
    }
    .grid-container > .details-wrapper{
      grid-area: b;
    }
    .grid-container > .price-wrapper{
      grid-area: c;
    }

    @media screen and (max-width: 480px){
      .grid-container{
        grid-template-columns: repeat(3, 1fr);
        grid-template-areas:"b b b"
                            "a a a"
                            "c c c";
      }
    }

  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="../">
        <i class="fa-brands fa-ethereum" style="font-size: 32px; color: #ffb528;"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav py-1">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Product Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Entrar/Cadastrar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container-fluid my-md-5 my-4 grid-container">
      <div class="card-wrapper">
        <div class="border" style="border-radius: 10px;">
          <div class="card-title-wrapper d-flex justify-content-between p-2">
            <i class="fa-brands fa-ethereum" style="font-size: 16px; color: #ccc;"></i>
            <span style="color: #ccc;">
            <i class="fa-solid fa-heart"></i>
              68
            </span>
          </div>
            <img src="../assets/images/1.png" class="img-fluid" alt="boredape-1">
        </div>
      </div>
      <div class="details-wrapper p-md-3 px-3">
        <h5 class="my-2">Title site</h5>
        <h2 class="my-3">Title Product</h2>
        <div class="favorites d-flex my-2">
          <p>
            <i class="fa-solid fa-heart"></i>
            68 favoritos
          </p>
        </div>
      </div>
      <div class="price-wrapper">
        <div class="card">
          <div class="card-wrapper m-3 d-flex flex-column">
              <p class="fw-lighter">Current price</p>
                <div class="price-content d-flex">
                  <p class="fw-bold" style="font-size: 32px;">
                  <i class="fa-brands fa-ethereum" style="font-size: 24px;"></i> 
                    0,05
                  <span style="font-size: 16px;">($142,67)</span>
                  </p>
                </div>
              <button class="btn btn-primary col-xs-10 col-md-4">Compre Agora</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>