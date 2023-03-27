<?php
/**
 * Template Name: One Column Videos Page
 *
 * Template for Videos custom post type
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<?php
/**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
$args = array(
    'post_type' => 'videos',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'orderby' => 'title',
    'order' => 'ASC',
    'paged' => $paged,
);

$loop = new WP_Query($args);

?>

<div class="wrapper" id="full-width-page-wrapper">

    <div class="<?php echo esc_attr($container); ?>" id="content">

        <div class="row">

            <div class="videos col-md-12 content-area" id="primary">

                <main class="site-main" id="main" role="main">
                    <ul class="video-list list-unstyled row">
                        <?php
                        while ($loop->have_posts()):
                            ?>
                            <?php
                            $loop->the_post();
                            ?>
                                <?php get_template_part('loop-templates/content', 'video'); ?>
                        <?php endwhile; // end of the loop. ?>
                    </ul>
                    <div class="row mt-5">
                        <?php
                        $total_pages = $loop->max_num_pages;
                        if ($total_pages > 1) {

                            $current_page = max(1, get_query_var('paged'));

                            echo paginate_links(
                                array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => '/page/%#%',
                                    'current' => $current_page,
                                    'total' => $total_pages,
                                    'prev_text' => __('« prev'),
                                    'next_text' => __('next »'),
                                )
                            );
                        }
                        wp_reset_postdata();
                        ?>
                    </div><!-- end row -->

                </main><!-- #main -->

            </div><!-- #primary -->

        </div><!-- .row end -->

    </div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>