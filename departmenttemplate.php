<?php
/*
Template Name: Template Chuyên khoa
*/
get_header(); ?>

<?php get_template_part('bannerdepartment'); ?>

<main id="site-content" role="main">

    <section class="container container-text-align-justify" style="padding-top: 0;">

        <?php get_template_part('breadcrumbdepartment'); ?>

        <?php the_content(); ?></p>

        <?php get_template_part('expertdepartment'); ?>

        <?php get_template_part('newsrelated'); ?>

    </section>
</main>
<?php get_footer(); ?>