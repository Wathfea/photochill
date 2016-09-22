<?php
/**
 * The main template file
 *
 * @package photochill
 */
get_header();
?>
<div class="container-fluid parallax-bg">
    <div class="parallax text-center">
        <img src="<?php echo get_bloginfo('template_url') ?>/images/logo.png" />
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <h2><?php echo get_bloginfo('description'); ?></h2>
    </div>
</div>

<div class="container-fluid about-box">
    <div class="row">
        <?php
        $aboutImgPost = get_post(51);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($aboutImgPost->ID), 'single-post-thumbnail');
        ?>        
        <div class="col-md-6 nopadding about-image" style="background-image: url(<?php echo $image[0]; ?>);">
        </div>
        <div class="col-md-6">
            <div class="col-md-5 home-textbox">
                <?php
                $about = get_post(7);
                ?>
                <h3 class="post_title"><?php echo $about->post_title; ?></h3>
                <div>
                    <?php echo b_excerpt($about->post_content, 500); ?>
                </div>
                <a class="readmore" href="/rolam">Tovább...</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid gallery-home">
    <div class="row">
        <?php echo do_shortcode('[FinalTilesGallery id="1"]'); ?>
    </div>
</div>

<div class="container-fluid parallax-bg2">
    <div class="parallax2 text-center">
    </div>
</div>

<div class="container-fluid contact-box">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-5 pull-right home-textbox">
                <h3 class="post_title">Contact</h3>
                <?php echo do_shortcode('[contact-form-7 id="32" title="Home Contact"]'); ?>
            </div>
        </div>
        <?php
        $contactImgPost = get_post(45);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($contactImgPost->ID), 'single-post-thumbnail');
        ?>        
        <div class="col-md-6 nopadding contact-image" style="background-image: url(<?php echo $image[0]; ?>);">
        </div>
    </div>
    <?php get_footer(); ?>