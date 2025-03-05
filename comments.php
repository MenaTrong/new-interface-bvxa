<div class="container blog-comments">
    <div class="container">
        <div class="be-comment-block">
            <?php
            // Kiểm tra xem có bình luận nào không
            if (have_comments()):
                $comments = get_comments(array(
                    'post_id' => get_the_ID(),
                    'number' => 3, // Lấy tối đa 3 bình luận
                    'orderby' => 'comment_date', // Sắp xếp theo ngày bình luận
                    'order' => 'DESC' // Sắp xếp giảm dần
                ));
                foreach ($comments as $comment):
                    ?>
                    <div class="be-comment">
                        <div class="be-img-comment">
                            <?php echo get_avatar($comment->comment_author_email, 64, '', '', array('class' => 'be-ava-comment')); ?>
                        </div>
                        <div class="be-comment-content">
                            <span class="be-comment-name">
                                <?php echo esc_html($comment->comment_author); ?> <!-- Hiển thị tên với mã ngẫu nhiên -->
                            </span>
                            <p class="be-comment-text">
                                <?php echo esc_html($comment->comment_content); ?>
                            </p>
                        </div>
                        <span class="be-comment-time">
                            <?php echo esc_html(get_comment_date('d-m-Y H:i', $comment)); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
                <?php the_comments_navigation(); ?>
            <?php endif; ?>


            <form class="m-t-20" action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post">
                <div class="col-xs-12">
                    <div class="form-group">
                        <textarea class="form-input" name="comment" required
                            placeholder="Bình luận của bạn..."></textarea>
                    </div>
                </div>
                <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>">
                <input type="hidden" name="comment_type" value="comment">
                <input type="hidden" name="comment_author_IP" value="<?php echo esc_attr($_SERVER['REMOTE_ADDR']); ?>">
                <input type="hidden" name="comment_agent" value="<?php echo esc_attr($_SERVER['HTTP_USER_AGENT']); ?>">
                <button type="submit" class="btn-get-started">Gửi</button>
            </form>

        </div>
    </div>
</div>
