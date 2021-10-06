<?php


namespace webenergyth;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


			</main>
			<footer class="wrapper__item wrapper__item--footer footer" id="footer">
				<div class="container">

					<p class="copyright">
						<?php if ( ! empty( trim( $author = get_theme_mod( 'footercopyauthor' ) ) ) ) : ?>
							<strong class="author"><?php echo $author; ?></strong> <br>
						<?php endif; ?>
						<span class="title">&copy; <?php echo get_theme_mod( 'footercopytitle', get_bloginfo( 'name', 'raw' ) ); ?></span>, <?php echo date( 'Y' ); ?>
					</p>

					<?php get_template_part( 'parts/socials' ); ?>

					<p class="developer">Разработка: <a href="https://chomovva.ru/">chomovva</a></p>
				</div>
			</footer>
			<?php wp_footer(); ?>
		</div>
	</body>
</html>