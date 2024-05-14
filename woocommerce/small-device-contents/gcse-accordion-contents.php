<!-- Small device's contents -->
<div class="course-details-mobile-contents mt-5 mb-5">
    <div class="accordion" id="accordionPanelsStayOpenExample2">
        <!-- Overview -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="small-panelsStayOpen-heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1" aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                    Overview
                </button>
            </h2>
            <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show" aria-labelledby="small-panelsStayOpen-heading1">
                <div class="accordion-body">
                    <?php the_content()?>
                </div>
            </div>
        </div>

        <!-- Course FAQ -->
        <div class="accordion-item d-none">
            <h2 class="accordion-header" id="small-panelsStayOpen-heading5">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse5" aria-expanded="false" aria-controls="panelsStayOpen-collapse5">
                FAQ
                </button>
            </h2>
            <div id="panelsStayOpen-collapse5" class="accordion-collapse collapse" aria-labelledby="small-panelsStayOpen-heading5">
                <div class="accordion-body">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <?php
                        $counter = 0;
                        foreach ( $wc_product_faqs as $item ) {
                            $counter++;
                            ?>
                            <div class="accordion-item">
                                <h3 class="accordion-header mt-0" id="small-panelsStayOpen-heading7<?php echo esc_attr($counter)?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse7<?php echo esc_attr($counter)?>" aria-expanded="<?php echo esc_attr($counter==1?'true':'false')?>" aria-controls="panelsStayOpen-collapse7<?php echo esc_attr($counter)?>">
                                        <?php echo $item['faq_title']?>
                                    </button>
                                </h3>
                                <div id="panelsStayOpen-collapse7<?php echo esc_attr($counter)?>" class="accordion-collapse collapse<?php echo esc_attr($counter==1?' show':'')?>" aria-labelledby="small-panelsStayOpen-heading7<?php echo esc_attr($counter++)?>">
                                    <div class="accordion-body">
                                        <?php echo $item['faq_text']?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>