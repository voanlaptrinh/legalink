@extends('users.index')
@section('name')
    @include('users.home.section_banner')
    <h3 class="text-center pt-4">{{ $file->name }}</h3>
    <div class="sidebar-page-container">
        <div class="content-docx">
            <div class="auto-container shadow-sm p-3 mb-5">


                <!-- Canvas for rendering the PDF -->
                <canvas id="pdf-canvas"></canvas>

                <div class="overlay">
                    <h6 class="pe-3">Để xem toàn bộ tệp vui lòng tải toàn bộ tệp xuống</h6>
                    <form action="{{ route('file.download', $file->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Download <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-cloud-download"
                                viewBox="0 0 16 16">
                                <path
                                    d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383" />
                                <path
                                    d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .content-docx {
            position: relative;
            /* Position context for the overlay */
        }

        .auto-container {
            position: relative;
            /* Make sure child elements are positioned relative to this */
        }

        .overlay {
            display: none;
            /* Hide the overlay initially */
            position: absolute;
            /* Position it over the content */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.5);
            /* Dim the background */
            color: white;
            /* Change text color for visibility */
            justify-content: center;
            /* Center align items */
            align-items: center;
            /* Center align items vertically */
            text-align: center;
            /* Center text */
            padding: 20px;
            transition: opacity 0.3s ease;
            /* Smooth transition */
        }

        .content-docx:hover .overlay {
            display: flex;
            /* Show the overlay on hover */
        }
    </style>
    <!-- Include PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const url = "{{ asset($file->file) }}"; // Adjust this path to point to your PDF file

            // Load the PDF
            const loadingTask = pdfjsLib.getDocument(url);
            loadingTask.promise.then(function(pdf) {
                console.log('PDF loaded');

                // Fetch the first page
                pdf.getPage(1).then(function(page) {
                    console.log('Page loaded');

                    const scale = 1.5; // Adjust scale as needed
                    const viewport = page.getViewport({
                        scale: scale
                    });

                    // Prepare the canvas
                    const canvas = document.getElementById('pdf-canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    // Render the page into the canvas context
                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext).promise.then(function() {
                        console.log('Page rendered');
                    });
                });
            }, function(reason) {
                // Handle PDF loading error
                console.error(reason);
            });
        });
        $(document).ready(function() {
            $('.content-docx').hover(
                function() {
                    $(this).find('.overlay').fadeIn(300);
                },
                function() {
                    $(this).find('.overlay').fadeOut(300);
                }
            );
        });
    </script>
@endsection
