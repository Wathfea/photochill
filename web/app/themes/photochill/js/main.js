jQuery( document ).ready(function() {
    console.log('Photochill JS Initialised');

    /* Smooth scrolling when clicking on an anchor */
    jQuery('.smooth a').on('click', function(event){
     event.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top},500);
     });
    lightbox.option({
        'fitImagesInViewport': true
    });

    // Disable right click
    jQuery(document).bind('contextmenu', function(e) {
        return false;
    });
    //Disable print screen
    function copyToClipboard() {
        var aux = document.createElement("input");
        aux.setAttribute("value", "A print screen nem engedélyezett!");
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
        alert("A print screen nem engedélyezett!");
    }

    jQuery(window).keyup(function(e){
        if(e.keyCode == 44){
            copyToClipboard();
        }
    });

    jQuery(window).focus(function() {
        jQuery("body").show();
    }).blur(function() {
        jQuery("body").hide();
    });
});
