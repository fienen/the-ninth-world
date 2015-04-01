<?php get_header(); ?>

<?php if(is_home()): ?>
<div id="masthead" class="background-6"> 
  <div class="row">
    <div class="large-10 small-12 large-centered columns">
<?php
  $query = new WP_Query( 'posts_per_page=1' );
  if ( $query->have_posts() ):
    while ( $query->have_posts() ):
          $query->the_post();
?>
          <h2><a title="Continue Reading '<?php the_title(); ?>'" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          
          <div class="row">
            <div class="large-8 medium-7 columns">
              <?php the_excerpt(); ?>
              <small>Posted on <?php echo get_the_date(); ?></small>
            </div>  <!-- .large-8.medium-7.columns -->
            
            <div class="large-4 medium-5 columns">
              <a class="button expand" title="Continue Reading '<?php the_title(); ?>'" href="<?php the_permalink(); ?>">Continue Reading</a>
              <a class="button expand secondary" title="Article Archives" href="/archives/">More Articles</a>
            </div>  <!-- .large-4.medium-5.columns -->
          </div>  <!-- .row -->
<?php 
    endwhile;
      wp_reset_postdata();
  endif;
?>
    </div>  <!-- .large-10.small-12.large-centered.columns -->
  </div>  <!-- .row -->
    </div>  <!-- #masthead.background-6 -->

    <div id="cta" class="row">
      <div class="large-12 columns align-center">
        <a href="http://cyphercast.net/" title="CypherCast Network"><img src="/wp-content/uploads/2015/04/CypherCast_Network_Affiliate.png" alt="CypherCast Network" style="width:100%"></a>

        <h3>Read &bull; Vote &bull; Contribute &bull; Share</h3>

<!-- div data-alert class="alert-box info radius">
  <span class="fi-calendar"></span> Don't forget, our <a href="http://theninthworld.com/creation-day-contest/">Content Creation Contest</a> is running through <strong>today</strong>!
  <a href="#" class="close">&times;</a>
</div -->

        <p>What is <strong>The Ninth World</strong>? It is a content resource for the roleplaying game <strong>Numenera</strong>, by Monte Cook Games. We take user contributions on elements of the game such as <strong>locations</strong>, <strong>cyphers</strong>, <strong>artifacts</strong>, <strong>creatures</strong>, and the like and make them available to you to use in your next game session. This site is made possible by the gaming community - <strong>You</strong> - and we invite everyone to <strong><a href="/submit/">make submissions</a></strong>, or even <strong><a href="/contact/">write articles</a></strong>.</p>

      </div>  <!-- .large-12 columns -->
    </div>  <!-- #cta.row -->

  <div class="row">
    <div class="small-12 medium-6 large-8 columns">
       <div class="panel">
        <h3><span class="fi-rss"></span> Latest Articles</h3>
        <ul>
<?php     
  $query = new WP_Query( 'posts_per_page=6&offset=1' );
  if ( $query->have_posts() ):
    while ( $query->have_posts() ):
          $query->the_post();
?>
          <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> - <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></li>
<?php 
    endwhile;
      wp_reset_postdata();
  endif;
?>
        </ul>
      </div>  <!-- .panel -->     

      <div class="panel">
        <h3><span class="fi-results-demographics"></span> Latest Submissions</h3>
        <ul id="latest-submissions">
<?php
$newest_content = new WP_Query(array('posts_per_page' => 6, 'post_type' => array('artifacts','mutations','foci','locations','cyphers','encounters','descriptors','oddities')));
while( $newest_content->have_posts() ) : 
$newest_content->the_post();
  $typeName = get_post_type_object( get_post_type() );
?>
          <li><a title="<?php echo $typeName->labels->singular_name; ?>: <?php the_title(); ?>" href="<?php the_permalink(); ?>"><strong><?php echo $typeName->labels->singular_name; ?></strong>: 
            <?php if( $typeName->labels->singular_name == 'Oddity' ):
              echo get_the_content(); 
            else: 
              the_title(); 
            endif; ?></a></li>
<?php
endwhile;
wp_reset_postdata();
?>
        </ul>
      </div>  <!-- .panel -->

      <div class="panel">
        <h3><span class="fi-download"></span> Latest Downloads</h3>
        <?php echo do_shortcode('[downloads per_page="6" orderby="download_count"]'); ?>
      </div>  <!-- .panel -->
    </div>  <!-- .small-12.medium-6.large-8.columns --> 

    <div class="small-12 medium-6 large-4 columns text-center">
<?php 
  $params = array( 
    'orderby' => 'RAND()',     
    'limit' => 2 
  ); 

  $pub = pods( 'publications', $params ); 
  while ( $pub->fetch() ):
    if( $pub->field( 'availability' ) == 'soon' ):
      $thePubHeader = 'Coming Soon';
      $thePubLink   = '/publications/';
      $thePubName   = $thePubHeader;
    elseif( $pub->field( 'availability' ) == 'released' ):
      $thePubHeader = 'Available Now!';
      $thePubLink   = $pub->field( 'link' );
      $thePubName   = trim(strip_tags( $pub->field( 'post_title' ) ));
    endif;
    $coverAttr = array(
      'alt' => trim(strip_tags( $pub->field( 'post_title' ) )),
      'title' => trim(strip_tags( $pub->field( 'post_title' ) )),
    );
?>
      <div class="callout panel align-center">
        <h3><?php echo $thePubHeader; ?></h3>
        <a href="<?php echo $thePubLink; ?>" onclick="_gaq.push(['_trackEvent', 'Publications', 'click', '<?php echo $thePubName; ?>']);"><?php echo get_the_post_thumbnail($pub->field( 'ID' ), medium, $coverAttr); ?></a><br>
        By <?php echo $pub->display( 'authors' ); ?>
      </div>  <!-- .callout.panel.align-center -->
<?php 
  endwhile;
?>
    </div>  <!-- .small-12.medium-6.large-4.columns.text-center -->
  </div>  <!-- .row -->
<?php endif; ?>
  
<?php get_footer(); ?>