<?php
if ( $course_info_text_1 || $course_info_text_2 || $course_info_text_3 || $course_info_text_4 || $course_info_text_5 || $course_info_text_6 ) {
    ?>
    <div id="la-course-small-info">
        <?php
        if ( $course_info_text_1 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_1 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_1)?>" alt="<?php echo $course_info_text_1?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_1?></span>
            </div>
            <?php
        }
        if ( $course_info_text_2 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_2 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_2)?>" alt="<?php echo $course_info_text_2?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_2?></span>
            </div>
            <?php
        }
        if ( $course_info_text_3 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_3 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_3)?>" alt="<?php echo $course_info_text_3?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_3?></span>
            </div>
            <?php
        }
        if ( $course_info_text_4 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_4 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_4)?>" alt="<?php echo $course_info_text_4?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_4?></span>
            </div>
            <?php
        }
        if ( $course_info_text_5 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_5 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_5)?>" alt="<?php echo $course_info_text_5?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_5?></span>
            </div>
            <?php
        }
        if ( $course_info_text_6 ) {
            ?>
            <div class="la-course-small-info-single">
                <?php
                if ( $course_info_icon_6 ) {
                    ?>
                    <img width="20" height="20" src="<?php echo wp_get_attachment_image_url($course_info_icon_6)?>" alt="<?php echo $course_info_text_6?>">
                    <?php
                }
                ?>
                <span><?php echo $course_info_text_6?></span>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}