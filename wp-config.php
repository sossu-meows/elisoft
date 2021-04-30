<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'wordpress' );

/** Username của database */
define( 'DB_USER', 'eli' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '123456' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'm4Bo:/76QCZVgY[X@u7R5v%jf/D,F4y~%4(./,`Qer+un8-kR{!Ny*X[4r10vt]|' );
define( 'SECURE_AUTH_KEY',  '>75UQza9J 9hux|-R&|hNhL._>XifI4j}sb/LW!Pn;U:qQIKRAwwQ] 7&9tnLyoW' );
define( 'LOGGED_IN_KEY',    'djMIyF!?!O]8)EhT,JgH]0yT_, - :}u.;AZ!4H.vIQW0jUuoIid7A*w(wNwUB8y' );
define( 'NONCE_KEY',        '<b{A3zgiao;#0NpUav-X @{pWu~`*GcSv@WJgP,[N2l<qFZ=1Zu1@r,(j2~R> 9/' );
define( 'AUTH_SALT',        'q]}.3G;])5Hh|kJ@M}|NLSeitp{GNG:~C:9Oe5r]_d$Zuz`/F6A)piREEeS~SE_d' );
define( 'SECURE_AUTH_SALT', 'BM0^Ka$7o,Yfe*bjXKb@mv84Ls[1KtQr6A:MgJ0nYT[Rw{, eW#;+J%@MwsD?~0X' );
define( 'LOGGED_IN_SALT',   'X75S[$TmXCGEF7[b ;Cwr>BU6^#[L<HqWoG(?7G<4f?4~q)K!qLXd2(BK5mj6K;/' );
define( 'NONCE_SALT',       'FWJ%S}Smfb(Pj]a<Pl_e$CmUfbOjgCPH8,Y=%h},{xfc-z}`/z8TT&{%m~B(V+Ft' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
