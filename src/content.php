<?php
/**
 * Version    : 1.3.1
 * Author     : inc2734
 * Author URI : http://2inc.org
 * Created    : April 17, 2015
 * Modified   : August 7, 2015
 * License    : GPLv2 or later
 * License URI: license.txt
 */
?>
<?php if ( is_single() ) : ?>

<article>
	<div class="entry">
		<?php Habakiri::the_title(); ?>
		<?php Habakiri::the_entry_meta(); ?>
		<?php do_action( 'habakiri_before_entry_content' ); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		<!-- end .entry-content --></div>
		<?php do_action( 'habakiri_after_entry_content' ); ?>
	<!-- end .entry --></div>
	
	<?php Habakiri::the_link_pages(); ?>
	<?php Habakiri::the_related_posts(); ?>
	<?php
	if ( comments_open() || pings_open() || get_comments_number() ) {
		comments_template( '', true );
	}
	?>
</article>

<?php else : ?>

<?php
$post_class[] = 'entries__article';
if ( is_archive() ) {
	$post_class[] = 'entries--archive__article';
}
?>
<article <?php post_class( $post_class ); ?>>
	<div class="entries__article__entry entry">

		<?php if ( Habakiri::get( 'is_displaying_thumbnail' ) === 'false' ) : ?>

			<?php Habakiri::the_title(); ?>
			<div class="entries__article__entry__summary entry-summary">
				<?php the_excerpt(); ?>
			<!-- end .entry-summary --></div>
			<?php Habakiri::the_entry_meta(); ?>

		<?php else : ?>

			<div class="summary-with-thumbnail entries__article__entry--has-thumbnail">
				<div class="summary-with-thumbnail-thumbnail entries__article__entry--has-thumbnail__thumbnail">
					<?php Habakiri::the_post_thumbnail(); ?>
				<!-- end .media-left --></div>
				<div class="summary-with-thumbnail-body entries__article__entry--has-thumbnail__body">
					<?php Habakiri::the_title(); ?>
					<div class="entries__article__entry__summary entry-summary">
						<?php the_excerpt(); ?>
					<!-- end .entry-summary --></div>
					<?php Habakiri::the_entry_meta(); ?>
				<!-- end .media-body --></div>
			<!-- end .media --></div>

		<?php endif; ?>

	<!-- end .entry --></div>
</article>

<?php endif; ?>
