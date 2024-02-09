<?php

/**
 * Footer.php
 *
 * From here to the end of the file can be put into footer.php file to load in with:
 * 
 * get_footer('NAME'); // footer-NAME.phpnp
 */

$the_shops_hours = get_field_object('shop_hours', 'option');

?>
</div><!-- /container -->
</div><!-- /Inner -->
</main><!-- /Main -->

</div><!-- /Wrapper -->

<footer id="mainFooter" class="footer">
    <div class="columns is-align-content-center">
        <!-- <div class="column"><?php get_search_form(); ?></div> -->
        <div class="column has-text-centered"><?php pxc_simple_menu(); ?></div>
        <div class="column has-text-right">
            <button onClick="scrollToSmoothly(document.querySelector('#header').offsetTop, 300)" class="button round is-info m-0">
                <span class="icon is-info">
                    <i class="fas fa-arrow-up"></i>
                </span>
            </button>
        </div>
    </div>
    <div class="columns is-align-content-center has-text-centered my-5">
        <div class="column">&nbsp;</div>
        <div class="column is-one-third">
            <div class="columns is-multiline is-mobile mb-5">
                <h6 class="column is-full"><?php echo get_store_address(true); ?></h6>
                <?php if (!empty($the_shops_hours) && FALSE !== $the_shops_hours) {
                    echo '<p class="column is-full">' . $the_shops_hours['value'] . '</p>';
                } ?>
            </div>
            <div class="cardimages columns">
                <div id="inc736_image2" class="column">
                    <img src="https://media-us.camilyo.software/media-us/static/0683/123.svg" alt="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts MasterCard" title="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts MasterCard" />
                </div>
                <div id="inc736_image3" class="column">
                    <img src="https://media-us.camilyo.software/media-us/static/0683/124.svg" alt="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts Visa" title="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts Visa" />
                </div>
                <div id="inc736_image4" class="column">
                    <img src="https://media-us.camilyo.software/media-us/static/0683/121.svg" alt="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts American Express" title="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts American Express" />
                </div>
                <div id="inc736_image5" class="column">
                    <img src="https://media-us.camilyo.software/media-us/static/0683/122.svg" alt="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts Discover Card" title="Nationwide Floor &amp; Window Coverings in Eau Claire, WI accepts Discover Card" />
                </div>
            </div>

        </div>
        <div class="column">&nbsp;</div>
    </div>
    <hr>
    <div class="columns is-align-content-center">
        <div class="column">
            <h5>&copy; <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a> | <a href="<?php echo get_admin_url(); ?>" class="">Dashboard</a></h5>
        </div>
        <div class="column">&nbsp;</div>
        <div class="column has-text-right"><small class="d11z"><?php echo esc_html('<'); ?><a href="https://www.darrensopiarz.com/" target="_blank">d11z</a><?php echo esc_html('/>'); ?></small></div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>