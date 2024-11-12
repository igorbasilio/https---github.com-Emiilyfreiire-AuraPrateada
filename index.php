<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="Visao/CSS/estilo.css">
    <link rel="shortcut icon" href="Visao/imagem/logo.ico" type="image/x-icon">
    <title>Aura Prateada</title>
</head>
<body>
        <header>
            <div class="logo">
                <h1>Aura Prateada</h1>
            </div>
            <nav class="main-nav">
                <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="Braceletes.php">Braceletes</a></li>
                <li><a href="Aneis.php">Anéis</a></li>
                <li><a href="Colares.php">Colares</a></li>
                <li><a href="Brincos.php">Brincos</a></li>
                </ul>
            </nav>
            <div class="auth-cart-container">
                <div class="auth-buttons">
                    <a href="logincad.php" class="link">Login/Cadastro</a>
                </div>
                <div class="cart">
                    <a href="carrinho.php" class="cart-link">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
        </header>
        <main>
        <section class="promo">
            <h2>GANHE UM BRACELETE GRÁTIS</h2>
            <p>Nas suas compras a partir de R$899,00</p>
            <a href="#" class="btn">Compre Agora</a>
        </section>
        <section class="produtos">
            <h2>Produtos em Destaque</h2>
            <div class="produtos-grid">
                <div class="produto">
                    <img src="Visao/imagem/Bracelete1.png" alt="Bracelete de prata">
                    <p>Bracelete de Prata - R$299</p>
                    <button class="btn add-carrinho" onclick="adicionarAoCarrinho('Bracelete de Prata', 299, 'Visao/imagem/Bracelete1.png')">Adicionar ao Carrinho</button>
                    </div>
                <div class="produto">
                    <img src="Visao/imagem/Anel1.png" alt="Anel de prata">
                    <p>Anel de Prata - R$199</p>
                    <button class="btn add-carrinho" onclick="adicionarAoCarrinho('Anel de Prata', 199, 'Visao/imagem/Anel1.png')">Adicionar ao Carrinho</button>
                    </div>
                <div class="produto">
                    <img src="Visao/imagem/Colar1.png" alt="Colar de prata">
                    <p>Colar de Prata - R$399</p>
                    <button class="btn add-carrinho" onclick="adicionarAoCarrinho('Colar de Prata', 399, 'Visao/imagem/Colar1.png')">Adicionar ao Carrinho</button>
                    </div>
                <div class="produto">
                    <img src="Visao/imagem/Brinco1.png" alt="Brincos de prata">
                    <p>Brincos de Prata - R$149</p>
                    <button class="btn add-carrinho" onclick="adicionarAoCarrinho('Brincos de Prata', 149, 'Visao/imagem/Brinco1.png')">Adicionar ao Carrinho</button>
                    </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Loja de Joias. Todos os direitos reservados.</p>
    </footer>
    <script src="Modelo/JavaScript.js"></script>
    <script src="Modelo/carrinho.js"></script>
</body>
</html>
