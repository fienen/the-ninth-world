<?php if(!is_home()): ?>
        </div>  <!-- .row -->
</div>  <!-- #page-background -->
<?php endif; ?>

	<footer>
		<div class="row">
			<div class="medium-6 columns">
				<?php dynamic_sidebar("Footer - Left"); ?>
			</div>  <!-- .large-6.columns -->
			
			<div class="medium-6 columns">
				<?php dynamic_sidebar("Footer - Right"); ?>

<div class="align-right hide-for-print">
    <hr>
    
    <a href="https://twitter.com/TheNinthWorld" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @TheNinthWorld</a>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>  <!-- .align-right -->
			</div>  <!-- .large-6.columns -->
		</div>  <!-- .row -->
	</footer>
  
<?php wp_footer(); ?>

<script>
// Include the UserVoice JavaScript SDK (only needed once on a page)
UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/tBd28LdosfVx81hjFZvFg.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();

//
// UserVoice Javascript SDK developer documentation:
// https://www.uservoice.com/o/javascript-sdk
//

// Set colors
UserVoice.push(['set', {
  accent_color: '#448dd6',
  trigger_color: 'white',
  trigger_background_color: 'rgba(46, 49, 51, 0.6)'
}]);

// Identify the user and pass traits
// To enable, replace sample data with actual user traits and uncomment the line
UserVoice.push(['identify', {
  //email:      'john.doe@example.com', // User’s email address
  //name:       'John Doe', // User’s real name
  //created_at: 1364406966, // Unix timestamp for the date the user signed up
  //id:         123, // Optional: Unique id of the user (if set, this should not change)
  //type:       'Owner', // Optional: segment your users by type
  //account: {
  //  id:           123, // Optional: associate multiple users with a single account
  //  name:         'Acme, Co.', // Account name
  //  created_at:   1364406966, // Unix timestamp for the date the account was created
  //  monthly_rate: 9.99, // Decimal; monthly rate of the account
  //  ltv:          1495.00, // Decimal; lifetime value of the account
  //  plan:         'Enhanced' // Plan name for the account
  //}
}]);

// Add default trigger to the bottom-right corner of the window:
UserVoice.push(['addTrigger', { mode: 'smartvote', trigger_position: 'bottom-right' }]);

// Or, use your own custom trigger:
//UserVoice.push(['addTrigger', '#id', { mode: 'smartvote' }]);

// Autoprompt for Satisfaction and SmartVote (only displayed under certain conditions)
UserVoice.push(['autoprompt', {}]);
</script>

<script src="<?php echo get_template_directory_uri(); ?>/foundation5/js/foundation.min.js"></script>
<script>jQuery(document).foundation();</script>
<?php if( !current_user_can( 'manage_options' ) ): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1003961-11', 'theninthworld.com');
  ga('send', 'pageview');

  ga(initAutoGA());
</script>
<?php endif; ?>
</body>
</html>