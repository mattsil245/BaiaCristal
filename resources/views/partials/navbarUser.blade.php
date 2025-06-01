<style>
    .dropdown {
    position: relative;
    display: inline-block;
  }

   .dropbtn{
    background-color: transparent;
    padding: 10px;
    font-size: 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
.dropdown-content {
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease;
    position: absolute;
    top: 100%;
    right: 0; /* Alinha à direita do botão */
    background-color: #FFF;
    min-width: 120px;
    box-shadow: 0px 8px 8px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 5px;
}


  .dropdown-content a {
    color: black;
    padding: 10px 12px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }
.dropdown-content.show {
  opacity: 1;
  visibility: visible;
}

</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #13BAB2 !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Baía Cristal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="produtos">Produtos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato">Contato</a>
        </li>
      </ul>

      <!-- Barra de pesquisa maior e centralizada -->
      <!-- <form class="d-flex mx-auto" style="max-width: 700px; width: 100%;" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->

      <!-- Ícones de Carrinho e Usuário com ajustes nas margens -->
      <div class="d-flex align-items-center ms-2 me-4">
        <!-- Ícone de Carrinho com menos margem à direita -->
        <a href="#" class="text-dark me-3">
          <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
        </a>
        <!-- Ícone de Usuário com menos margem à esquerda -->
         <div class="dropdown">
        <button class="dropbtn">
          <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
        </button>

        <div id="myDropdown" class="dropdown-content">
        <a onclick="modal" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
        <a href="cadastro">Cadastro</a>
      </div>
      </div>
      </div>
    </div>
  </div>
</nav>


<script>
  const btn = document.querySelector('.dropbtn');
  const menu = document.querySelector('.dropdown-content');

  btn.addEventListener('click', function(event) {
    event.stopPropagation();
    menu.classList.toggle('show');
  });

  document.addEventListener('click', function(event) {
    if (!menu.contains(event.target)) {
      menu.classList.remove('show');
    }
  });
</script>

<style>

</style>


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha">
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div>