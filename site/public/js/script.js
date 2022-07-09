// button-detail
$(".product-detail-button").on("click", function() {
    var productID = $(this).data('product-id');
    var productName = $("#product-name-" + productID).text();
    var categoryName = $("#product-category-" + productID).text();
    var featuredImage = $("#product-image-" + productID + " > img").attr('src');

    $('#product-detail-id').text(productID);
    $('#product-detail-name').text(productName);
    $('#product-detail-category').text(categoryName);
    $('#product-detail-image > img').attr('src', featuredImage);
})
// button-edit
$(".product-edit-button").click(function (e) { 
    e.preventDefault();
    var productID = $(this).data('product-id');
    var productName = $("#product-name-" + productID).text();
    var categoryID = $("#product-category-id-" + productID).text();
    categoryID = parseInt(categoryID);
    var categoryName = $("#product-category-" + productID).text();
    var featuredImage = $("#product-image-" + productID + " > img").attr('src'); 
    $('#product-edit-id').val(productID);
    $('#product-edit-name').val(productName);
    $('#product-category-name').val(categoryID).change();
    $('#product-edit-image > img').attr('src', featuredImage);
});
// button-delete
$(".product-delete-button").click(function (e) { 
    e.preventDefault();
    var productID = $(this).data('product-id'); 
    $('#product-delete-id').val(productID);   
});
// button-copy
$(".product-copy-button").click(function (e) { 
    e.preventDefault();
    var productID = $(this).data('product-id'); 
    $('#product-copy-id').val(productID);   
});
