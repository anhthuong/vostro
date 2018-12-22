<?php
/**
 * Template part for displaying carousel item slides
 */
?>
<!-- Slide-->
<div class="swiper-slide">
    <?php echo $this->_var( 'image' ); ?>
    <div class="wrap-content-slide">
        <header class="entry-content">
		<?php echo $this->_var( 'author' ); ?>
		<?php echo $this->_var( 'post_title' ); ?>
		<?php echo $this->_var( 'category' ); ?>
	</header>
	<article class="entry-content">
		<?php echo $this->_var( 'excerpt' ); ?>
<!--		<div class="entry-meta">
			<?php //echo $this->_var( 'date' ); ?>
			<?php //echo $this->_var( 'count' ); ?>
			<?php //echo $this->_var( 'tag' ); ?>
		</div>-->
	</article>
        <!--<div class="arrow-down"></div>-->
<!--	<footer class="entry-footer">
		<?php //echo $this->_var( 'more_button' ); ?>
	</footer>-->
    </div>
</div>
