jQuery(document).ready(function($) {

    if( jQuery('ul.children').length ) 
    {
        jQuery('ul.children').parent().append('<button class="open-category-submenu-btn"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>');

        jQuery('.open-category-submenu-btn').click(function(){
            jQuery(this).parent().children( 'ul.children' ).slideToggle('fast');
        });
    }
});