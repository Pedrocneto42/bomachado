
<?php
$titulo = "Bom Achado Variedades";

// Lê os produtos cadastrados no JSON
$arquivo = file_get_contents('dados/produtos.json');
$produtos = json_decode($arquivo, true);

// Inclui o menu
include 'includes/menu.php';
?>

<main class="container mt-4 mb-5">


    

<!-- Carrossel da página inicial -->
<div id="carouselLoja"
     class="carousel slide mb-5"
     data-bs-ride="carousel">

    <div class="carousel-inner rounded">

        <!-- Banner 1 -->
        <div class="carousel-item active">
            <img src="img/banners/banner1.png"
                 class="d-block w-100"
                 alt="Produtos de papelaria">
        </div>

        <!-- Banner 2 -->
        <div class="carousel-item">
            <img src="img/banners/banner2.png"
                 class="d-block w-100"
                 alt="Presentes e variedades">
        </div>

        <!-- Banner 3 -->
        <div class="carousel-item">
            <img src="img/banners/banner3.png"
                 class="d-block w-100"
                 alt="Utilidades domésticas">
        </div>

    </div>

    <!-- Conteúdo fixo sobre o carrossel -->
    <div class="conteudo-banner text-center">

        <h1>Bem-vindo à Bom Achado Variedades!</h1>

        <p class="lead mt-3">
            Encontre produtos de papelaria, utilidades
            e presentes em um só lugar.
        </p>

        <p>
            Confira nossos produtos, preços e disponibilidade
            de forma simples e rápida.
        </p>

        <a href="produtos.php" class="btn btn-primary mt-3">
            Conhecer nossos produtos
        </a>

    </div>

</div>


</div>


    </div>


    <!-- Produtos em destaque -->
    <section class="mt-5">

        <h2 class="mb-4">Produtos em destaque</h2>

        <div class="row justify-content-center">

            <?php foreach (array_slice($produtos, 0, 3) as $produto) { ?>

                <div class="col-md-4 col-lg-3 mb-4">

                    <div class="card h-100">

                        <img
                            src="<?php echo htmlspecialchars($produto['imagem']); ?>"
                            class="card-img-top"
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                        >

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo htmlspecialchars($produto['nome']); ?>
                            </h5>

                            <p class="card-text">
                                <?php echo htmlspecialchars($produto['descricao']); ?>
                            </p>

                            <p>
                                <strong>
                                    R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                                </strong>
                            </p>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

        <div class="text-center mt-3">

            <a href="produtos.php" class="btn btn-outline-primary">
                Ver todos os produtos
            </a>

        </div>

    </section>

    <!-- Informações da loja -->
    <section class="text-center mt-5">

        <h2>Conheça nossa loja</h2>

        <p class="mt-3">
            A Bom Achado Variedades oferece uma vitrine digital
            para facilitar a consulta dos produtos disponíveis.
        </p>

        <a href="sobre.php" class="btn btn-primary">
            Saiba mais
        </a>

    </section>

</main>

<?php include 'includes/rodape.php'; ?>
