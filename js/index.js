// hamburger navbar
const hamburger = document.querySelector('.hamburger')
const Scrolling = document.querySelector('.header-container')
const navSwipe = document.querySelector('.dropdown-nav-mobile')


// back to top button
let calcScrollValue = () => {
    let scrollProgress = document.getElementById("progress");
    let progressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollValue = Math.round((pos * 100) / calcHeight);
    if (pos > 200) {
      scrollProgress.style.display = "grid";
    } else {
      scrollProgress.style.display = "none";
    }
    scrollProgress.addEventListener("click", () => {
      document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(var(--secondary) ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
  }
  window.onscroll = calcScrollValue;
  window.onload = function () {
    hamburger.addEventListener('click', (e) =>{
        e.currentTarget.classList.toggle('is-active')
        navSwipe.classList.toggle('is-swipe')
    })
    calcScrollValue();
}
//   slick slider
$(document).ready(function(){
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        autoplay: true,
        autoplaySpeed: 4000,
      });
})

