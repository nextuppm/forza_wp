<? add_action('after_setup_theme', 'my_theme_setup');
	function my_theme_setup(){
		load_theme_textdomain('forzatheme', get_template_directory() . '/languages');
	}
//TODO remove '/forza'
	require_once(ABSPATH . '/api-client/ApiClient/vendor/autoload.php' );
	require_once(ABSPATH . '/api-client/ApiClient/ApiClient.php' );
	require_once(ABSPATH . '/api-client/ApiClient/data/Constants.php' );


    require_once(TEMPLATEPATH . '/inc/user-api-fields.php');

	function clientinfo($userid) {
			$client                = new ApiClient();
			$clientinfo            = $client->getClientRepository()->getById($userid);
			return $clientinfo;
	}

    function offerinfo($clientId, $url) {
			$client                = new ApiClient();
			$offerinfo            = $client->getProductRepository()->getOffers($clientId, $url);
			return $offerinfo;
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



	function CreateLoanApplication($client_id, $product_id, $amount, $days, $amount_to_pay, $apr, $fee_amount, $interest_amount, $due_date, $spec_offer_id) {
		$client                   = new ApiClient();
		$loan_id                  = $client->getLoanApplicationRepository()->create(
			[
				"ClientID"        => $client_id,
				"LoanApplicationStatusID" => Constants::CONSTANTS['ApplicationStatus']['PreCreated'],
				"ProductID"       => $product_id,
				"SpecOfferID" => $spec_offer_id,
				"Parameters"      => [
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['Amount'],
						"LoanApplicationParameterValue" => $amount,
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['NumberOfDays'],
						"LoanApplicationParameterValue" => $days,
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['DueDate'],
						"LoanApplicationParameterValue" => $due_date, //"30.12.2018 00:00:00"
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['InterestAmount'],
						"LoanApplicationParameterValue" => $interest_amount,
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['FeeAmount'],
						"LoanApplicationParameterValue" => $fee_amount,
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['AmountToPay'],
						"LoanApplicationParameterValue" => $amount_to_pay,
					],
					[
						"LoanApplicationParameterID" => Constants::CONSTANTS['LoanApplicationParameter']['Apr'],
						"LoanApplicationParameterValue" => $apr,
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

	wp_localize_script( 'jquery', 'ajaxdata', array(	'url' => admin_url('admin-ajax.php')));

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

add_action( 'wp_ajax_nopriv_get_bulk_ajax', 'get_bulk_ajax' );
add_action( 'wp_ajax_get_bulk_ajax', 'get_bulk_ajax');
function get_bulk_ajax() {
    session_start();
    $path = fs_get_wp_config_path();
    require_once( $path . '/wp-content/themes/forzatheme/includes/BulkHelper.php' );
    //crm_client
    $client_id = null;
    $ses = $_SESSION;
    if(isset($_SESSION['crm_client']->ClientID) && !empty($_SESSION['crm_client']->ClientID))
    {
        $client_id = $_SESSION['crm_client']->ClientID;
    }
    $data = BulkHelper::GetBulkForUser(null,null,$client_id);
	echo json_encode($data);
	die();
}

function fs_get_wp_config_path()
{
    $base = dirname(__FILE__);
    $path = false;

    if (@file_exists(dirname(dirname($base))."/wp-config.php"))
    {
        $path = dirname(dirname($base));
    }
    else
    if (@file_exists(dirname(dirname(dirname($base)))."/wp-config.php"))
    {
        $path = dirname(dirname(dirname($base)));
    }
    else
    $path = false;

    if ($path != false)
    {
        $path = str_replace("\\", "/", $path);
    }
    return $path;
}

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


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_site-options',
		'title' => 'Site Options',
		'fields' => array (
			array (
				'key' => 'field_5b5b07dacd73c',
				'label' => 'cacheExperation',
				'name' => 'cacheexperation',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array (
				'key' => 'field_5b4ca22a3b7ef',
				'label' => 'Top logo',
				'name' => 'top_logo',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5b4ca2393b7f0',
				'label' => 'Bottom logo',
				'name' => 'bottom_logo',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5b4ca2d13b7f4',
				'label' => 'Call Us',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_5b4ca25e3b7f1',
				'label' => 'Contact phone',
				'name' => 'contact_phone',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4ca2693b7f2',
				'label' => 'Contact WhatsApp',
				'name' => 'contact_whatsapp',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4ca2dc3b7f5',
				'label' => 'Office Hours',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_5b4ca3133b7f7',
				'label' => 'Mon-Fr',
				'name' => 'contact_mon-fr',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4ca32c3b7f8',
				'label' => 'Sat',
				'name' => 'contact_sat',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4ca2f83b7f6',
				'label' => 'Get in Touch',
				'name' => '',
				'type' => 'message',
				'message' => '',
			),
			array (
				'key' => 'field_5b4ca2ba3b7f3',
				'label' => 'Contact email',
				'name' => 'contact_email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_5b4ca34d3b7f9',
				'label' => 'Office Hours modal',
				'name' => 'office_hours_modal',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b4ca3793b7fb',
						'label' => 'Day',
						'name' => 'office_hours_modal_day',
						'type' => 'text',
						'column_width' => 50,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b4ca3893b7fc',
						'label' => 'Hours open',
						'name' => 'office_hours_modal_hours',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b4eff9156317',
						'label' => 'Hours close',
						'name' => 'office_hours_modal_close',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => 7,
				'layout' => 'table',
				'button_label' => 'Add day',
			),
			array (
				'key' => 'field_5b4f0e5bc232a',
				'label' => 'Need some help block',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5b4f0e9bc232b',
				'label' => 'Need some help block title',
				'name' => 'need_some_help_block_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4f0eb8c232c',
				'label' => 'Need some help block text',
				'name' => 'need_some_help_text',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 3,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5b4f0efbc232e',
				'label' => 'Did you know block',
				'name' => '',
				'type' => 'tab',
			),
			array (
				'key' => 'field_5b4f0f12c232f',
				'label' => 'Did you know block title',
				'name' => 'did_you_know_block_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4f0f24c2330',
				'label' => 'Did you know block text',
				'name' => 'did_you_know_block_text',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 3,
				'formatting' => 'html',
			),
			array (
				'key' => 'field_5b4f0fe3c2334',
				'label' => 'Did you know block button code',
				'name' => 'did_you_know_block_button_code',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5b4f0f35c2331',
				'label' => 'Did you know block background image',
				'name' => 'did_you_know_block_background_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5b4f0f60c2332',
				'label' => 'Did you know block left imgs',
				'name' => 'did_you_know_block_left_imgs',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5b4f0fa8c2333',
						'label' => 'Did you know block left img',
						'name' => 'did_you_know_block_left_img',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'medium',
						'library' => 'all',
					),
				),
				'row_min' => '',
				'row_limit' => 2,
				'layout' => 'row',
				'button_label' => 'Add img',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


add_action( 'wp_ajax_nopriv_test_action', 'test_action' );
add_action('wp_ajax_test_action', 'test_action');
	function test_action() {
       $data       = array();
       echo $myjsons     = $_POST['mytestdata'];



	   die(); // умрем еще раз на всяк случ
}
