import $ from "jquery";
import "./particles";
import "../sass/frontend.scss";

$(function () {
  // DOM ready

  // If a link has a dropdown, add sub menu toggle.
  $("nav ul li a:not(:only-child)").click(function (e) {
    // Remove "active-dropdown" class from other anchor elements
    $("nav ul li a").not(this).removeClass("active-dropdown");

    // Toggle the "active-dropdown" class on the clicked anchor element
    $(this).toggleClass("active-dropdown");

    // Toggle the visibility of the sibling dropdown
    const mediaQuery = window.matchMedia("(max-width: 64em)");

    // Check the screen size using the media query
    if (mediaQuery.matches) {
      // Mobile: Use slideToggle()
      $(this).siblings(".nav-dropdown").slideToggle();
    } else {
      // Desktop: Use toggle()
      $(this).siblings(".nav-dropdown").toggle();
    }

    // Close one dropdown when selecting another
    $(".nav-dropdown").not($(this).siblings()).hide();

    e.stopPropagation();
  });

  // Clicking away from dropdown will remove the dropdown class and active-dropdown class
  $("html").click(function () {
    $(".nav-dropdown").hide();
    $("nav ul li a:not(:only-child)").removeClass("active-dropdown");
  });

  // Toggle open and close nav styles on click
  $("#nav-toggle").click(function () {
    $("nav ul").slideToggle();
  });

  // Hamburger to X toggle
  $("#nav-toggle").on("click", function () {
    this.classList.toggle("active");
  });
});

/**
 * Initializes particles in a container with the given ID using particlesJS library.
 * @param {string} containerId - The ID of the container element where particles will be initialized.
 * @return {void}
 */
function initializeParticles(containerId) {
  const particles = document.getElementById(containerId);
  if (particles) {
    particlesJS(containerId, {
      particles: {
        number: { value: 80, density: { enable: true, value_area: 800 } },
        color: { value: "#d58163" },
        shape: {
          type: "triangle",
          stroke: { width: 0, color: "#000000" },
          polygon: { nb_sides: 5 },
          image: { src: "img/github.svg", width: 100, height: 100 },
        },
        opacity: {
          value: 0.5,
          random: false,
          anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false },
        },
        size: {
          value: 11.83721462448409,
          random: true,
          anim: { enable: false, speed: 40, size_min: 0.1, sync: false },
        },
        line_linked: {
          enable: false,
          distance: 150,
          color: "#ffffff",
          opacity: 0.4,
          width: 1,
        },
        move: {
          enable: true,
          speed: 1,
          direction: "none",
          random: true,
          straight: false,
          out_mode: "out",
          bounce: false,
          attract: { enable: false, rotateX: 600, rotateY: 1200 },
        },
      },
      interactivity: {
        detect_on: "canvas",
        events: {
          onhover: { enable: false, mode: "repulse" },
          onclick: { enable: true, mode: "push" },
          resize: true,
        },
        modes: {
          grab: { distance: 400, line_linked: { opacity: 1 } },
          bubble: {
            distance: 400,
            size: 40,
            duration: 2,
            opacity: 8,
            speed: 3,
          },
          repulse: { distance: 200, duration: 0.4 },
          push: { particles_nb: 4 },
          remove: { particles_nb: 2 },
        },
      },
      retina_detect: true,
    });
  }
}

// Call the function for the first ID
document.addEventListener("DOMContentLoaded", function (event) {
  initializeParticles("particles-js");
});

// Call the function for the second ID
document.addEventListener("DOMContentLoaded", function (event) {
  initializeParticles("particles-js-long");
});
