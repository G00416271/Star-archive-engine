const form = document.querySelector('#search_archive'); 
form.addEventListener('submit', function(event) { 
    event.preventDefault(); 
}); 

function autoScroll() {
    window.scrollBy({
        top: 600,  // Adjust scrolling speed
        left: 0,
        behavior: 'smooth'
    });


}


window.onscroll = function() {
    let button = document.getElementById("scrollToTopBtn");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

// Function to scroll to the top smoothly
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

function inCart(item){

}


