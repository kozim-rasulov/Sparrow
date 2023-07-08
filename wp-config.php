<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'T~9joUg8Zrpn}IyFiRj[.~xO:G>Vw.&LJ|fvnVIlfjA0on}el$t-RTkA1j@`5VxW' );
define( 'SECURE_AUTH_KEY',  '^Zw^/dh2+8T^<AwI_4:01$_zf7lgi`=4l+L:b&pSC#@^ysL@i^^iU:~&YHH?<HQ,' );
define( 'LOGGED_IN_KEY',    ']u`(%O)A{n%euKSXdPrs8%G1T=gm3Wzs,.O=UI.(#E)*Gt;LHr%7Y3F2PgSJGlN/' );
define( 'NONCE_KEY',        'OZizQ;}%5MZ/kZ?u0qc>Qokd3m*X>raddmQMeR? B09*L,WBk0n^w/0:^Qs0_SK~' );
define( 'AUTH_SALT',        'm5cEMWz$0V JAcA$$d|rOM9{S~U? P/nwW=$x:#&a4#^oU_S`*#Oya_Q[bM[qEyz' );
define( 'SECURE_AUTH_SALT', '{Y!hF?<)V6 fa^]=,Ut;E`Se<3ds#!N<|l],d:s(_-Xo}?+kf`x,4fzC$Q6 /Zw*' );
define( 'LOGGED_IN_SALT',   'v|[W!c^2jU~zQMOS6:f1-`/Muolz!m:n3y[vCF{TH5W0RiB3+S<eP0^XVI7+)U54' );
define( 'NONCE_SALT',       'r8<Knu;}/&URp^nUy*}9 -$&I`}x`]OeeT.D|`FMb<dV]FVtngg3O~GAFTxSHv~M' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'en_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
