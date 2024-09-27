$(document).ready(function() {
    $('.banner_slide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
    });

    $('.responsive').slick({
        infinite: false,
        speed: 300,
        dots: false,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });



    var $dropdownMenu = $('#dropdownMenu');
    var $dropdownArrow = $('#dropdownArrow');
    $dropdownArrow.click(function(event) {
        event.preventDefault();
        $dropdownMenu.toggleClass('show');
    });

    $(document).click(function(event) {
        if (!$(event.target).closest($dropdownMenu).length && !$(event.target).closest(
                $dropdownArrow).length) {
            $dropdownMenu.removeClass('show');
        }
    });

    // Xử lý phần hiện input search
    $('#searchIcon').on('click', function(event) {
        event.stopPropagation();
        var $searchForm = $('#searchForm');
        $searchForm.toggleClass('show');

        if ($searchForm.hasClass('show')) {
            // Nếu form hiển thị, focus vào input
            $searchForm.find('input').focus();
        }
    });

    $(document).on('click', function(event) {
        var $searchForm = $('#searchForm');
        if (!$searchForm.is(event.target) && $searchForm.has(event.target).length === 0) {
            $searchForm.removeClass('show');
        }
    });

    $('#searchForm').on('click', function(event) {
        event.stopPropagation(); 
    });



});
window.onscroll = function() {
    stickyHeader();
};

var header = document.querySelector('header');
var sticky = header.offsetTop;

function stickyHeader() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
}
