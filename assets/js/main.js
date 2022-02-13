jQuery(document).ready(function () {
    jQuery('.sticky').stickr({
        duration: 0,
        offsetTop: 0,
        offsetBottom: 30
    });
    jQuery(stickyData.classname).stickr({
        duration: 0,
        offsetTop: 0,
        offsetBottom: 30
    });
});