<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<script>console.log("### loop-single-topics.php ###")</script>


<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	
<div class="row">
<div class="large-10 columns">
	<li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-topic-action">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_user_favorites_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-topic-action">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_user_subscribe_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<!-- bbp-topic-meta original location -->

		<?php bbp_topic_row_actions(); ?>
	</li>
</div>


<!-- <div class="large-6 columns"><li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li></div> -->

<!-- <div class="large-9 columns bbp-topic-meta"> -->
		<span class="bbp-topic-started-by"><?php printf( __( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>
		<?php if ( !bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>
			<span class="bbp-topic-started-in"><?php printf( __( 'in: <a href="%1$s">%2$s</a>', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?></span>
		<?php endif; ?>
<!-- </div> -->

<div class="bbp-topic-meta">
		<span class="badge"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></span>
		<span class="freshness"> - <?php //bbp_topic_freshness_link(); 
			$time_since = bbp_get_topic_last_active_time( $topic_id );
			$timestring = esc_html( $time_since );
			if (strpos($timestring,',') == true) {
				$timeBlock = explode(',', $timestring);
				echo $timeBlock[0]." ago";
			} else {
				echo $timestring;
			}
		?></span>
		<span class="bbp-topic-freshness-author"> by <?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>
</div>
</div>


</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->
