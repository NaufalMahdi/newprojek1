<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hearside Corner')</title>

    {{-- Fonts & Icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tooplate-vertex.css') }}">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>

    {{-- Navbar (misal kamu include navbar partial di sini) --}}
    @include('partials.navbar')

    {{-- Konten Halaman --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer (optional) --}}

    <!-- JS In-Page Script -->
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

        $(function(){
            const tmMainNav = $("#tm-main-nav");

            tmMainNav.singlePageNav({
                filter: ':not(.external)'
            });

            $('.navbar-toggler').click(function(e) {
                e.stopPropagation();
                tmMainNav.toggleClass('show');
            });

            $("html").click(function(e) {
                $("#tm-main-nav").removeClass("show");
            });

            $(".tm-btn-next").on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800);
                }
            });

            $('.tm-brand-icon').on('click', function(event) {
                $('html, body').animate({
                    scrollTop: $('#intro').offset().top
                }, 800);
            });

            const galleryItems = document.querySelector(".tm-gallery")?.children || [];
            const itemsPerPage = 10;
            const totalPages = Math.ceil(galleryItems.length / itemsPerPage);
            const pageAttribute = 'data-page';

            function setPagination(currentPage) {
                for(let i = 1; i <= totalPages; i++) {
                    var $pager = '';

                    $pager = $('<a href="javascript:void(0);" class="tm-paging-link" '+pageAttribute+'="'+i+'"></a>');
                    if(currentPage == i) $pager.addClass('active');

                    $pager.html(i);
                    $pager.click(function(){ 
                        $('.tm-paging-link').removeClass("active");
                        $(this).addClass('active');
                        var page = $(this).attr(pageAttribute);
                        showItems(page);
                    });

                    $pager.appendTo($('.tm-paging'));
                }
            }

            function showItems(currentPage) {
                for(let i = 0; i < galleryItems.length; i++) {
                    galleryItems[i].classList.remove("show");
                    galleryItems[i].classList.add("hide");

                    if(i >= (currentPage * itemsPerPage) - itemsPerPage && i < currentPage * itemsPerPage) {
                        galleryItems[i].classList.remove("hide");
                        galleryItems[i].classList.add("show");
                    }
                }
            }

            setPagination(1);
            showItems(1);

            $('.tm-gallery').magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: { enabled: true }
            });
        }); 
    </script>

    <script src="{{ asset('assets/js/plugins.js') }}"></script>
</body>
</html>
