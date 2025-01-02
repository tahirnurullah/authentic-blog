/** Header: For Main Menu & Mobile Menu */

jQuery(document).ready(function ($) {
    //console.log('Version 5.30');

    // Toggle class for header if screen size above or below 980px
    function tn_class_for_different_device() {
        if ($(window).width() < 980) {
            $(".tn-header").removeClass("tn-header-desktop");
            $(".tn-header").addClass("tn-header-mobile");
        } else {
            $(".tn-header").removeClass("tn-header-mobile");
            $(".tn-header").addClass("tn-header-desktop");
        }
    }
    // Apply behavior on page load
    tn_class_for_different_device();
    // Reapply behavior on window resize
    $(window).resize(function () {
        tn_class_for_different_device();
    });

    // For screens larger than 980px
    // Show/hide dropdown menu on hover (desktop)
    $(".tn-header-desktop .menu-item-has-children").hover(
        function () {
            $(this).children(".sub-menu").stop(true, true).slideDown(300);
        },
        function () {
            $(this).children(".sub-menu").stop(true, true).slideUp(300);
        }
    );

    // For screens 980px and below
    // Show/hide dropdown menu on click (mobile)
    $(document).on("click", ".tn-header-mobile .menu-item-has-children", function (e) {
        e.stopPropagation(); // Prevent propagation to parent elements
    
        const $tn_submenu = $(this).children(".sub-menu");
    
        if ($tn_submenu.is(":visible")) {
            // Hide this submenu and all its child submenus
            $tn_submenu.stop(true, true).slideUp(300).removeClass("sub-menu-show");
            $tn_submenu.find(".sub-menu").stop(true, true).slideUp(300).removeClass("sub-menu-show");
        } else {
            // Close all other submenus at the same level (nested menus)
            $(this).siblings().find(".sub-menu").stop(true, true).slideUp(300).removeClass("sub-menu-show");
            $(this).siblings().removeClass("sub-menu-show");
            // Show this submenu
            $tn_submenu.stop(true, true).slideDown(300).addClass("sub-menu-show");
        }
    });
});


/** Header: Mobile Menu: Button and Side Menu */

jQuery(document).ready(function ($) {
    const $tn_menu_wrapper = $("#tn-menu__wrapper");
    const $tn_menu_toggle = $("#tn-menu__toggle");
    const $tn_menu_overlay = $("#tn-menu__overlay");
  
    // Open: mobile menu when click
    $tn_menu_toggle.on("click", function () {
        if ($tn_menu_wrapper.css("left") === "0px") {
            // Close: mobile menu if open
            $tn_menu_wrapper.css("left", "-330px");
            $tn_menu_overlay.fadeOut(300);
            $tn_menu_toggle.removeClass("tn-menu-open");
            // Remove class from body when menu hide
            $("body").removeClass("tn-mb-menu-open");
            // Hide all dropdown menus
            $(".sub-menu").hide();
            $(".sub-menu").removeClass("sub-menu-show");
        } 
        else {
            // Open: mobile menu if click
            $tn_menu_wrapper.css("left", "0px");
            $tn_menu_overlay.fadeIn(300);
            $tn_menu_toggle.addClass("tn-menu-open");
            // Add class in body when menu show
            $("body").addClass("tn-mb-menu-open");
        }
    });
  
    // Close: mobile menu when clicking outside (on overlay)
    $tn_menu_overlay.on("click", function () {
        $tn_menu_wrapper.css("left", "-330px");
        $tn_menu_overlay.fadeOut(300);
        $tn_menu_toggle.removeClass("tn-menu-open");
        // Remove class from body when menu hide
        $("body").removeClass("tn-mb-menu-open");
        // Hide all dropdown menus
        $(".sub-menu").hide();
        $(".sub-menu").removeClass("sub-menu-show");
    });
});


/** Header: Search Option */

jQuery(document).ready(function ($) {
    // For Search Icon: Toggle search form on click
    $(".tn-search-top .tn-search-btn").on("click", function (e) {
        $(this).next(".tn-search-modal").stop(true, true).fadeToggle(300, "linear");
    });
    // Close search form when click close icon
    $('.tn-close-search').on('click', function() {
        $(".tn-search-modal").stop(true, true).fadeOut(300, "linear");
    });
});


/** Scroll to blog section when click on the pagination link */

// Get the Pagination Link and parameter
document.addEventListener("DOMContentLoaded", function() {
    const tn_paginationLinks = document.querySelectorAll(".tn-blog-posts .nav-links a");
    tn_paginationLinks.forEach(link => {
        // Get the current page link
        const tn_url = new URL(link.href);
        // If 'scrollto' parameter not exist in the link then add
        if (! tn_url.searchParams.has("scrollto")) {
            // Set 'scrollto' parameter with the blog section ID as a value
            tn_url.searchParams.set("scrollto", "blog-posts");
            link.href = tn_url.toString();
        }
    });
});
// Load and Scroll to blog section when clicks on the pagination link
document.addEventListener("DOMContentLoaded", function() {
    // Search the current page link after clicking the pagination link
    const tn_params = new URLSearchParams(window.location.search);
    // Get the value of 'scrollto' parameter
    const tn_sectionID = tn_params.get("scrollto");
    if (tn_sectionID) {
        // Get the parameter value and blog section ID (value and ID must be the same)
        const tn_targetElement = document.getElementById(tn_sectionID);
        if (tn_targetElement) {
            // Smooth scroll to the blog section
            tn_targetElement.scrollIntoView({behavior: "smooth"});
        }
    }
});