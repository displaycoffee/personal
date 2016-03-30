<?php
	/**
	* Template for displaying the footer
	*/
?>
		</div>
	</section>
	<footer id="footer">
		<p id="copyright">
			<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'ambase' ), '&copy;', date( 'Y' ), get_bloginfo( 'name' ) ); ?>
		</p>
		<p id="credits">
			<?php printf( __( 'Theme by %s', 'ambase' ), '<a href="//neverend.org/adria" target="_blank">Adria Murphy</a>' ); ?>
		</p>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>