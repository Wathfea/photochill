<?php
/**
 * The main template file
 *
 * @package photochill
 */
get_header();

$parallaxTopImg = get_post(7);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($parallaxTopImg->ID), 'single-post-thumbnail');
?>
<div class="container-fluid parallax">
    <div class="parallax-top text-center"  style="background-image: url(<?php echo $image[0]; ?>);">
        <img src="<?php echo get_bloginfo('template_url') ?>/images/logo.png" />
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <h2><?php echo get_bloginfo('description'); ?></h2>
    </div>
</div>

<div class="container-fluid about-box" id="aboutbox">
    <div class="row">
        <?php
        $aboutImgPost = get_post(119);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($aboutImgPost->ID), 'single-post-thumbnail');
        ?>
        <div class="col-md-6 nopadding about-image" style="background-image: url(<?php echo $image[0]; ?>);">
        </div>
        <div class="col-md-6">
            <div class="col-md-6 home-textbox">
                <?php
                $about = get_post(18);
                ?>
                <h3 class="post_title"><?php echo $about->post_title; ?></h3>
                <div>
                    <?php echo b_excerpt($about->post_content, 600); ?>
                </div>
                <a class="readmore" href="/rolam">Tovább...</a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid gallery-home">
    <div class="row" style="margin-top: 10px;">
        <?php //echo do_shortcode('[Modula id="1"]'); ?>
        <?php
            $homeGallery = get_post(123);

            $galleryEleemnts = get_post_gallery( $homeGallery->ID , false);
            foreach( $galleryEleemnts['src'] as $src ) : ?>
                <div class="col-xs-12 col-sm-4 text-center jpibfi_container">
                    <a href="<?php echo $src; ?>" data-lightbox="image-1">
                        <img src="<?php echo $src; ?>" class="center-cropped" />
                    </a>
                </div>
                <?php
            endforeach;
        ?>
    </div>
</div>

<?php
$parallaxBottomImg = get_post(12);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($parallaxBottomImg->ID), 'single-post-thumbnail');
?>
<div class="container-fluid parallax">
    <div class="parallax-bottom text-center" style="background-image: url(<?php echo $image[0]; ?>);">
    </div>
</div>

<div class="container-fluid contact-box" id="contactbox">
    <div class="row">
        <div class="col-md-6">
            <div class="col-md-6 pull-right home-textbox">
                <h3 class="post_title">Contact</h3>
                <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
            </div>
        </div>
        <?php
        $contactImgPost = get_post(120);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($contactImgPost->ID), 'single-post-thumbnail');
        ?>
        <div class="col-md-6 nopadding contact-image" style="background-image: url(<?php echo $image[0]; ?>);">
        </div>
    </div>
    <?php get_footer(); ?>
