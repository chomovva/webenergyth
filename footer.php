<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


			</main>
			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">

					<p class="copyright">
						<?php if ( ! empty( trim( $author = get_theme_mod( 'footercopyauthor' ) ) ) ) : ?>
							<strong id="footer-copy-author" class="author"><?php echo $author; ?></strong> <br>
						<?php endif; ?>
						<span id="footer-copy-title" class="title">&copy; <?php echo get_theme_mod( 'footercopytitle', get_bloginfo( 'name', 'raw' ) ); ?></span>, <?php echo date( 'Y' ); ?>
					</p>

					<?php if ( get_theme_mod( 'footersocialsusedby' ) ) : get_template_part( 'parts/socials' ); endif; ?>

					<p class="developer"><?php _e( 'Разработка: <a href="https://chomovva.ru/" target="_blank">chomovva</a>', WEBENERGYTH_TEXTDOMAIN ); ?></p>
				</div>
			</footer>
			<?php wp_footer(); ?>
		</div>
	</body>
</html>