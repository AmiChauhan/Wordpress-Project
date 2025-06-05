<?php get_header();?>

<?php if (have_rows('property_data')): ?>
    <?php while (have_rows('property_data')): the_row(); ?>
       
        <!-- Banner Section -->
        <?php if (get_row_layout() == 'property_banner') { 
            $banner_img = get_sub_field('banner_image');
            $tag_line_text = get_sub_field('tag_line_text');
            $banner_heading = get_sub_field('banner_heading');
        ?>
            <section class="banner-wrapper">
                <div class="banner-img" style="background-image: url(<?php echo $banner_img['url']; ?>);">
                    <div class="banner-content-wrapper">
                        <div class="tagtext"><?php echo $tag_line_text; ?></div>
                        <h1 class="head-typ1"><?php echo $banner_heading; ?></h1>
                    </div>
                </div>
            </section>
        <?php } ?>

         <?php if (get_row_layout() == 'select_property'): ?>
           <?php get_template_part('template-parts/property-list'); ?>
        <?php endif; ?>


    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
