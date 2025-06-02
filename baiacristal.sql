-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/06/2025 às 16:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `baiacristal`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `nome`, `login`, `senha`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Admin Master', 'admin', '$2y$10$o5BJRFvotVATwvH7I8oDqOIgMjQ1nOMavYSowoAhqHCWIbFOqYw7y', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `comentario` varchar(512) NOT NULL,
  `nota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 'Hambúrguer', '2025-06-02 13:55:54', '2025-06-02 13:55:54'),
(2, 'Bebida', '2025-06-02 13:56:00', '2025-06-02 13:56:00'),
(3, 'Acompanhamento', '2025-06-02 13:56:09', '2025-06-02 13:56:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario_produto`
--

CREATE TABLE `comentario_produto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_comentario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `mensagem` varchar(800) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `assunto`, `mensagem`, `created_at`, `updated_at`) VALUES
(1, 'Mateus', 'mateus@email.com', 'Adição de produto', 'Gostaria da inclusão do hamburguer vegano, feito com carne de soja no cardápio', '2025-06-02 13:46:42', '2025-06-02 13:46:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `qtd` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2025_03_10_003118_create_categorias_table', 1),
(22, '2025_03_10_003150_create_pedidos_table', 1),
(23, '2025_03_10_003200_create_produtos_table', 1),
(24, '2025_03_10_003209_create_comentarios_table', 1),
(25, '2025_03_10_003218_create_comentario_produto_table', 1),
(26, '2025_03_10_003228_create_favoritos_table', 1),
(27, '2025_03_10_003237_create_avaliacoes_table', 1),
(28, '2025_03_10_003246_create_itens_pedido_table', 1),
(29, '2025_03_10_003256_create_contato_table', 1),
(30, '2025_03_10_003314_create_admin_table', 1),
(31, '2025_03_10_003343_create_pagamento_table', 1),
(32, '2025_03_10_011926_add_columns_to_users_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_pedido` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `id_categoria`, `preco`, `desc`, `imagem`, `status`, `created_at`, `updated_at`) VALUES
(1, 'X-Tudo', 1, 24.90, 'Pão brioche, hambúrguer artesanal 180g, queijo, presunto, ovo, bacon, alface, tomate e maionese da casa.', '1748872595.jpg', 1, '2025-06-02 13:56:35', '2025-06-02 13:56:35'),
(2, 'Smash Bacon', 1, 18.50, 'Duplo smash 100g, queijo prato, bacon crocante, pão com gergelim e molho especial.', '1748872619.jpg', 1, '2025-06-02 13:56:59', '2025-06-02 13:56:59'),
(3, 'Veggie Burger', 1, 22.00, 'Hambúrguer de grão de bico, alface, tomate, cebola roxa e molho vegano.', '1748872641.jpg', 1, '2025-06-02 13:57:21', '2025-06-02 13:57:21'),
(4, 'Coca-Cola Lata 350ml', 2, 5.00, 'Refrigerante tradicional, gelado.', '1748872824.jpg', 1, '2025-06-02 14:00:24', '2025-06-02 14:00:24'),
(5, 'Suco Natural de Laranja', 2, 7.00, 'Suco feito na hora com laranjas frescas.', '1748872862.png', 1, '2025-06-02 14:01:02', '2025-06-02 14:01:02'),
(6, 'Milkshake Chocolate', 2, 12.90, 'Milkshake cremoso de chocolate com cobertura e chantilly.', '1748872882.png', 1, '2025-06-02 14:01:22', '2025-06-02 14:01:22'),
(7, 'Batata Frita Média', 3, 8.00, 'Batata frita crocante, porção média.', '1748873418.jpg', 1, '2025-06-02 14:10:18', '2025-06-02 14:10:18'),
(8, 'Onion Rings', 3, 10.00, 'Anéis de cebola empanados e crocantes.', '1748873443.webp', 1, '2025-06-02 14:10:43', '2025-06-02 14:10:43'),
(9, 'Nuggets de Frango', 3, 9.50, 'Porção com 8 unidades de nuggets empanados.', '1748873466.webp', 1, '2025-06-02 14:11:06', '2025-06-02 14:11:06'),
(10, 'Cheddar Fritas', 3, 12.00, 'Batata frita coberta com cheddar cremoso e bacon crocante.', '1748873483.jpg', 1, '2025-06-02 14:11:23', '2025-06-02 14:11:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `data_nasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `tel`, `data_nasc`) VALUES
(1, 'Mateus', 'mateus@email.com', NULL, '$2y$10$HABTXV7qC0U/ffcFsFGG7O1kJ7Y/9PkhhBP0h1kivh7w4V.755qI6', NULL, '2025-06-02 13:07:33', '2025-06-02 13:07:33', '(11) 91337-4654', '2006-05-24'),
(2, 'aaaaaaaaaaaaaaa', 'a@a.com', NULL, '$2y$10$HABTXV7qC0U/ffcFsFGG7O1kJ7Y/9PkhhBP0h1kivh7w4V.755qI6', NULL, '2025-06-02 13:27:17', '2025-06-02 13:27:17', '(11) 11111-1111', '2025-06-02');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_login_unique` (`login`);

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avaliacoes_id_pedido_foreign` (`id_pedido`),
  ADD KEY `avaliacoes_id_user_foreign` (`id_user`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentario_produto`
--
ALTER TABLE `comentario_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_produto_id_produto_foreign` (`id_produto`),
  ADD KEY `comentario_produto_id_user_foreign` (`id_user`),
  ADD KEY `comentario_produto_id_comentario_foreign` (`id_comentario`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favoritos_id_produto_foreign` (`id_produto`),
  ADD KEY `favoritos_id_user_foreign` (`id_user`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itens_pedido_id_pedido_foreign` (`id_pedido`),
  ADD KEY `itens_pedido_id_produto_foreign` (`id_produto`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagamento_id_pedido_foreign` (`id_pedido`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id_user_foreign` (`id_user`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_id_categoria_foreign` (`id_categoria`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_tel_unique` (`tel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario_produto`
--
ALTER TABLE `comentario_produto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `avaliacoes_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `comentario_produto`
--
ALTER TABLE `comentario_produto`
  ADD CONSTRAINT `comentario_produto_id_comentario_foreign` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `comentario_produto_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `comentario_produto_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `favoritos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `itens_pedido_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
