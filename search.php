<?php get_header(); ?>
<?php

// get_sidebar();

$acf_meta = array(
    'material',
    // 'is_stock',
    // 'is_clearance',
    'amount_available',
    // 'amount_uom',
    // 'regularprice',
    // 'sale_price',
    // 'retail_price',
    // 'by_piece_or_lot',
    'color_tones',
    // 'manfacturer',
    // 'dye_lot',
    // 'total_coverage',
    // 'coverage_per_box',
    // 'coverage_uom',
    'product_length',
    'product_width',
    // 'product_uom',
);

?>

<div id="wrapper">
    <div id="content" class="container">

        <?php if (have_posts()) : ?>

            <h2 class="pagetitle">Search Results</h2>

            <hr>

            <div class="woocommerce mt-4">
                <div class=columns>
                    <div class="column is-one-quarter">
                        <?php get_search_form(); ?>

                        <hr />
                        
                        <a class="button" href="<?php home_url(); ?>">&larr; Return to Catalog</a>

                        <?php // if (shortcode_exists('wpf-filters')) {
                        // echo do_shortcode('[wpf-filters id=1]');
                        // } ?>
                    </div>

                    <div class=column>
                        <ul class="products searchlisting">

                            <?php while (have_posts()) : the_post(); ?>

                                <li class="product p-4">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="">
                                        <?php

                                        $sample_image_object = get_field_object('sample_image');

                                        $has_sample_image = (false !== $sample_image_object && false !== $sample_image_object['value']);

                                        $clearance_status = get_field_object('is_clearance');

                                        $is_clearance_item = ($clearance_status['value']);

                                        $displayed_price = 'Call for Pricing';

                                        if (!empty($nfawc_p_meta['regularprice']['value'])) {
                                            $displayed_price = '$' . $nfawc_p_meta['regularprice']['value'] . $perDisplay;
                                        }
                                        if (!empty($nfawc_p_meta['sale']['value'])) {
                                            $displayed_price = '$' . $nfawc_p_meta['sale']['value'] . $perDisplay;
                                        }
                                        ?>

                                        <div class="box">
                                            <?php if ($is_clearance_item) {
                                                echo '<span class="is-clearance-item is-size-6 tag is-danger">Clearance</span>';
                                            } ?>
                                            <?php // Image in archive is mysteriously pulled in here instead of by template like single, cool

                                            if ($has_sample_image) {
                                                echo sprintf('<div class="search-image-wrap" style="background-image: url(%s);"></div>', esc_url($sample_image_object['value']['url']), esc_html__('Awaiting product image', 'woocommerce'));
                                            } else {
                                                echo sprintf('<div class="search-image-wrap" style="background-image: url(%s);"></div>', esc_url(get_theme_file_uri("/dist/img/69ce73dd08797d4bffe181f586869ad8.png")), esc_html__('Awaiting product image', 'woocommerce'));
                                            } ?>
                                        </div>

                                        <h3 id="post-<?php the_ID(); ?>" class="woocommerce-loop-product__title mb-0 is-size-2">
                                            <?php the_title(); ?>
                                        </h3>

                                        <?php if (!empty($displayed_price)) { ?>

                                            <div class="price is-size-5 isnt-hidden"><?php echo $displayed_price; ?></div>

                                        <?php } ?>

                                        <div class="prod-loop">
                                            <?php $prodTerms = get_the_terms($post->ID, 'product_cat');
                                            if ($prodTerms && !is_wp_error($prodTerms)) {
                                                if (!empty($prodTerms)) { ?>
                                                    <div class="columns is-gapless is-multiline m-0">
                                                        <strong class="column">Category: </strong>
                                                        <span class="column">
                                                            <?php echo $prodTerms[0]->name; ?>
                                                        </span>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>


                                            <?php foreach ($acf_meta as $selector) {
                                                $field = get_field_object($selector);
                                                $uomDisplay = '';

                                                if (false == $field) {
                                                    // need to check for false first, and avoid trying to access faulty array errors
                                                } else {
                                                    switch ($field['name']) {
                                                        case 'amount_available':
                                                            $uomDisplay = ' ' . get_field('amount_uom')['value'];
                                                            break;

                                                        case 'coverage':
                                                            $uomDisplay = ' ' . get_field('coverage_uom')['value'];
                                                            break;

                                                            // case 'product_width':
                                                            // 	$uomDisplay = ' ' . get_field('product_uom')['value'];
                                                            // 	break;

                                                            // case 'product_length':
                                                            // 	$uomDisplay = ' ' . get_field('product_uom')['value'];
                                                            // 	break;

                                                        default:
                                                            $uomDisplay = '';
                                                            break;
                                                    }
                                                    if (!empty($field['value'])) { ?>

                                                        <div class="columns is-gapless is-multiline m-0">
                                                            <strong class="column"><?php echo $field['label']; ?>: </strong>
                                                            <span class="column">
                                                                <?php if ('text' == $field['type'] || 'number' == $field['type']) {
                                                                    echo $field['value'];
                                                                } elseif ('select' == $field['type']) {
                                                                    echo $field['value']['label'];
                                                                } else {
                                                                    echo $field['value']['value'];
                                                                }
                                                                echo $uomDisplay;
                                                                ?>
                                                            </span>
                                                        </div>
                                            <?php }
                                                }
                                            } ?>
                                        </div>

                                    </a>
                                </li>

                            <?php endwhile; ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <?php echo paginate_links('list'); ?>
            </div>

        <?php else : ?>

            <h2 class="center">No Results Found</h2>
            <p>Try searching again:</p>
            <hr />

            <?php get_search_form(); ?>
        <?php endif; ?>

    </div>

</div>

<?php get_footer(); ?>