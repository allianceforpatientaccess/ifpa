<?php /*Template Name: Summits*/ ?>

<?php get_header(); ?>

<main role="main">
	<section class="single">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php the_content() ?>
		<?php endwhile; ?>
	<?php endif; ?>
	</section>
	
	<section>
		<h1>Summits</h1>
		<?php
			$catObj = get_category_by_slug('summits'); 
			$catId = $catObj->term_id;
			//$catquery = new WP_Query('cat='.$catId);
			query_posts('cat='.$catId);
			get_template_part('loop');
		?>
	</section>
</main>
<?php get_footer(); ?>