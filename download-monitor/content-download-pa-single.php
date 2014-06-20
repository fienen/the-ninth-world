<?php
/**
 * Default output for a download via the [download] shortcode
 */

global $dlm_download, $dlm_page_addon;

$versions = $dlm_download->get_file_versions();
$previous_versions = '';
?>
<script src="/wp-content/themes/theninthworld/js/jquery.githubRepoWidget.min.js"></script>
<section class="row">
	<aside class="medium-4 small-12 columns">
		<?php do_action( 'dlm_page_addon_aside_start' ); ?>
		<div class="panel">
			<figure>
				<?php 
					echo $dlm_download->get_the_image( 'full' ); 
				      	the_download_thumbnail_caption();
				     	echo get_post(get_post_thumbnail_id())->post_excerpt; 
				?>
			</figure>

			<a class="button large radius expand" href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow">
				<span class="fi-download"></span> <?php _e( 'Download', 'download_monitor' ); ?>
			</a>
		</div>  <!-- .panel -->
		<?php do_action( 'dlm_page_addon_aside_end' ); ?>
	</aside>  <!-- .medium-4.small-12.columns -->

	<div class="medium-8 small-12 columns">
		<table class="download-meta">
			<?php
				// Get formatted list of tags
				$terms = wp_get_post_terms( $dlm_download->id, 'dlm_download_tag' );
				$tags  = array();
				foreach ( $terms as $term )
					$tags[] = '<a href="' . $dlm_page_addon->get_tag_link( $term ) . '">' . $term->name . '</a>';

				// Get formatted list of categories
				$terms = wp_get_post_terms( $dlm_download->id, 'dlm_download_category' );
				$cats  = array();
				foreach ( $terms as $term )
					$cats[] = '<a href="' . $dlm_page_addon->get_category_link( $term ) . '">' . $term->name . '</a>';

				// Get previous versions
				if ( sizeof( $versions ) > 1 ) {
					array_shift( $versions );

					$previous_versions = ' <a href="#" class="toggle-previous-versions">' . __( 'Previous versions', 'dlm_page_addon' ) . '</a><ul class="previous-versions" style="display: none">';

					foreach ( $versions as $version ) {
						$dlm_download->set_version( $version->id );
						$version_post = get_post( $version->id );

						$previous_versions .= '<li><a href="' . $dlm_download->get_the_download_link() . '">' . sprintf( __( 'Version %s', 'dlm_page_addon' ), $dlm_download->get_the_version_number() ) . '</a> - ' . date_i18n( get_option( 'date_format' ), strtotime( $version_post->post_date ) ) . '</li>';
					}

					$dlm_download->set_version();

					$previous_versions .= '</ul>';
				}

				$download_meta = array(
					'filename' => array(
						'name'     => __( 'Filename', 'dlm_page_addon' ),
						'value'    => $dlm_download->get_the_filename(),
						'priority' => 1
					),
					'filesize' => array(
						'name'     => __( 'Filesize', 'dlm_page_addon' ),
						'value'    => $dlm_download->get_the_filesize(),
						'priority' => 2
					),
					'version' => array(
						'name'     => __( 'Version', 'dlm_page_addon' ),
						'value'    => $dlm_download->get_the_version_number() . $previous_versions,
						'priority' => 3
					),
					'date' => array(
						'name'     => __( 'Date added', 'dlm_page_addon' ),
						'value'    => date_i18n( get_option( 'date_format' ), strtotime( $dlm_download->post->post_date ) ),
						'priority' => 4
					),
					'downloaded' => array(
						'name'     => __( 'Downloaded', 'dlm_page_addon' ),
						'value'    => sprintf( _n( '1 time', '%d times', $dlm_download->get_the_download_count(), 'dlm_page_addon' ), $dlm_download->get_the_download_count() ),
						'priority' => 5
					),
					'categories' => array(
						'name'     => __( 'Category', 'dlm_page_addon' ),
						'value'    => implode( ', ', $cats ),
						'priority' => 6
					),
					'tags' => array(
						'name'     => __( 'Tags', 'dlm_page_addon' ),
						'value'    => implode( ', ', $tags ),
						'priority' => 7
					)
				);

				$priority = sizeof( $download_meta );

				foreach ( get_post_custom( $dlm_download->id ) as $key => $meta ) {
					if ( strpos( $key, '_' ) === 0 )
						continue;

					$download_meta[ $key ] = array(
						'name'     => $key,
						'value'    => do_shortcode( make_clickable( $meta[0] ) ),
						'priority' => $priority
					);

					$priority++;
				}

				$download_meta = apply_filters( 'dlm_page_addon_download_meta', $download_meta );

				foreach ( $download_meta as $meta ) :
					if ( empty( $meta['value'] ) )
						continue;
					?>
					<tr>
						<td class="name"><?php echo $meta['name']; ?></td>
						<td class="value"><?php echo $meta['value']; ?></td>
					</tr>
				<?php endforeach;
			?>
		</table>

		<?php the_content(); ?>
	</div>    <!-- .medium-8.small-12.columns -->
</section>

<section class="row">
	<section id="comments" class="small-12 columns">
		    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = 'theninthworld'; 

        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    
	</section>
</section>

<script type="text/javascript">
jQuery('.toggle-previous-versions').click(function() {
	jQuery('ul.previous-versions').slideToggle();
});
</script>