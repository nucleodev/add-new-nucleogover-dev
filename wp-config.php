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
define( 'DB_NAME', 'nucleoGovNews' );

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
define( 'AUTH_KEY',         'VF2;>S&0L+B<<pfz*<AKslBI!Ajti)D-L>Ea~6m/qJ:y^R%1MWlx4%~3.i9++JrU' );
define( 'SECURE_AUTH_KEY',  '=RY@s>X22Lqx@W9YYh|~%uHGlWkki{0lAHeaG.%`Suj3/#j:z6(hv=$9=,=w3/##' );
define( 'LOGGED_IN_KEY',    'DWgGW[^sF&P_R4Z3VE%.?QFPF1.2o,m*-G=?b}.ySwU9&W35brD/a6b0#uFj1Z#x' );
define( 'NONCE_KEY',        ')0 (]L]N~qK{gS.a-Aun.dT!noC2oKPv&p6!IMU`Z(`)v6A,+OtIFrww#7%-L%JX' );
define( 'AUTH_SALT',        'QvlT]-MwccAcz 0<e>W>3&58D+tDP[ZATdF[m:_zz1n7&nV*)QomGPCJOz|V>M6b' );
define( 'SECURE_AUTH_SALT', 'dk:MkW]I,Cj ?&:>Wr.>*qUq A>h6o5-B`pphz1PPWBG]}#+bPqBW,Q1<Ts^--p*' );
define( 'LOGGED_IN_SALT',   '.eZ7fVMbAIjiz5.f7p#+e&LDT8^J744187ZS2+FTbYr3vHfd447kHVLy~@KX;uzr' );
define( 'NONCE_SALT',       'H5LgrPISc9jdr#_&>;0[f22[z:xE#,[C5A_UP,lPmHb!0bvw>*b4Y`pVjqd$ZWG<' );

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
