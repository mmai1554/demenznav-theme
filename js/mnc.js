jQuery(document).ready(function ($) {
    $("a:not(:has(img,div,h1,h2,h3,h4))").filter(function () {
        return this.hostname && this.hostname !== location.hostname;
    }).attr('target', '_blank').addClass('mnc-ext-link').each(function(index) {
        let me = $(this);
        if (me.attr('title') === undefined) {
            let linkTitle = 'URL ' + me.attr('href') + " in neuem Tabreiter oder Fenster öffnen...";
            me.attr('title', linkTitle);
        }
    });
    $('#MNCPrint').click(function(e){
        e.preventDefault();
        window.print();
    });
    $('.dropdown-toggle').dropdown();
});