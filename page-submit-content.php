<?php 
/*
  Template Name: Content Submission
*/ 
$theType   = $_GET['type'];
$theEditID = $_GET['id'];

if($theType == 'oddities'): 
  $theFields   = array('post_content'=>array('label'=>'Description'));  
  $theSingular = 'Oddity';
elseif($theType == 'artifacts'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'level','form','effect','depletion'); 
$theSingular = 'Artifact';
elseif($theType == 'cyphers'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'kind','level','internal','wearable','usable','effect'); 
  $theSingular = 'Cypher';
elseif($theType == 'descriptors'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'benefits','initial_links'); 
  $theSingular = 'Descriptor';
elseif($theType == 'encounters'): 
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'level','encounter_type','motive','environment','health','damage_inflicted','armor','movement','modifications','combat','interaction','use','loot','gm_intrusion'); 
  $theSingular = 'Encounter';
elseif($theType == 'equipment'):  
  $theFields   = array('post_title','notes','price','item_rarity','post_content'=>array('label'=>'Extra Details'),'equipment_type'=>array('type'=>'pick','pick_format_type'=>'multi','pick_format_multi'=>'checkbox')); 
  $theSingular = 'Equipment';
elseif($theType == 'locations'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'rulers','population','capital','region','location_type','hearsay','weird','points_of_interest','map'=>array('label'=>'Location Image'),'map_x'=>array('label'=>'Map X Coordinate'),'map_y'=>array('label'=>'Map Y Coordinate')); 
  $theSingular = 'Location';
elseif($theType == 'mutations'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'mutation_type'); 
  $theSingular = 'Mutation';
elseif($theType == 'foci'):  
  $theFields   = array('post_title','post_content'=>array('label'=>'Description'),'connection','additional_equipment','esoteries','minor_effect_suggestions','major_effect_suggestions','gm_intrusion','tier_1','tier_2','tier_3','tier_4','tier_5','tier_6'); 
  $theSingular = 'Focus';
endif;

if (isset($theEditID) && isset($theType)):  
  global $current_user; 
  get_currentuserinfo();  
  $thePod      = pods($theType,$theEditID); 
  $titleAction = 'Update';
elseif (isset($theType)): 
  $thePod      = pods($theType);  
  $titleAction = 'Submit';
endif;

get_header(); ?>
  <div class="small-12 large-12 columns" role="main">
  <?php /* Start loop */ ?>
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <h1 class="entry-title"><?php echo $titleAction; ?> <?php echo $theSingular; ?></h1>

      <hr>

      <div class="entry-content">
        <p>Would you like to contribute content to the site? Fill out the form below and submit it! All content submissions are checked before being put live on the site, and the top rated submissions will get added to the living sourcebook when the time comes. Don't forget to review the <a href="/terms-use/">terms of use</a>.</p>   

        <?php if (isset($theEditID) && isset($theType)):            
          if ($thePod->field('post_author') == $current_user->ID):            
            echo $thePod->form($theFields,$titleAction.' '.$theSingular,'/submit/thank-you/');          
          else: ?>        
        <div data-alert class="alert-box alert">          
          <p>Sorry, you don't appear to have access to edit this piece of content. Let us know if <a href="/contact/">this is a mistake</a>.</p>        
        </div>  <!-- .alert-box.alert -->
          <?php endif;        
        else:         
          echo $thePod->form($theFields,$titleAction.' '.$theSingular,'/submit/thank-you/');        
        endif; ?>
      </div>  <!-- .entry-content -->
    </article>
  <?php endwhile; // End the loop ?>
  </div>  <!-- .small-12.large-12.columns  -->
<?php get_footer(); ?>