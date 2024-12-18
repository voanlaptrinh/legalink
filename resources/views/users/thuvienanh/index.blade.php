@extends('users.index')
@section('name')
    @include('users.home.section_banner')

    <div class="pt-5 pb-5">
        <div class="fs-2 text-center pb-4">Thư viện ảnh</div>
        <div class="auto-container">
            <div class="row g-5">
                @if (count($images) > 0)
                    @foreach ($images as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="image text-center position-relative">
                                <a href="{{ asset($item->image) }}" class="image-popup">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid img-image">
                                </a>
                                <div class="image-title">{{ $item->title }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">Không có ảnh nào</div>
                @endif
            </div>
        </div>
        
    </div>
    <style>
        .image {
            position: relative;
            overflow: hidden;
        }

        .image img {
            transition: 0.4s ease;
        }

        .image .image-title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 2;
        }

        .image:hover img {
            filter: brightness(50%);
        }

        .image:hover .image-title {
            opacity: 1;
        }
    </style>
   <script>
    $(document).ready(function() {
        $('.image-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: false,  // Prevents closing when clicking on content
            closeBtnInside: true,  // Shows close button inside the popup
            mainClass: 'mfp-with-zoom', // Adds zoom-in effect

            gallery: {
                enabled: true // Enables gallery mode for navigation
            },
            zoom: {
                enabled: true,
                duration: 300, // Zoom effect duration in milliseconds
                easing: 'ease-in-out'
            }
        });
    });
</script>

    
@endsection
