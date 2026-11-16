<?php
$titulo = "Produtos - Bom Achado Variedades";

$arquivo = file_get_contents('dados/produtos.json');
$produtos = json_decode($arquivo, true);

include 'includes/menu.php';
?>

<main class="container mt-4">

    <h1>Nossos Produtos</h1>
    <p>Confira os produtos disponíveis em nossa loja.</p>

    <div class="row justify-content-center">

        <?php foreach ($produtos as $produto) { ?>

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
                            <strong>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></strong>
                        </p>

                        <p>
                            Estoque: <?php echo (int) $produto['estoque']; ?>
                        </p>

                        <a href="#" class="btn btn-primary mt-auto">
                            Tenho interesse
                        </a>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include 'includes/rodape.php'; ?>