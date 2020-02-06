/**
 * Created by mmai on the birthday of the flying spagetthi monster
 */
jQuery(document).ready(function ($) {
    $("a:not(:has(img,div))").filter(function () {
        return this.hostname && this.hostname !== location.hostname;
    }).attr('target', '_blank').addClass('mnc-ext-link').each(function(index) {
        let me = $(this);
        if (me.attr('title') === undefined) {
            let linkTitle = me.html() + " in neuem Tabreiter oder Fenster öffnen...";
            me.attr('title', linkTitle);
        }
    });
    // $("a[target='_blank']:not(:has(img,div))").addClass('mnc-ext-link');
    // $("a:not(:has(img,div))").addClass('mnc-ext-link');
});