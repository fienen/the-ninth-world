<!doctype html>
<html class="no-js" lang="en">
  <head>
    <!-- DigitalOcean -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="p:domain_verify" content="6fe302a1b4bf2dac8b810f44d653c76a">
  
    <title><?php wp_title('|', true, 'right'); /* bloginfo('name'); */ ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
  
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/foundation5/css/foundation.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cinzel+Decorative:r,b,900|Varela:r">

    <script src="<?php echo get_template_directory_uri(); ?>/foundation5/js/modernizr.js"></script>

<?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
    <script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/general.js"></script>
</head>
  
<body>
    <div id="user-tools" class="clearfix">
      <div class="row">
        <div class="small-12 medium-6 columns">
          <ul>
            <li class="has-dropdown">
<?php if( !is_user_logged_in() ): ?>
              <a href="#" data-dropdown="optionsHover" data-options="is_hover:true">Sign in/Create Account</a>
              <ul id="optionsHover" class="f-dropdown textLeft" data-dropdown-content>
                <li><a href="/wp-login.php">Sign In</a></li>
                <li><a href="/wp-login.php?action=register">Create Account</a></li>
              </ul>
<?php 
  else: 
    global $current_user, $user_identity;
?>
              <a href="#" data-dropdown="optionsHover" data-options="is_hover:true">Hi <?php echo $user_identity; ?></a>
              <ul id="optionsHover" class="f-dropdown textLeft" data-dropdown-content>
                <li><a onclick="ga('send', 'event', 'User Menu', 'click', 'Your Profile');" href="/wp-admin/profile.php"><span class="fi-torsos"></span> Your Profile</a></li>
		<li><a onclick="ga('send', 'event', 'User Menu', 'click', 'View Favorites');" href="/profile/favorites/"><span class="fi-heart"></span> View Favorites</a></li>
                <li><a onclick="ga('send', 'event', 'User Menu', 'click', 'Manage Submissions');" href="/profile/submissions/"><span class="fi-clipboard-pencil"></span> Manage Submissions</a></li>
                <li><a onclick="ga('send', 'event', 'User Menu', 'click', 'Logout');" href="<?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?>"><span class="fi-unlock"></span> Logout</a></li>
              </ul>
<?php endif; ?>
            </li>
          </ul> 
        </div>  <!-- .small-12.medium-6.columns -->

        <div class="small-12 medium-6 columns">
          <form method="GET" action="<?php echo home_url( '/' ); ?>" class="row collapse" id="main-search">
            <div class="large-8 small-9 columns">
              <input type="text" name="s" id="s" placeholder="Find Stuff">
            </div>  <!-- .large-8.small-9.columns -->

            <div class="large-4 small-3 columns">
              <input type="submit" class="button expand postfix" value="Search">
            </div>  <!-- .large-4.small-3.columns -->

          </form>  <!-- #main-search.row.collapse -->
        </div>  <!-- .small-12.medium-6.columns -->
      </div>  <!-- .large-12.columns -->
    </div>  <!-- .row -->
  </div>  <!-- #user-tools.contain-to-grid -->
  
  <div id="main-nav" class="contain-to-grid sticky">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name"><h1><a href="/">The Ninth World</a></h1></li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      
      <section class="top-bar-section">
        <ul>
          <li class="has-dropdown">
            <a href="#">Reading</a>
            <ul class="dropdown">
              <li><a href="/publications/">Publications</a></li>
	      <li><a onclick="ga('send', 'event', 'Outbound Navigation', 'click', 'The Datasphere');" href="http://www.pinterest.com/theninthworld/the-datasphere/">The Datasphere <span class="fi-social-pinterest"></span></a></li>
              <!-- li><a href="/resources/the-living-sourcebook/">The Living Sourcebook</a></li -->
              <li class="divider"></li>
              <li><label>Articles</label></li>
              <li><a href="/category/for-gamemasters/">For Gamemasters</a></li>
              <li><a href="/category/for-players/">For Players</a></li>
	      <li><a href="/category/gameplay/">Gameplay</a></li>
              <li><a href="/category/mechanics/">Mechanics</a></li>
              <li><a href="/category/reviews/">Reviews</a></li>
            </ul>
          </li>
          <li class="has-dropdown">
            <a href="/resources/">Resources</a>
            <ul class="dropdown">
              <li><a href="/artifacts/">Artifacts</a></li>
              <li><a href="/encounters/">Creatures and NPCs</a></li>
              <li><a href="/cyphers/">Cyphers</a></li>
              <li><a href="/descriptors/">Descriptors</a></li>
              <li><a href="/equipment/">Equipment</a></li>
              <li><a href="/foci/">Foci</a></li>
              <li><a href="/locations/">Locations</a></li>
              <li><a href="/mutations/">Mutations</a></li>
              <li><a href="/oddities/">Oddities</a></li>
              <li class="divider"></li>
              <li><a href="/downloads/">Downloads</a></li>
	      <li><a href="/resources/world-map/">World Map</a></li>
            </ul>
          </li>
          <li class="has-dropdown"><a href="/submit/">Submit Content</a>
            <ul class="dropdown">
		<li><a href="/submit/writing-style-guide/">Writing Style Guide</a></li>
            </ul>
          </li>
          <li class="has-dropdown">
            <a href="/contact/">Contact</a>
            <ul class="dropdown">
              <li class="hide-for-medium-up"><a href="/contact/">Contact Us</a></li>
	      <li><a onclick="ga('send', 'event', 'Outbound Navigation', 'click', 'UserVoice');" href="http://theninthworld.uservoice.com">Suggest Features <span class="fi-lightbulb"></span></a></li>
              <li><a href="/terms-use/">Terms of Use</a></li>
	      <li><a onclick="ga('send', 'event', 'Outbound Navigation', 'click', '@TheNinthWorld');" href="https://www.twitter.com/TheNinthWorld">@TheNinthWorld <span class="fi-social-twitter"></span></a></li>
            </ul>
          </li>
	  <li>
	    <a href="http://ninthworldhub.com/">Forums</a>
	  </li>
        </ul>
      </section>
    </nav>  <!-- .top-bar -->
  </div>  <!-- #main-nav.contain-to-grid.sticky -->

<?php if(!is_home()): ?>
<div id="page-background" class="background-<?php echo rand(1, 17); ?>">
        <div class="row">
<?php endif; ?>