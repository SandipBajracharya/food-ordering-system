let Toast;

$(document).ready(function() {
    Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: false
    });
});

function addToCart(id) {
    let token = document.getElementById('accessToken').value;
    console.log(token);
    if (id && token) {
        $.ajax({
            type: "GET",
            headers: {"Authorization": `Bearer ${token}`},
            url: "/api/add-to-cart/"+id,
            success: function (response) {
                console.log(response);
                Toast.fire({
                    icon: 'success',
                    title: '<i class="fas fa-shopping-cart me-3"></i> Added to cart'
                });
                document.getElementById('cart-badge').innerHTML = response.item_count;
            },
            error: function (error) {
                console.log(error.responseJSON.message);
                Toast.fire({
                    icon: 'error',
                    title: error.responseJSON.message
                });
            }
        })
    }
}
