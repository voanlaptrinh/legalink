@extends('users.index')

@section('name')
    @include('users.home.section_banner')

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-12 col-md-12 col-sm-12">
                    <div class="our-blogs" id="news-list">
                        @include('users.news.news_list') <!-- Include the partial view for AJAX -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();

            var page = $(this).attr('href').split('page=')[1];
            fetchNews(page);
        });

        function fetchNews(page) {
            $.ajax({
                url: "?page=" + page,
                success: function(data) {
                    $('#news-list').html(data); // Load the new content into the news list section
                },
                error: function(xhr) {
                    console.log("Error fetching news: " + xhr.responseText);
                }
            });
        }
    </script>
@endsection
