<div class="property-item">
    <div class="pro-image-wrapper">
        <?php if (has_post_thumbnail()): ?>
            <div class="property-thumb">
                <?php the_post_thumbnail('medium'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="post-content">
        <div class="pro-id">
            <?php if ($property_id = get_field('property_id')): ?>
                <p><strong>Property ID:</strong> <?php echo esc_html($property_id); ?></p>
            <?php endif; ?>
        </div>

        <div class="pro-short-content">
            <div><?php the_excerpt(); ?></div>
        </div>

        <div class="pro-amenities">
            <ul>
                <?php if ($bed = get_field('amenities_of_beds')): ?>
                    <li><img src="" alt=""> <?php echo esc_html($bed); ?></li>
                <?php endif; ?>
                <?php if ($bath = get_field('amenities_of_baths')): ?>
                    <li><img src="" alt=""> <?php echo esc_html($bath); ?></li>
                <?php endif; ?>
                <?php if ($sqft = get_field('squar_fit_info')): ?>
                    <li><img src="" alt=""> <?php echo esc_html($sqft); ?></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="price">
            <?php if ($price = get_field('price')): ?>
                <?php echo esc_html($price); ?>
            <?php endif; ?>
        </div>
    </div>
</div>
