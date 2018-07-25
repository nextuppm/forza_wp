<? add_action('after_setup_theme', 'my_theme_setup');
	function my_theme_setup(){
		load_theme_textdomain('forzatheme', get_template_directory() . '/languages');
	}

	require_once( $_SERVER['DOCUMENT_ROOT'] . '/api-client/ApiClient/vendor/autoload.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/api-client/ApiClient/ApiClient.php' );
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/api-client/ApiClient/data/Constants.php' );

    require_once(TEMPLATEPATH . '/inc/user-api-fields.php');

	function clientinfo($userid) {
			$client                = new ApiClient();
			$clientinfo            = $client->getClientRepository()->getById($userid);
			return $clientinfo;
	}

	function get_client_id($userid) {
			$client                = new ApiClient();
			$clientinfo            = $client->getClientRepository()->getById($userid);

            if($clientinfo == NULL) {
				return false;
			}  else {
				return $clientinfo->ClientID;
			}
	}

    function CreateClient($u_first_name, $u_last_name, $u_jmbg, $u_private_card, $u_phone,$u_email) {

	$client                 = new ApiClient();
	$client_id              = $client->getClientRepository()->create(
		[
			"Firstname"    => $u_first_name,
			"Lastname"     => $u_last_name,
			"RegDocuments" => [
				[
					'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['Jmbg'],
					'DocNumber' => $u_jmbg,
				],
				[
					'DocTypeID' => Constants::CONSTANTS['RegDocumentType']['IdCard'],
					'DocNumber' => $u_private_card,
				]
			],
			"Communications" => [
				[
					"CommContactPerson" => "",
					"CommTypeID"   => Constants::CONSTANTS['ClientCommunicationType']['Email'],
					"CommTypeName" => "Email",
					"CommValue"    => $u_email,
					"Confirmed"    => false,
				],
				[
					"CommContactPerson" => "",
					"CommTypeID"   => Constants::CONSTANTS['ClientCommunicationType']['Phone'],
					"CommTypeName" => "Mobile",
					"CommValue"    => $u_phone,
					"Confirmed"    => false,
				]
			]
		]
	);
	return $client_id;
	}



 function CreateLoanApplication($client_id, $u_loan_amount, $u_loan_days) {
    $client                   = new ApiClient();
    $loan_id                  = $client->getLoanApplicationRepository()->create(
		[
			"ClientID"        => $client_id,
			"SigningMethodID" => Constants::CONSTANTS['SigningMethod']['PersonalSigning'],
			"ProductID"       => "b9bbad91-3e0c-413d-bdd2-c60e2da85c25", //TODO replace with received from calculator value
			"Parameters"      => [
				[
					"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['Amount'],
					"LoanApplicationParameterValue" => $u_loan_amount,
				],
				[
					"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['NumberOfDays'],
					"LoanApplicationParameterValue" => $u_loan_days,
				],
			]
		]
	);
	return $loan_id;
  }


    remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	add_action( 'after_setup_theme', 'register_my_menus' );
	function register_my_menus() {
		register_nav_menus( array(
			'topmenu'              => __( 'Top menu',  'forzatheme' ),
			'footermenu_1'         => __( 'Footer menu pos.1',  'forzatheme' ),
			'footermenu_2'         => __( 'Footer menu pos.2',  'forzatheme' ),
			'mobilemainmenu'       => __( 'Mobile main menu',  'forzatheme' ),
			'mobileapplaymenu'     => __( 'Mobile apply menu',  'forzatheme' ),
			'dashboardmenu'        => __( 'Menu for user dashboard',  'forzatheme' ),
		) );
	}

add_action( 'wp_enqueue_scripts', 'my_scripts_method', 99 );
function my_scripts_method() {
	// получаем версию jQuery
	wp_enqueue_script( 'jquery' );
	// для версий WP меньше 3.6 'jquery' нужно поменять на 'jquery-core'
	$wp_jquery_ver = $GLOBALS['wp_scripts']->registered['jquery']->ver;
	$jquery_ver = $wp_jquery_ver == '' ? '3.3.1' : $wp_jquery_ver;

	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js' , array(), null, true);
	wp_enqueue_script( 'jquery' );
}

function wpb_widgets_init() {

	register_sidebar( array(
		'name' => __( 'lang'),
		'id' => 'f1',
		'description' => __( '' ),
		'class' => 'abc',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );




	}

add_action( 'widgets_init', 'wpb_widgets_init' );



class fluent_themes_custom_walker_nav_menu extends Walker_Nav_Menu {

private $blog_sidebar_pos = "";
// add classes to ul sub-menus
function start_lvl( &$output, $depth = 0, $args = Array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'dropdown-menu',
        ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
        ( $display_depth >=2 ? '' : '' ),
        'menu-depth-' . $display_depth
        );
    $class_names = implode( ' ', $classes );

    // build html

    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}

// add main/sub classes to li's and links
 function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
    global $wp_query, $wpdb;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? '' : '' ), //class for the top level menu which got sub-menu
        ( $depth >=1 ? '' : 'dropdown' ), //class for the level-1 sub-menu which got level-2 sub-menu
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ), //class for the level-2 sub-menu which got level-3 sub-menu
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    //$attributes .= ' class="' . ( $depth > 0 ? '' : '' ) . '"';

    // Check if menu item is in main menu
    $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
                            FROM wp_postmeta
                            WHERE meta_key='_menu_item_menu_item_parent'
                            AND meta_value='".$item->ID."'");

    if ( $depth == 0 && $has_children > 0  ) {
        // These lines adds your custom class and attribute
        $attributes .= ' class="dropdown-toggle"';
        $attributes .= ' data-toggle="dropdown"';
        $attributes .= ' data-hover="dropdown"';
        $attributes .= ' data-animations="fadeInUp"';
    }
    $description  = ! empty( $item->description ) ? '<i class="fa '.esc_attr( $item->description ).'" aria-hidden="true"></i>' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $description.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; //If you want the description to be output after <a>
    //$item_output .= $description.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after; //If you want the description to be output before </a>

    // Add the caret if menu level is 0
    if ( $depth == 0 && $has_children > 0  ) {
        $item_output .= ' &nbsp;<i class="fa fa-caret-down"></i>';
    }

    $item_output .= '</a>';
    $item_output .= $args->after;

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
}
} //End Walker_Nav_Menu
