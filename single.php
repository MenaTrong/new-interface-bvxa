<?php get_header(); ?>

<main class="bg-white" id="main">

	<!-- ======= Section News ======= -->
	<section id="singlenews" style="padding-top: 0;">

		<div class="container">

			<div class="row">
				<?php get_template_part('breadcrumbnews'); ?>
				<div class="col-xxl-9 blog-details">

					<article class="article">
						<div class="post-img">
							<?php the_post_thumbnail('full', ['class' => 'img-fluid', 'style' => 'width: 100%; height: 100%; object-fit: cover;', 'alt' => 'Ảnh tiêu biểu']); ?>
						</div>

						<h1 class="title"><?php echo the_title(); ?></h1>

						<div class="meta-top">
							<ul>
								<li><i class="bi bi-tag-fill"></i><strong>Khoa:
									</strong><?php the_category(', '); ?></li>
								<li><i class="bi bi-person-fill"></i><strong>Tác giả: </strong>
									<?php
									// Lấy shortcode từ ACF
									$tac_gia = get_field('tac_gia'); // Thay 'slider_shortcode' bằng tên trường của bạn
									
									// Hiển thị shortcode nếu nó tồn tại
									if ($tac_gia) {
										echo do_shortcode($tac_gia);
									}
									?>
								</li>
							</ul>
						</div>
						<!-- End meta top -->

						<div class="content">
							<?php the_content(); ?>
						</div>
						<!-- End post content -->

						<div class="meta-bottom">
							<ul>
								<li><strong>Ngày đăng: </strong><?php echo get_the_date(); ?></li>
								<li><strong>Ngày cập nhật: </strong><?php echo get_the_modified_date(); ?></li>
							</ul>
						</div>
						<!-- End meta top -->
					</article>
				</div>

				<div class="col-xxl-3 blog-details">

					<div class="latest-news">
						<h4 class="latest-news-title">Bình luận</h4>
						<?php
						if (comments_open() || get_comments_number()) {
							comments_template();
						}
						?>
					</div>

					<div class="latest-news m-t-20">
						<h4 class="latest-news-title">Tags</h4>
						<div class="news-tags">
							<?php
							// Kiểm tra xem bài viết có thẻ không
							$tags = get_the_tags();
							if ($tags) {
								echo '<div class="tag-container">';
								foreach ($tags as $tag) {
									$tag_link = get_tag_link($tag->term_id); // Lấy link của thẻ
									echo '<a href="' . esc_url($tag_link) . '" class="tag-item">' . esc_html($tag->name) . '</a>';
								}
								echo '</div>';
							} else {
							}
							?>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-xxl-12 col-md-6">
							<div class="latest-news m-t-20">
								<h4 class="latest-news-title">Tin tức mới nhất</h4>
								<ul class="latest-news-list">
									<?php
									$args = array(
										'posts_per_page' => 5, // Số lượng bài viết cần lấy
										'post_status' => 'publish',
										'orderby' => 'date',
										'order' => 'DESC'
									);
									$latest_news = new WP_Query($args);

									if ($latest_news->have_posts()):
										while ($latest_news->have_posts()):
											$latest_news->the_post();
											?>
											<li class="latest-news-item">
												<div class="news-thumb">
													<a href="<?php the_permalink(); ?>">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail('thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
														<?php else: ?>
															<img src="path/to/placeholder.jpg" alt="Ảnh tiêu biểu"
																class="img-fluid">
														<?php endif; ?>
													</a>
												</div>
												<div class="news-info">
													<div class="news-category">
														<?php
														$categories = get_the_category();
														if (!empty($categories)) {
															// Lấy danh mục đầu tiên
															$category = $categories[0];

															// Kiểm tra nếu danh mục có danh mục cha
															if ($category->parent != 0) {
																// Lấy danh mục cha
																$parent_category = get_category($category->parent);
																echo '<a href="' . esc_url(get_category_link($parent_category->term_id)) . '">' . esc_html($parent_category->name) . '</a>';
															} else {
																// Nếu không có danh mục cha, hiển thị chính nó
																echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
															}
														} else {
															// Fallback nếu bài viết không có danh mục nào
															echo '<span class="no-category">Uncategorized</span>';
														}
														?>
													</div>
													<h5 class="news-title news-title-short">
														<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
													</h5>
													<div class="news-excerpt">
														<?php echo get_the_excerpt(); ?>
													</div>
												</div>
											</li>
											<?php
										endwhile;
										wp_reset_postdata();
									else:

									endif;
									?>
								</ul>
							</div>
						</div>

						<div class="col-12 col-xxl-12 col-md-6">
							<div class="latest-news m-t-20">
								<h4 class="latest-news-title">Chương trình ưu đãi</h4>
								<ul class="latest-news-list">
									<?php
									$args = array(
										'posts_per_page' => 5, // Số lượng bài viết cần lấy
										'post_status' => 'publish',
										'post_type' => 'package',
										'orderby' => 'date',
										'order' => 'DESC'
									);
									$latest_news = new WP_Query($args);

									if ($latest_news->have_posts()):
										while ($latest_news->have_posts()):
											$latest_news->the_post();
											?>
											<li class="latest-news-item">
												<div class="news-thumb">
													<a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link', true)); ?>">
														<?php if (has_post_thumbnail()): ?>
															<?php the_post_thumbnail('thumbnail', ['class' => 'img-fluid', 'alt' => get_the_title()]); ?>
														<?php else: ?>
														<?php endif; ?>
													</a>
												</div>
												<div class="news-info">
													<h5 class="news-title">
														<a
															href="<?php echo esc_url(get_post_meta(get_the_ID(), 'link', true)); ?>"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></a>
													</h5>
													<div class="news-excerpt">
														<?php echo get_the_excerpt(); ?>
													</div>
												</div>
											</li>
											<?php
										endwhile;
										wp_reset_postdata();
									endif;
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	</section>
	<!-- End Section -->
	<?php get_template_part('modal'); ?>
</main>


<?php get_footer(); ?>
<!-- End Section -->

<?php get_template_part('modal'); ?>
</ma <?php get_footer(); ?>