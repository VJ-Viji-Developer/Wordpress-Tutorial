<?php

get_header();
while(have_posts()){
    the_post();
    pageBanner() ?>
   <!-- <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url( <?php $pageBannerImage=get_field('page_banner_background_image');echo $pageBannerImage['url']?>);"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> <?php the_title() ?></h1>
        <div class="page-banner__intro">
       <?php the_field('page_banner_subtitle') ?></p>
        </div>
      </div>
    </div>  -->

    <div class="container container--narrow page-section">



<div class="metabox metabox--position-up metabox--with-home-link">
       
      </div>
      <div class="generic-content">
       <div class="row group">
        <div class="one-third">
        <?php the_post_thumbnail('professorPortrait'); ?>
</div>
<div class="two-thirds">
            <?php the_content(); ?>
            </div>
       </div>

    </div>
       
       
      <?php

       $relatedPrograms = get_field('related_programs');

       if ($relatedPrograms) {
       echo '<hr class="section-break">';
       echo '<h4 class="headline headline--medium">Subjects Taught</h4>';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program) { ?>
        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
       <?php }
        echo '</ul>';
}

?>
      </div>

      


    <hr>
    <?php
 get_footer();
}
?>




<!-- <div class="metabox metabox--position-up metabox--with-home-link">
  <p>
    <a class="metabox__blog-home-link" herf="<?php echo site_url('/events') ?>">
    <i class="fa fa-home" aria-hidden="true"></i> Event home </a>
    <span class="metabox--metabox" href="<?php get_title(); ?> ">
</span> -->

         

     
