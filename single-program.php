<?php

get_header();
while(have_posts()){
    the_post(); ?>
     <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url( <?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> <?php the_title() ?></h1>
        <div class="page-banner__intro">
          <p>Learn how the school of your dreams got started.</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">



<div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo site_url('/program') ?>">
          <i class="fa fa-home" aria-hidden="true"></i> All Programs</a> 
          <span class="metabox__main">   <?php the_title(); ?> </span>
        </p>
      </div>
      <div class="generic-content">
        <?php the_content() ?>
        <?php 

$relatedProfessors = new WP_Query(array(
           
           
  'posts_per_page' => 2,        
  'post_type' => 'professor',
  // 'mata_key' => 'event_date',
  'orderby'=>'title',
  'order'=>'ASC',
  'meta_query'=>array(
   
    array(                              
      'key'=>'related_programs',
      'compare'=>'LIKE',
      'value'=>'"' . get_the_ID() .'"'
    )
    )
));
if($relatedProfessors->have_posts()){
  echo '<hr class="section-break">';

echo '<h4> '. get_the_title(). 'Professors </h4>';
?>





<?php

echo '<ul class="professor-cards">';
        while($relatedProfessors->have_posts()) {
          $relatedProfessors->the_post(); ?>
          <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink(); ?>">
              <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape') ?>">
              <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
          </li>
        <?php }
}

        echo '</ul>';
        

wp_reset_postdata();
?> 


</div>


<hr>
<?php
        $today=date('Ymd');
          $homepageEvents = new WP_Query(array(
           
           
            'posts_per_page' => 2,        
            'post_type' => 'event',
            'mata_key' => 'event_date',
            'orderby'=>'meta_value_num',
            'order'=>'ASC',
            'meta_query'=>array(
              array(
              'key'=>'event_date',
              'compare'=>'>=',
              'value'=>$today,
              'type'=>'numeric'
              ),
              array(                              //getting events related to programs
                'key'=>'related_programs',
                'compare'=>'LIKE',
                'value'=>'"' . get_the_ID() .'"' //"12"
              )
              )
          ));
          if($homepageEvents->have_posts()){
            echo '<hr class="section-break">';

          echo '<h4> Upcoming '. get_the_title(). 'Events </h4>';
          ?>


  
  <?php while($homepageEvents->have_posts()) {
            $homepageEvents->the_post(); 
            get_template_part('template-parts/content-event');
            
          }
          }
        
        ?> 
      
       
      
    
        
    
        <?php } ?>
         



          

    <?php
 get_footer();

?>




<!-- <div class="metabox metabox--position-up metabox--with-home-link">
  <p>
    <a class="metabox__blog-home-link" herf="<?php echo site_url('/events') ?>">
    <i class="fa fa-home" aria-hidden="true"></i> Event home </a>
    <span class="metabox--metabox" href="<?php get_title(); ?> ">