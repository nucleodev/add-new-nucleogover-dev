<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'site hora news' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Dd{#Ys9L2txT)vnV-3MpUR,<T-[2DhFNDwq[(pZsovtvK`9n<Ya[vGE*l<`IFUq`' );
define( 'SECURE_AUTH_KEY',  ',yl(N^wfdJw^[uhsfjX4A;qTes@Y@o+NxSShhoM-`P#9VB endOS>-+;(II8|s^d' );
define( 'LOGGED_IN_KEY',    '<Y@J#BCYhoD~^e{MG~JKoR~r`Yk&y4!Gv3u6JS[lfkuU5>)yPX=~0)o*QE~|F}Gg' );
define( 'NONCE_KEY',        'rC=lX#$Z8LJeQ|x#%3Lfk{+d9Rq *6}V`0Q:lyx14t?ORQLN=:*QKw7H;Lw=^n%&' );
define( 'AUTH_SALT',        '}*03az|LYmd_p$l=WrBY6JM{=:qLh``SuL`NQ: ii,X9cKCF/4i&L@vm&jao2aK?' );
define( 'SECURE_AUTH_SALT', '+wE#)}[oXdm4-/NF#cTd~*VW]pXnYkf)NC_DdmEH/ 19i,/X#qT(K-h_2),fXfR6' );
define( 'LOGGED_IN_SALT',   '6~v1HfxQce 0/=}9K!?6gK$zAeOFMp9lM&sL5eWVnraPkgXv_El}D:=@d_b}U^Ea' );
define( 'NONCE_SALT',       'l[!>@AJ#T%Oe7|p5Xb2HyRpg~M(2.0FxzcIV2k8.,IZPd,JN@dQ_&oLuD)rLc;74' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
