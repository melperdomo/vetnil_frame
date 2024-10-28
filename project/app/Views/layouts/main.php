<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vetnil</title>
  <link rel="stylesheet" href="/css/layout.css" />
</head>

<body>
  <header>

    <div class="menu-content">

      <div class="menu-left-header">
        <a class="menu-item" id="">Como Participar</a>
        <a class="menu-item" id="">Prêmios</a>
        <a class="menu-item" id="">Produtos Participantes</a>
      </div>

      <div class="menu-central-header">
        <img
          class="item-logo"
          id="logo-home"
          src="/images/images-home/2021-logo-vetnil-M.png"
          alt="logo sorte a mil com vetnil" />
      </div>

      <div class="saudacao">
          <p class="saudacao-usuario">Olá, Walter!</p>
          <p class="saudacao-id">ID: 123456</p>
        </div>

      <div class="menu-right-header">
        <a href=""><img src="/images/images-home/user-circle.png" alt=""></a>
        <a href=""><img src="/images/images-home/bell.png" alt=""></a>
        <a href=""><img src="/images/images-home/bars.png" alt=""></a>
      </div>
    </div>

    </div>
  </header>

  <main>

    <div class="ferraduras">

      <img
        class="ferradura-esquerda"
        name="ferradura-esquerda"
        id="iferradura-esquerda"
        src="/images/images-home/2021-elementos-coloridos-vetnil.png"
        alt="ferradura-vetnil" />

      <img
        class="ferradura-direita"
        name="ferradura-direita"
        id="iferradura-direita"
        src="/images/images-home/2021-elementos-coloridos-vetnil.png"
        alt="ferradura-vetnil" />

    </div>

    <?php include $view_content; ?>

    <!-- <div class="main-como-participar">
        <div>
          <svg
          xmlns="file:///C:/Users/Melissa%20Perdomo/Documents/front_end/vetnil/images/images-home/receipt.svg"
        ></svg>
        
          <p>Cadastres suas vendas através da nota fiscal.</p>
        </div>

        <p> A cada venda efetuada, você ganha uma raspadinha para concorrer a prêmios instantâneos.</p>

        <p>Cada raspadinha dá direito a um número da sorte!</p>
      </div> -->

  </main>

  <footer>

    <div class="footer-content">

      <div class="footer-left-logo">
        <img class="item-logo"
          src="/images/images-home/2021-logo-vetnil-M.png"
          alt="sorte-a-mil-com-vetnil" />
      </div>

      <div class="footer-central">
        <a class="btn-regras" id="">Como Participar</a>
        <a class="btn-premios" id="">Prêmios</a>
        <a class="btn-usuario" id="">Minha Conta</a>
        <a class="btn-vendas" id="">Minhas Vendas</a>
      </div>

      <div class="footer-right">
        <a class="btn-produtos" id=""> Produtos Participantes </a>
        <a class="btn-raspadinhas" id="">Raspadinhas</a>
        <a class="btn-regulamento" id="">Regulamento</a>
        <a class="btn-ajuda" id="">Fale Conosco</a>
      </div>

    </div>

  </footer>
</body>

</html>