<?php
/*
Template Name: Template Cơ sở
*/
get_header(); ?>

<?php get_template_part('bannertitlebranch'); ?>

<main id="site-content" role="main">

    <section class="container container-text-align-justify" style="padding-top: 0;">
        <?php get_template_part('breadcrumbbase'); ?>

        <p><?php the_content(); ?></p>

        <!-- Chèn Google Map iframe từ ACF -->
        <div class="google-map">
            <?php 
            // Lấy giá trị của trường ACF (ví dụ: 'google_map_iframe' là tên của trường)
            $iframe_code = get_field('google_map_iframe');
            
            if( $iframe_code ) :
                // Hiển thị iframe
                echo $iframe_code;
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
