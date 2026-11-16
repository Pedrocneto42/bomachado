
<?php
$titulo = "Produtos - Bom Achado Variedades";

// Número do WhatsApp da loja
$whatsapp = "";

// Lê os produtos cadastrados no JSON
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
                            <strong>
                                R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?>
                            </strong>
                        </p>

                        <!-- Verificação do estoque -->
                        <?php if ($produto['estoque'] > 0) { ?>

                            <p>
                                Estoque: <?php echo (int) $produto['estoque']; ?>
                            </p>

                            <p class="text-success">
                                <strong>Disponível</strong>
                            </p>

                        <?php } else { ?>

                            <p class="text-danger">
                                <strong>Produto esgotado</strong>
                            </p>

                        <?php } ?>

                        <!-- Botão de interesse -->
                        <?php
                        $mensagem = "Olá! Tenho interesse no produto: " . $produto['nome'];

                        $linkWhatsapp = "https://wa.me/" . $whatsapp .
                                        "?text=" . urlencode($mensagem);
                        ?>

                        <?php if ($produto['estoque'] <= 0) { ?>

                            <button class="btn btn-secondary mt-auto" disabled>
                                Produto esgotado
                            </button>

                        <?php } elseif (!empty($whatsapp)) { ?>

                            <a href="<?php echo htmlspecialchars($linkWhatsapp); ?>"
                               class="btn btn-primary mt-auto"
                               target="_blank"
                               rel="noopener noreferrer">
                                Tenho interesse
                            </a>

                        <?php } else { ?>

                            <button class="btn btn-primary mt-auto" disabled>
                                Tenho interesse
                            </button>

                        <?php } ?>

                    </div>

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include 'includes/rodape.php'; ?>
