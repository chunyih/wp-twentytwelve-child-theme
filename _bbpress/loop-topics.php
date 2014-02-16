<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<script>console.log("### loop-topics.php ###")</script>


<?php do_action( 'bbp_template_before_topics_loop' ); ?>



<div class="large-12">
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">



	<li class="bbp-body">
		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>
			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>
		<?php endwhile; ?>
	</li>



</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
</div>



<?php do_action( 'bbp_template_after_topics_loop' ); ?>
