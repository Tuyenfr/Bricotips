<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_style');
function theme_enqueue_style()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour nos personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    // Chargement du /css/widgets/image-titre-widget.css pour notre widget image titre
    wp_enqueue_style('image-titre-widget', get_stylesheet_directory_uri() . '/css/widgets/image-titre-widget.css', array(), filemtime(get_stylesheet_directory() . '/css/widgets/image-titre-widget.css'));
    // Chargement du /css/widgets/bloc-lien-image-widget.css pour notre widget image titre
    wp_enqueue_style('bloc-lien-image-widget', get_stylesheet_directory_uri() . '/css/widgets/bloc-lien-image-widget.css', array(), filemtime(get_stylesheet_directory() . '/css/widgets/bloc-lien-image-widget.css'));

    // Chargement du /css/shortcodes/banniere-titre.css pour notre shortcode banniere titre
    wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));
    // Chargement du /css/shortcodes/banniere-bloc-lien-image.css pour notre shortcode bannière bloc lien image
    wp_enqueue_style('banniere-bloc-lien-image-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-bloc-lien-image.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-bloc-lien-image.css'));

}

/* CHARGEMENT DES WIDGETS */

require_once(__DIR__ . '/widgets/ImageTitreWidget.php');
require_once(__DIR__ . '/widgets/BlocLienImageWidget.php');

function register_widgets()
{
    register_widget('Image_Titre_Widget');
    register_widget('Bloc_Lien_Image_Widget');
}

add_action('widgets_init', 'register_widgets');


/* SHORTCODES */

// Je dis à wordpress que j'ajoute un shortcode 'banniere-titre'
add_shortcode('banniere-titre', 'banniere_titre_func');
// Je génère le html retourné par mon shortcode
function banniere_titre_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'banniere-titre');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
?>

        <div class="banniere-titre" style="background-image: url(<?= $atts['src'] ?>)">
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

    <?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

// Je dis à wordpress que j'ajoute un shortcode 'banniere-bloc-lien-image'
add_shortcode('banniere-bloc-lien-image', 'banniere_bloc_lien_image_func');
// Je génère le html retourné par mon shortcode
function banniere_bloc_lien_image_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'banniere-bloc-lien-image');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
    ?>

        <div class="banniere-bloc-lien-image" style="background-image: url(<?= $atts['src'] ?>)">
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

<?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

/* HOOK FILTERS */

function the_title_filter($title)
{
    if (is_single() && in_category('outils') && in_the_loop()) {
        return 'Outil: ' . $title;
    }
    return $title;
}

add_filter('the_title', 'the_title_filter');

add_filter('get_the_archive_title', function($title) {
    if (is_category()) {
        $title = "Liste des " . strtolower(single_cat_title('', false));
    }
    return $title;
});

function the_category_filter($categories)
{
    return str_replace("Outils", "Tous les outils", $categories);
}

add_filter('the_category', 'the_category_filter');

function the_content_filter($content)
{
    if (is_single() && in_category('outils')) {
        return '<hr><h2>Description</h2>' . $content;
    }
    return $content;
}

add_filter('the_content', 'the_content_filter');

function the_excerpt_filter($content)
{
    if (is_archive()) {
        return $content."<div class='more-excerpt'><a href=".get_the_permalink().">En savoir plus sur l'outil</a></div>";
    }
    return $content;
}

add_filter('the_excerpt', 'the_excerpt_filter');

function loop_end_action()
{
    if (is_archive()):
        ?>
        <p class="after-loop">
            <?php
                echo do_shortcode('[banniere-titre src="http://bricotips.local/wp-content/uploads/2024/02/banniere-image.png" titre="Bricotips"]');
                ?>
        </p>
        <?php
    endif;
}

add_action('loop_end', 'loop_end_action');

$shown = false;

function bricotips_intro_section_action()
{
    global $shown;
    if (is_archive() && !$shown):
        ?>
        <p class="intro">Vous trouverez dans cette page la liste de tous les outils disponibles en ce moment. La liste n'est pas exhaustive mais s'enrichira au fur et à mesure.</p>
        <?php
    $shown = true;
    endif;
}

add_action('bricotips_intro_section', 'bricotips_intro_section_action');

function paginate_links_filter($r)
{
    return  "Pages: ".$r;
}

add_filter('paginate_links_output', 'paginate_links_filter');

