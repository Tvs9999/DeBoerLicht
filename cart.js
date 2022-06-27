function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('in-cart-item')
    var cartRows = cartItemContainer.getElementsByClassName('in-cart-item')
    for(var i = 0; i < cartRow.length; i++){
        cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('in-cart-item')
        var quantityElement = cartRow.getElementsByClassName('cart-aantal')
        console.log(priceElement, quantityElement)
    }
}