$(document).ready(function() {
    //make event ketika ditulis
	$('#search').on('keyup', function() {
		$('#container').load('src/dashboard.php?keyword=' + $('#search').val());
	});
	
	$('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
});

const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.querySelector('.close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.cart-overlay');
const cartItems = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');

//   cart
let cart = [];

function showCart() {
	cartOverlay.classList.add('transparentBcg');
	cartDOM.classList.add('showCart');
}

function hideCart() {
	cartOverlay.classList.remove('transparentBcg');
	cartDOM.classList.remove('showCart');
}

function setupAPP() {
	cartBtn.addEventListener('click', this.showCart);
	closeCartBtn.addEventListener('click', this.hideCart);
    console.log("testttttttt");
}

document.addEventListener("DOMContentLoaded", () => {
    setupAPP();
    const ui = new UI();
    const books = new Books();
})