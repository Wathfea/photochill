jQuery( document ).ready(function() {
    console.log('Photochill JS Initialised');

    /* Smooth scrolling when clicking on an anchor */
    jQuery('.smooth a').on('click', function(event){
        //event.preventDefault();
        jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top - 100},500);
     });
    lightbox.option({
        'fitImagesInViewport': true
    });

    jQuery('#navbar-collapse-1').on('focusout',function(){
        jQuery(this).removeClass('in');
    });

    //var rellax = new Rellax('.rellax');

    // Is this Explorer/Edge?
    if ((/MSIE 10/i.test(navigator.userAgent)) || (/MSIE 9/i.test(navigator.userAgent)) || (/rv:11.0/i.test(navigator.userAgent)) || (/Edge\/\d./i.test(navigator.userAgent))) {
        jQuery('.parallax-top').css({
            "transform-style" : "flat",
            "transform" : "none"
        });
    }

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



    // Contact box size on responsive

    var windowWidth = jQuery(window).width();
    if(windowWidth < 768){
        jQuery('.wpcf7-form-control-wrap input').attr('size','30');
        jQuery('.wpcf7-form-control-wrap textarea').attr('cols','30');
    }
});

jQuery(window).focus(function() {
    jQuery("body").show();
}).blur(function() {
    if(document.activeElement != (document.getElementsByTagName("iframe")[0] || document.getElementsByTagName("embed")[0])) {
        jQuery("body").hide();
    }
    /*var focusedElement = jQuery(document.activeElement).prop('tagName');
    if ( focusedElement != 'IFRAME' || 'EMBED' ) {
        jQuery("body").hide();
    }*/
});


// jQuery(window).focus(function(e) {
//     jQuery("body").show();
// }).blur(function(e) {
//     console.log(e.target);
//     if(e.target != (document.getElementsByTagName("iframe")[0] || document.getElementsByTagName("embed")[0])) {
//         jQuery("body").hide();
//     }
// });

// var myConfObj = {
//   iframeMouseOver : false
// }
// window.addEventListener('blur',function(){
//   if(myConfObj.iframeMouseOver){
//     console.log('Wow! Iframe Click!');
//   }
// });
//
// document.getElementsByTagName('iframe')[0].addEventListener('mouseover',function(){
//    myConfObj.iframeMouseOver = true;
// });
// document.getElementsByTagName('iframe')[0].addEventListener('mouseout',function(){
//     myConfObj.iframeMouseOver = false;
// });

// var iframeClick = function () {
//     var isOverIframe = false,
//     windowLostBlur = function () {
//         if (isOverIframe === true) {
//             isOverIframe = false;
//         }
//     };
//     jQuery(window).focus();
//     jQuery('iframe').mouseenter(function(){
//         isOverIframe = true;
//         console.log(isOverIframe);
//     });
//     jQuery('iframe').mouseleave(function(){
//         isOverIframe = false;
//         console.log(isOverIframe);
//     });
//     jQuery(window).blur(function () {
//         windowLostBlur();
//     });
// };
// iframeClick();
