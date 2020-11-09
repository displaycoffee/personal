				</section>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>
	<footer id="footer">
		<div id="copyright">
			&copy; <?php echo esc_html( date_i18n( __( 'Y', 'dcbase' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
