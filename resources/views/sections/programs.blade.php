<section class="programs-section">
    <div class="container">
        <div class="section-title">
            <h2>البرامج والمشاريع</h2>
            <p>
                برامج ومبادرات تعليمية نوعية تسهم في بناء مجتمع معرفي متعلم وممكّن.
            </p>
        </div>
        <div id="programCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($programs->chunk(3) as $index => $chunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row g-4 justify-content-center">
                        @foreach($chunk as $program)
                        <div class="col-lg-4 col-md-6">
                            <div class="program-card">
                                <div class="program-icon">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <div class="program-content">
                                    @if($program->subtitle)
                                    <span>
                                        {{ $program->subtitle }}
                                    </span>
                                    @endif
                                    <h3>
                                        {{ $program->title }}
                                    </h3>
                                    <p>
                                        {{ Str::limit($program->description,170) }}
                                    </p>
                                    <button class="program-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#program{{$program->id}}">
                                        اعرف المزيد
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev"
            type="button"
            data-bs-target="#programCarousel"
            data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next"
            type="button"
            data-bs-target="#programCarousel"
            data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</section>