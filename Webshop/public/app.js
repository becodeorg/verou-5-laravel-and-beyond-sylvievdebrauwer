// JavaScript for confirming deletion
function confirmDeletion(productId) {
    if (confirm('Are you sure you want to delete this product?')) {
        // Redirect to delete route
        window.location.href = '/delete-product/' + productId;
    }
}

document.getElementById('scroll-top-btn').addEventListener('click', function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

document.getElementById('submit-form').addEventListener('click', function(event) {
    var emailInput = document.getElementById('email').value;
    if (!emailInput.includes('@')) {
        event.preventDefault();
        alert('Please enter a valid email address');
    }
});