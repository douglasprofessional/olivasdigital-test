<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package olivasdigital
 */

 namespace OD;

get_header();

    $current_page = get_queried_object();
    $taxonomy = 'projects-type';
?>

<section class="archive-by-type">
    <div class="container">
        <div class="archive-by-type__content">
            <h1 class="all-projects__title">
                Tipos de Projetos
            </h1>

            <div class="archive-by-type__columns">
                <div class="archive-by-type__sidebar">
                    <?php
                        $terms = get_terms( array(
                            'taxonomy' => $taxonomy,
                            'hide_empty' => true,
                        ) );
    
                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) { ?>
                            <ul class="archive-by-type__sidebar-list">
                                <?php foreach ( $terms as $term ) { ?>
                                    <li class="archive-by-type__sidebar-item <?php echo $term->term_id === $current_page->term_id ? 'archive-by-type__sidebar-item--current' : ''; ?>" data-tab="<?php echo 'tab' . $term->term_id; ?>">
                                        <a class="archive-by-type__sidebar-link" href="<?php echo esc_url( get_term_link( $term ) ); ?>" title="<?php echo $term->name; ?>">
                                            <?php echo $term->name; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php wp_reset_postdata(); 
                        }
                    ?>
                </div>
    
                <div class="archive-by-type__posts">
                    <h2 class="archive-by-type__posts-title">
                        <?php echo $current_page->name; ?>
                    </h2>
    
                    <ul class="archive-by-type__posts-list">
                        <?php
                            $args = array(
                                'post_type' => 'projects',
                                'posts_per_page' => -1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $taxonomy,
                                        'field' => 'term_id',
                                        'terms' => $current_page->term_id,
                                    ),
                                ),
                            );
    
                            $custom_query = new \WP_Query($args);
    
                            if ($custom_query->have_posts()) {
                                while ($custom_query->have_posts()) {
                                    $custom_query->the_post(); ?>
    
                                    <li class="archive-by-type__posts-list-item">
                                        <a class="archive-by-type__posts-list-link" href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                            <h2 class="archive-by-type__posts-list-title">
                                                <?php echo get_the_title(); ?>
                                            </h2>
                                            <p class="archive-by-type__posts-list-excerpt">
                                                <?php echo get_the_excerpt(); ?>
                                            </p>
                                        </a>
                                    </li> <?php
                                }
                                wp_reset_postdata();
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    // echo '<div class="archive-by-type-project__category">';
    //     echo '<header>';
    //         echo '<div class="container">';
    //             echo '<h1>'. __(single_cat_title( '', false )) .'</h1>';
    //         echo '</div>';
    //     echo '</header>';
    // echo '</div>';

    // echo '<section class="section archive-by-type-project__home-list homelist">';
    //     echo '<div class="container">';
    //         $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    //         if(isMobile()){
    //             $args = array(
    //                 'post_type'      => 'post',
    //                 'post_status'    => 'publish',
    //                 'paged'          => $paged,
    //                 'posts_per_page' => 2,
    //                 'orderby' 	     => 'title',
    //                 'order'          => 'ASC',
    //                 'tag_id'  => $current_page->cat_ID,
    //             );
    //         }
    //         else {
    //             $args = array(
    //                 'post_type'      => 'post',
    //                 'post_status'    => 'publish',
    //                 'paged'          => $paged,
    //                 'posts_per_page' => 5,
    //                 'orderby' 	     => 'title',
    //                 'order'          => 'ASC',
    //                 'tag_id'  => $current_page->cat_ID,
    //             );
    //         }

    //         $query = new WP_Query( $args );

    //         if ( $query->have_posts() ) :
    //             echo '<div class="homelist__posts">';
    //                 echo '<ul>';
    //                     while ( $query->have_posts() ) : $query->the_post();
    //                         echo '<li>';
    //                             echo '<article id="post-'.get_the_ID().'">';
    //                                 echo '<a href="'.get_permalink(get_the_ID()).'" title="'. __($query->post->post_title) .'">';
    //                                     echo '<figure>';
    //                                         if ( has_post_thumbnail() ) :     
    //                                             echo '<span><img loading="lazy" class="transition" src="'.get_the_post_thumbnail_url().'" title="'. __($query->post->post_title) .'" alt="'. __($query->post->post_title) .'"></span>';
    //                                         else :
    //                                             echo '<span><img loading="lazy" class="transition" src="'.get_template_directory_uri().'/assets/image/placeholder_banner.jpg" title="'. __($query->post->post_title) .'" alt="'. __($query->post->post_title) .'"></span>';
    //                                         endif;

    //                                         echo '<figcaption>';
    //                                             echo '<h2 class="figcaption__title">'. __($query->post->post_title) .'</h2>';

    //                                             echo '<p class="figcaption__excerpt">'. excerpt(25) . '</p>';

    //                                             echo '<div class="figcaption__info">';
    //                                                 $post_categories = get_post_primary_category($query->post->ID, 'category'); 
    //                                                 $primary_category = $post_categories['primary_category'];
    //                                                 echo '<span>'. __($primary_category->name) .'</span>';
                                                    

    //                                                 echo '<p>';
    //                                                     $author_article = get_field("author_article", $query->post->ID);
    //                                                     if($author_article != null && $author_article["author_article_show"] == "1") :
    //                                                         if($author_article["avatar"]):
    //                                                             echo '<img loading="lazy" src="'.$author_article["avatar"]["url"].'" title="'. __($author_article["avatar"]["title"]) .'" alt="'. __($author_article["avatar"]["title"]) .'">';
    //                                                         endif;
                                                            
    //                                                         if($author_article["name"]):
    //                                                             echo '<span>'.$author_article["name"].'</span>';
    //                                                         endif;
    //                                                     else :
    //                                                         echo '<img loading="lazy" src="'.get_avatar_url(get_the_author_meta( 'ID' )).'" title="'.get_the_author_meta( 'nicename' ).'" alr="'.get_the_author_meta( 'nicename' ).'" />';
                                                            
    //                                                         echo '<span>'.ucfirst( get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name'  )).'</span>';
    //                                                     endif;

    //                                                     echo '<span>'.get_the_date('j M, Y').'</span>';
    //                                                 echo '</p>';
    //                                             echo '</div>';
    //                                         echo '</figcaption>';
    //                                     echo '</figure>';
    //                                 echo '</a>';
    //                             echo '</article>';
    //                         echo '</li>';
    //                     endwhile;
    //                 echo '</ul>';

    //                 echo '<div>';
    //                     the_posts_pagination( array(
    //                         'prev_text' => __( '&#8249;' ),
    //                         'next_text' => __( '&#8250;' ),
    //                     ) );
    //                 echo '</div>';
    //             echo '</div>';
    //         endif;
    //         wp_reset_query();

    //         echo '<div class="homelist__sidebar">';
    //             $sidebar_first_banner = get_field('first_banner', 'option');
    //             $sidebar_category_list = get_field('category_list', 'option');
    //             $sidebar_last_banner = get_field('last_banner', 'option');

    //             if($sidebar_first_banner != null && $sidebar_first_banner["banner"] == "1") :
    //                 if($sidebar_first_banner["link"] || $sidebar_first_banner["image"]) :
    //                     echo '<a class="sidebar-banner sidebar-banner--first" href="'.$sidebar_first_banner["link"]["url"].'" title="'. __($sidebar_first_banner["link"]["title"]) .'" target="'.$sidebar_first_banner["link"]["target"].'">';
    //                         echo '<img loading="lazy" class="transition" src="'.$sidebar_first_banner["image"].'" title="'. __($sidebar_first_banner["link"]["title"]) .'" alt="'. __($sidebar_first_banner["link"]["title"]) .'">';
    //                     echo '</a>';
    //                 endif;
    //             endif;

    //             if($sidebar_category_list != null && $sidebar_category_list["show_list"] == "1") :
    //                 echo '<div class="sidebar-category-list">';
    //                     if($sidebar_category_list["title"]) :
    //                         echo '<h2 class="sidebar-category-list__title">'. __($sidebar_category_list["title"]) .'</h2>';
    //                     endif;

    //                     echo '<ul class="sidebar-category-list__list">';
    //                         foreach ($sidebar_category_list["list"] as $category_list) :
    //                             foreach ($category_list["category"] as $category) :
    //                                 $cat_ID = $category->cat_ID;
    //                                 $cat_name = $category->name;
    //                                 $cat_link = get_category_link($cat_ID);

    //                                 echo '<li><a href="'.$cat_link.'" title="'. __($cat_name) .'">'. __($cat_name) .'</a></li>';
    //                             endforeach;
    //                         endforeach;
    //                     echo '</ul>';
    //                 echo '</div>';
    //             endif;

    //             if($sidebar_last_banner != null && $sidebar_last_banner["banner"] == "1") :
    //                 if($sidebar_last_banner["link"] || $sidebar_last_banner["image"]) :
    //                     echo '<a class="sidebar-banner sidebar-banner--last" href="'.$sidebar_last_banner["link"]["url"].'" title="'. __($sidebar_last_banner["link"]["title"]) .'" target="'.$sidebar_last_banner["link"]["target"].'">';
    //                         echo '<img loading="lazy" class="transition" src="'.$sidebar_last_banner["image"].'" title="'. __($sidebar_last_banner["link"]["title"]) .'" alt="'. __($sidebar_last_banner["link"]["title"]) .'">';
    //                     echo '</a>';
    //                 endif;
    //             endif;
    //         echo '</div>';
    //     echo '</div>';
    // echo '</section>'; 
        
get_footer();