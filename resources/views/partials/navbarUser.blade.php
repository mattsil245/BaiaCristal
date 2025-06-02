<style>
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropbtn {
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
    right: 0;
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

<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color:rgb(76, 184, 112) !important">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Baía Cristal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/produtos">Produtos</a></li>
      <!--   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Categorias</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
          </ul>
        </li> -->
        <li class="nav-item"><a class="nav-link" href="/contato">Contato</a></li>
      </ul>

      <!-- Área direita com carrinho e usuário -->
      <div class="d-flex align-items-center ms-2 me-4">
        <a href="/carrinho" class="text-dark me-3">
          <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
        </a>

        <div class="dropdown">
          <button class="dropbtn">
            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
          </button>
          <div id="myDropdown" class="dropdown-content">
            @if(session('usuario_logado'))
            <a href="{{ route('usuario.perfil') }}" class="dropdown-item px-3">
              {{ session('usuario_nome') }}
            </a>
              <a href="{{ route('usuario.logout') }}">Sair</a>
            @else
              <a data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
              <a href="/cadastro">Cadastro</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<script>
  const btn = document.querySelector('.dropbtn');
  const menu = document.querySelector('.dropdown-content');

  btn?.addEventListener('click', function (event) {
    event.stopPropagation();
    menu.classList.toggle('show');
  });

  document.addEventListener('click', function (event) {
    if (!menu.contains(event.target)) {
      menu.classList.remove('show');
    }
  });
</script>

<style>
.btn{
  background-color: #45a049;
  color: #FFF;
  font-weight: bold;
  width: 100%;
}
.btn:hover{
  color: #45a049;
  border: #45a049 solid 2px;
}

</style>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('usuario.login') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha:</label>
          <input type="password" name="password" class="form-control" id="senha" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </form>
  </div>
</div>
