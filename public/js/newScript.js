// Get the modal
var modal = document.getElementById("exteriorModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("exterior");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption1");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    // captionText.innerHTML = this.alt;
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
    // captionText.innerHTML = this.alt;
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
    // captionText.innerHTML = this.alt;
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
    // captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[3];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

/**
 * Get the modal checkin
 */
var modal = document.getElementById("checkin1Modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("checkin1");
var modalImg = document.getElementById("img05");
var captionText = document.getElementById("caption5");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.getAttribute('data-bg');
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[4];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

/**
 * Get the modal checkin2
 */
var modal = document.getElementById("checkin2Modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("checkin2");
var modalImg = document.getElementById("img06");
var captionText = document.getElementById("caption6");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.getAttribute('data-bg');
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeModal")[5];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

/**
 * Get the modal all
 */
var kamarModal = document.getElementById("kamarModal");
var kamar2Modal = document.getElementById("kamar2Modal");
var kamar3Modal = document.getElementById("kamar3Modal");
var kamar4Modal = document.getElementById("kamar4Modal");
var activityModal = document.getElementById("activityModal");
var activity2Modal = document.getElementById("activity2Modal");
var activity3Modal = document.getElementById("activity3Modal");
var activity4Modal = document.getElementById("activity4Modal");
var dinnerModal = document.getElementById("dinnerModal");
var dinner2Modal = document.getElementById("dinner2Modal");
var dinner3Modal = document.getElementById("dinner3Modal");
var dinner4Modal = document.getElementById("dinner4Modal");
var aulaModal = document.getElementById("aulaModal");
var aula2Modal = document.getElementById("aula2Modal");
var aula3Modal = document.getElementById("aula3Modal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var kamar = document.getElementById("kamar");
var kamar2 = document.getElementById("kamar2");
var kamar3 = document.getElementById("kamar3");
var kamar4 = document.getElementById("kamar4");
var activity = document.getElementById("activity");
var activity2 = document.getElementById("activity2");
var activity3 = document.getElementById("activity3");
var activity4 = document.getElementById("activity4");
var dinner = document.getElementById("dinner");
var dinner2 = document.getElementById("dinner2");
var dinner3 = document.getElementById("dinner3");
var dinner4 = document.getElementById("dinner4");
var aula = document.getElementById("aula");
var aula2 = document.getElementById("aula2");
var aula3 = document.getElementById("aula3");

var modalImg7 = document.getElementById("img07");
var modalImg8 = document.getElementById("img08");
var modalImg9 = document.getElementById("img09");
var modalImg10 = document.getElementById("img10");
var modalImg11= document.getElementById("img11");
var modalImg12= document.getElementById("img12");
var modalImg13= document.getElementById("img13");
var modalImg14 = document.getElementById("img14");
var modalImg15= document.getElementById("img15");
var modalImg16= document.getElementById("img16");
var modalImg17= document.getElementById("img17");
var modalImg18 = document.getElementById("img18");
var modalImg19= document.getElementById("img19");
var modalImg20= document.getElementById("img20");
var modalImg21 = document.getElementById("img21");

kamar.onclick = function(){
    kamarModal.style.display = "block";
    modalImg7.src = this.getAttribute('src');
}
kamar2.onclick = function(){
    kamar2Modal.style.display = "block";
    modalImg8.src = this.getAttribute('src');
}
kamar3.onclick = function(){
    kamar3Modal.style.display = "block";
    modalImg9.src = this.getAttribute('src');
}
kamar4.onclick = function(){
    kamar4Modal.style.display = "block";
    modalImg10.src = this.getAttribute('src');
}
activity.onclick = function(){
    activityModal.style.display = "block";
    modalImg11.src = this.getAttribute('src');
}
activity2.onclick = function(){
    activity2Modal.style.display = "block";
    modalImg12.src = this.getAttribute('src');
}
activity3.onclick = function(){
    activity3Modal.style.display = "block";
    modalImg13.src = this.getAttribute('src');
}
activity4.onclick = function(){
    activity4Modal.style.display = "block";
    modalImg14.src = this.getAttribute('src');
}
dinner.onclick = function(){
    dinnerModal.style.display = "block";
    modalImg15.src = this.getAttribute('data-bg');
}
dinner2.onclick = function(){
    dinner2Modal.style.display = "block";
    modalImg16.src = this.getAttribute('data-bg');
}
dinner3.onclick = function(){
    dinner3Modal.style.display = "block";
    modalImg17.src = this.getAttribute('data-bg');
}
dinner4.onclick = function(){
    dinner4Modal.style.display = "block";
    modalImg18.src = this.getAttribute('data-bg');
}
aula.onclick = function(){
    aulaModal.style.display = "block";
    modalImg19.src = this.getAttribute('data-bg');
}
aula2.onclick = function(){
    aula2Modal.style.display = "block";
    modalImg20.src = this.getAttribute('data-bg');
}
aula3.onclick = function(){
    aula3Modal.style.display = "block";
    modalImg21.src = this.getAttribute('data-bg');
}

// Get the <span> element that closes the modal
var span6 = document.getElementsByClassName("closeModal")[6];
var span7 = document.getElementsByClassName("closeModal")[7];
var span8 = document.getElementsByClassName("closeModal")[8];
var span9 = document.getElementsByClassName("closeModal")[9];
var span10 = document.getElementsByClassName("closeModal")[10];
var span11 = document.getElementsByClassName("closeModal")[11];
var span12 = document.getElementsByClassName("closeModal")[12];
var span13 = document.getElementsByClassName("closeModal")[13];
var span14 = document.getElementsByClassName("closeModal")[14];
var span15 = document.getElementsByClassName("closeModal")[15];
var span16 = document.getElementsByClassName("closeModal")[16];
var span17 = document.getElementsByClassName("closeModal")[17];
var span18 = document.getElementsByClassName("closeModal")[18];
var span19 = document.getElementsByClassName("closeModal")[19];
var span20 = document.getElementsByClassName("closeModal")[20];

// When the user clicks on <span> (x), close the modal
span6.onclick = function() {
    kamarModal.style.display = "none";
}
span7.onclick = function() {
    kamar2Modal.style.display = "none";
}
span8.onclick = function() {
    kamar3Modal.style.display = "none";
}
span9.onclick = function() {
    kamar4Modal.style.display = "none";
}
span10.onclick = function() {
    activityModal.style.display = "none";
}
span11.onclick = function() {
    activity2Modal.style.display = "none";
}
span12.onclick = function() {
    activity3Modal.style.display = "none";
}
span13.onclick = function() {
    activity4Modal.style.display = "none";
}
span14.onclick = function() {
    dinnerModal.style.display = "none";
}
span15.onclick = function() {
    dinner2Modal.style.display = "none";
}
span16.onclick = function() {
    dinner3Modal.style.display = "none";
}
span17.onclick = function() {
    dinner4Modal.style.display = "none";
}
span18.onclick = function() {
    aulaModal.style.display = "none";
}
span19.onclick = function() {
    aula2Modal.style.display = "none";
}
span20.onclick = function() {
    aula3Modal.style.display = "none";
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


//Scroll
const header = document.querySelector('.main_header');
const threshold = 50; // Adjust this value to control the scroll point (in pixels) where the background appears

window.addEventListener('scroll', function() {
    const scrolled = window.scrollY;
    if (scrolled > threshold) {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)'; // Set desired solid background color
    } else {
        header.style.backgroundColor = 'rgba(0, 0, 0, 0.0)'; // Transparent again
    }
});

//sidebar
const hamburgerIcon = document.getElementById('hamburger-icon');
const rightSidebar = document.getElementById('right-sidebar');

hamburgerIcon.addEventListener('click', () => {
    rightSidebar.classList.toggle('active'); // Toggle the "active" class
});

// Optional: Close sidebar when clicking outside (if desired)
document.addEventListener('click', (event) => {
    if (event.target !== hamburgerIcon && event.target !== rightSidebar) {
        rightSidebar.classList.remove('active');
    }
});
