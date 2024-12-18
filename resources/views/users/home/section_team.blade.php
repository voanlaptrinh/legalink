<!-- Team Section -->
<section class="team-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title light centered">
            <div class="title">Nhân Sự</div>
            <h2>Chuyên Viên Tư Vấn</h2>
        </div>
        <div class="team-carousel">
            <div class="swiper-wrapper">
                @foreach ($members as $member)
                    <div class="swiper-slide">

                        <!-- Team Block -->
                        <div class="team-block">
                            <div class="inner-box">
                                <div class="image">
                                    @if ($member->image)
                                        <a href="{{ route('members.detailuser', $member->alias) }}"><img src="{{ asset($member->image) }}" alt=""
                                                class="img-member" /></a>
                                    @else
                                        <a href="{{ route('members.detailuser', $member->alias) }}"><img src="{{ asset('/source/images/resource/team-1.jpg') }}" class="img-member" 
                                                alt="" /></a>
                                    @endif
                                </div>
                                <div class="lower-content">
                                    <h3><a href="{{ route('members.detailuser', $member->alias) }}">{{ $member->name }}</a></h3>
                                    <div class="text text-white">{{ $member->description }}</div>
                                    <!-- Social Box -->
                                    <ul class="social-box">
                                        <li><a href="mailto: {{ $member->email }}"><span
                                                    class="icofont-mail"></span></a></li>
                                        <li><a href="tel: +{{ $member->phone }}"><span class="icofont-phone"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>
</section>
<!-- Team Section -->
