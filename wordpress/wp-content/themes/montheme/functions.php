<?php 



//add_theme_support('widgets');

register_sidebar([
    'id' => 'main-sidebar',
    'name' => 'Main-sidebar'
]);
register_sidebar([
    'id' => 'blog-widget',
    'name' => 'widget Blog'
]);


function add_css_js() {

    wp_enqueue_script('mon_script',get_template_directory_uri().'/assets/js/leaflet.js',[],'1.0',true);
    wp_enqueue_script('ma carte', get_template_directory_uri().'/assets/js/carte.js',[],'1.0',true);
    wp_enqueue_style('mon_style', get_template_directory_uri().'/assets/css/leaflet.css', [], '1.0');

}
add_action('wp_enqueue_scripts','add_css_js');

function ajouter_carte( $atts) {
    $message = '<div id = "map" ></div>';
    return $message;
}

add_shortcode('carte', 'ajouter_carte');

function ajouter_form(){
    return '<form method= "post" target = "' . $_SERVER['PHP_SELF'] . '">
        <p><label>Nom :<input></label></p>
        <p><label>Email :<input type=email></label>
        <p<<label>Téléphone :<input type=tel></label>
        <p><label>sujet : <input type=text></label>
        <p><label>Message <input type=textarea></label>
        <p><input type=submit value=Envoyer></p>
        <p><input type=reset></p>
    </form>';
}

add_shortcode('formulaire', 'ajouter_form');

function custom_post_type() 
{ 
    $labels=[ 'name' => 'publication',//Nom du CPT
        'all_item'=> 'Toutes les publications', 
        'singular_name' =>'Publication', 
        'add_new_item' =>'Ajouter une publication', 
        'menu_name'=>'Publication' ]; 
    
    $args= [ 'labels' => $labels,
        'public' => true,
        'show_in_rest' => false,
        'has_archive'=> true,
        'supports'=> ['title','editor', 'thumbails','excerpt', 'custom-fields', 'trackbacks', 'post-formats'],
        'menu-position'=> 2, 
        'menu_icon'=> 'dashicons-admin-customizer', 
        'show_in_admin_bar' =>true]; 
    
    register_post_type('publication',$args); 

    $labels=[ 'name'=> 'Catégorie des publications', 
    'new_item_name' => 'nom de la publication', 
    'parent_item' =>'catégorie de la publication', 
    'add_new_item'=> 'Ajouter une nouvelle publication' ];

    $args=[ 'labels'=>$labels, 
        'public'=>true,// est-ce que la taxonomie est visible sur le front-office 
        'show_in_rest' => false, // Est-ce que lataxonomie est récupérable à partir de l'API REST. 
        'hierarchical' => true ];

    register_taxonomy('type_article', 'publication', $args) ;
} 

add_action('init', 'custom_post_type');

// function ou_suis_je(){
//     global $template;
//     echo '<div style="padding: 10px">';
//     if( is_home() ){
//         printf( '<h2>This is the blog listing page</h2>' );
//     }
//     if( is_front_page() ){
//         printf('<h2>This is the front page of your site.</h2>');
//     }
//     printf( '<p><code>is_home()</code> returns : <code>%s</code></p>', is_home() ? 'true' : 'false' );
//     printf( '<p><code>is_front_page()</code> returns : <code>%s</code></p>', is_front_page() ? 'true' : 'false' );
//     printf( '<p>The template used is : <code>%s</code></p>', basename( $template ) );
//     echo '</div>';
// }
// add_action( 'wp_body_open', 'ou_suis_je' );

function wppln_list_cat() { 
    $string = '<ul>'; 
    $list_cat = get_terms('category'); 
    if ( ! empty( $list_cat ) ) {
        foreach ( $list_cat as $key => $cat ) { 
            $string .= '<li>'. $cat->name . '<br />'; 
            $string .= '<em>'. $cat->description . '</em> </li>'; 
        } 
    } 
    $string .= '</ul>'; 
    return $string; 
} 
add_shortcode('wppln_listcat', 'wppln_list_cat');


function recup_categories(){
    $string = '<ul>'; 
    $list_cat = get_terms('type_article');
    if (!empty( $list_cat ) ) 
    { 
        foreach ($list_cat as $key => $cat) 
        { 
            $string .= "<li> $cat->name <br />"; 
            $string .= "<em> $cat->description </em> </li>"; 
        } 
    } 
    $string .= '</ul>'; 
    return $string;
}

class mon_widget extends WP_Widget 
{ 
    //on hérite de la classe WP_Widget, cela nous permet de creer des nouveaux widgets à partir de wordpress 
    //4 fonctions obligatoires : construct, widget, form et update 
    function __construct() 
    {
        parent::__construct('mon_widget', // l'identifiant du widget 
        'Lisrin widget', // l'intitulé du widget ce qe l'admin voit dans l'administration 
        array('description' => 'Ceci est un widget de tutoriel.')); //Tableau d'argument sur le widget, sa description, le classname en css, show instance in rest pour savoir si on l'autorise dans l'api 
    }
    public function widget( $args, $instance ) 
    {
        $title = $instance['title']; //La fonction widget permet l'affichage du widget sur le front
        echo $args['before_widget']; //$args contient des éléments qui permettent d'ajouter du code avant et après le widget.
        if ( ! empty( $title ) ) 
            echo $args['before_title'] . $title . $args['after_title']; 
            // echo 'Ceci est mon premier widget';
            echo recup_categories(); 
            echo $args['after_widget'];
    } 
    public function form($instance) 
    { //la fonction qui permet l'ajout d'un formulaire du coté administration 
        if ( isset( $instance[ 'title' ] ) ) 
        { 
            $title = $instance[ 'title' ]; 
        } 
        else 
        { 
            $title = 'New title'; 
        } 
        ?> 
            <div> 
                <label for="<?= $this->get_field_id( 'title' ); ?>">
                    <?php 'Title:'; ?>
                </label> 
                <input class="widefat" id="<?= $this->get_field_id( 'title' ); ?>" name="<?= $this->get_field_name( 'title' ); ?>" type="text" value="<?= esc_attr( $title ); ?>" /> 
            </div> 
        <?php 
    } 
    public function update( $new_instance, $old_instance ) 
    { //La fonction update suit la fonction forme lorsqu'on remplit le formulaire elle permet de remplacer l'ancienne valeur par la nouvelle
        $instance = array(); 
        if(!empty($new_instance['title']))
        {
            $instance['title'] = $new_instance['title'];
        } 
        else 
        { 
            $instance = $old_instance['title']; 
        } 
        return $instance; 
    } 
} 
function get_my_widgets()
{ 
    register_widget( 'mon_widget' ); 
}
add_action('widgets_init', 'get_my_widgets');