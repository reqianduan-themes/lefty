<?php get_header(); ?>

		<div class="content pure-u-1 pure-u-md-4-5">
			<!-- <div class="entries">
				<h1 class="content-subhead">Pinned Post</h1>

				<section class="entry">
					<header class="entry-header">
						<img class="entry-avatar" alt="Tilo Mitra&#x27;s avatar" height="48" width="48" src="img/common/tilo-avatar.png">

						<h2 class="entry-title">Introducing Pure</h2>

						<p class="entry-meta">
							By
							<a href="#" class="entry-author">Tilo Mitra</a>
							under
							<a class="entry-category entry-category-design" href="#">CSS</a>
							<a class="entry-category entry-category-pure" href="#">Pure</a>
						</p>
					</header>

					<div class="entry-description">
						<p>
							Yesterday at CSSConf, we launched Pure – a new CSS library. Phew! Here are the
							<a href="https://speakerdeck.com/tilomitra/pure-bliss">slides from the presentation</a>
							. Although it looks pretty minimalist, we’ve been working on Pure for several months. After many iterations, we have released Pure as a set of small, responsive, CSS modules that you can use in every web project.
						</p>
					</div>
				</section>
			</div> -->

			<div class="entries">
				<h1 class="content-subhead">Recent Posts</h1>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<section class="entry">
							<header class="entry-header">
								<?php $author_id = get_the_author_meta('ID'); ?>
								<a href="<?php echo get_author_posts_url($author_id); ?>" title="查看作者">
									<img class="entry-avatar" alt="<?php the_author_meta('display_name'); ?>&#x27;s avatar" height="48" width="48" src="<?php echo getAvatarUrl($author_id); ?>">
								</a>

								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>

								<p class="entry-meta">
									By
									<a class="entry-author" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
									under
									<a class="entry-category entry-category-js" href="#">JavaScript</a>
									<?php echo get_the_category(); ?>
								</p>
							</header>

							<div class="entry-description">
								<p>
									<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, '...'); ?>
								</p>
							</div>
						</section>
					<?php endwhile; ?>

					<div class="pagination" role="navigation">
				    	<?php getPagination(9); ?>
				    </div>
			    <?php else : ?>
		    		<h2>Not Found</h2>
		    	<?php endif; ?>	
			</div>
				
<?php get_footer(); ?>