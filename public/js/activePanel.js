$(document).ready(function() {
    let path = window.location.pathname;
    let c = path.split('/');
    let length = c.length - 1;
    let cls = c[length];
    $(`#${cls}`).addClass("active");

    if (cls == 'product-size') {
        $("#products").addClass("menu-open");
    } else if (cls == 'approved-vendors' || cls == 'pending-vendors') {
        $("#vendors").addClass("menu-open");
    }
});
