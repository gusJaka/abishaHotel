// Get the modal
var modal = document.getElementById("exteriorModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("exterior");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Get the modal
var modal = document.getElementById("bukaPintuModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("bukaPintu");
var modalImg = document.getElementById("img02");
var captionText = document.getElementById("caption2");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[1];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Get the modal
var modal = document.getElementById("bagasiModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("bagasi");
var modalImg = document.getElementById("img03");
var captionText = document.getElementById("caption3");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[2];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// Get the modal
var modal = document.getElementById("mengantarModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("mengantar");
var modalImg = document.getElementById("img04");
var captionText = document.getElementById("caption4");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[3];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}


function updateImageSize() {
    const image = document.getElementById("breakfast");
    const rest = document.getElementById("restaurant");
    const bal = document.getElementById("balcony");
    const pool = document.getElementById("pool");
    if (!image) return; // Exit if image not found
    if (!rest) return; // Exit if image not found
    if (!bal) return; // Exit if image not found
    if (!pool) return; // Exit if image not found

    const windowWidth = window.innerWidth;

    // Define different height based on device size (adjust as needed)
    let newHeight;
    if (windowWidth < 600) {
        newHeight = "200px"; // Height for small screens (less than 600px)
    } else if (windowWidth < 1024) {
        newHeight = "300px"; // Height for medium screens (600px to 1024px)
    } else {
        newHeight = "400px"; // Height for large screens (over 1024px)
    }

    image.style.setProperty('height', newHeight, 'important');
    rest.style.setProperty('height', newHeight, 'important');
    bal.style.setProperty('height', newHeight, 'important');
    pool.style.setProperty('height', newHeight, 'important');
}

// Call the function on page load and window resize
window.addEventListener("load", updateImageSize);
window.addEventListener("resize", updateImageSize);
