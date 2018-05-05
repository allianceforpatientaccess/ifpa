<?php $articleCount = 0; ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<!--if the post title contains no spaces AND isn't titled "infographic" (i.e. not content), skip it (hack to display content media)-->
	<?php if (!strpos(the_title('','',false),' ') && strpos(the_title('','',false),"Infographic")) {
		continue;
	} ?>

	<!-- article -->
	<article style="display: block; min-height: 220px" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post thumbnail -->
		<a class="loop-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php the_post_thumbnail(array(300,200)); // Declare pixel size you need inside the array ?>
		</a>
		<!-- /post thumbnail -->

		<!-- post title -->
		<h1 style="display: flex; padding-left: 10px;">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h1>
		<!-- /post title -->

		<!-- post date -->
		<h2 style="display: flex; padding-left: 10px; text-transform: uppercase;">
			<?php the_time(get_option('date_format')); ?>
		</h2>
		<!-- /post date -->

		<!-- excerpt, read more, edit post links -->
		<?php echo "<h2 style='display: flex; padding: 5px 10px;'"; // dumb hack to correctly style the excerpt ?>
		<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
		<?php echo "</h2><a style='display: flex; padding: 0px 10px;'"; ?>
		<?php edit_post_link(); ?>
		<?php echo "</a>"; ?>
		<!-- /excerpt, read more, edit post links -->
	</article>
	<!-- /article -->

	<!--adding breaks between articles-->
	<?php $articleCount++; ?>
	<?php if($articleCount <= 3): ?> <!-- loop.php is only called by front-page.php, so hardcoding this at 3 -->
		<div style="margin-bottom: 20px; height: 1px; background-color: #707070"></div>
	<?php endif; ?>

<?php endwhile; ?>
<?php else: ?>
	<!-- article -->
	<article>
		<h1 style="text-align: center; color: #2AAD69; padding-bottom: 20px;"><?php _e( 'Sorry, nothing to display.		:(', 'html5blank' ); ?></h1>
	</article>
	<!-- /article -->
<?php endif; ?>