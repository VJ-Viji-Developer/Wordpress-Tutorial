<?php
get_header();?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url( <?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> <?php  the_archive_title();?> </h1>
        <div class="page-banner__intro">
          <p>keep updated with our latest news.</p>
        </div>
</div>
</div>


<div class="container container--narrow page-section">

<?php
while(have_posts()){

  the_post();

  get_template_part('template-parts/content-event');




 }
echo paginate_links();
?>



<p>Looking for a reacp? <a href="<?php echo site_url('/past-events')?>">check out </a> </p>
</div>


<?php
get_footer();
?>