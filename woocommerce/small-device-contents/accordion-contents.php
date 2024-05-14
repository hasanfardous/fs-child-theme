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

        <?php
        // Product Curriculum
        if ( count($product_curriculums) > 1 ) {
            ?>
            <!-- Course Curriculum -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="small-panelsStayOpen-heading2">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2" aria-expanded="false" aria-controls="panelsStayOpen-collapse2">
                        Course Curriculum
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse" aria-labelledby="small-panelsStayOpen-heading2">
                    <div class="accordion-body">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div id="la-single-curriculum-sml" class="d-block d-xl-none">
                                <div id="la-course-curriculum">
                                    <div class="mcdt-accordion">
                                        <?php
                                        $j = 0;
                                        foreach ( $product_curriculums as $item ) {
                                            $j++;
                                            ?>
                                            <div>
                                                <p class="mcdt-toggle<?php echo esc_attr( $j == 1 ? ' mcdt-toggle-show' : '' )?>">
                                                    <?php echo $item['curr_title']?> <span class="fa fa-chevron-right"></span>
                                                </p>

                                                <div class="mcdt-inner">
                                                    <?php
                                                    $counter = 0;
                                                    $curr_dur = $item['curr_dur'];
                                                    foreach ( $item['curr_text'] as $curr_text ) {
                                                        ?>
                                                        <div class="single-curr-item">
                                                            <p><?php echo $curr_text?></p>
                                                            <span><?php echo $curr_dur[$counter++]?></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
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
            </div>
            <?php
        }

        if ( ! empty( $wc_product_accreditation ) ) {
            ?>
            <!-- Recognised Accreditation -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="small-panelsStayOpen-heading3">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3" aria-expanded="false" aria-controls="panelsStayOpen-collapse3">
                        Recognised Accreditation
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse" aria-labelledby="small-panelsStayOpen-heading3">
                    <div class="accordion-body">
                        <?php echo wpautop($wc_product_accreditation)?>
                    </div>
                </div>
            </div>
            <?php
        }

        if ( ! empty( $wc_product_certification ) ) {
        ?>
            <!-- Course Certification -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="small-panelsStayOpen-heading4">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4" aria-expanded="false" aria-controls="panelsStayOpen-collapse4">
                    Certificate of Achievement
                    </button>
                </h2>
                <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse" aria-labelledby="small-panelsStayOpen-heading4">
                    <div class="accordion-body">
                        <?php echo wpautop($wc_product_certification)?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

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