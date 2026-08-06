@if($hero)

<section class="hero-section">

    <video class="hero-video" autoplay muted loop>

        <source src="{{ asset('videos/'.$hero->video) }}" type="video/mp4">

    </video>

    <div class="hero-overlay"></div>

    <div class="hero-content">

        <img src="{{ asset('images/'.$hero->logo) }}" class="hero-logo" alt="جمعية نوران">

        <h1>
            {{ $hero->title }}
        </h1>

        <p>
            {{ $hero->description }}
        </p>

    </div>

</section>

@endif