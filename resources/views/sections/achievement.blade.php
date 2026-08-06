@if($achievement)

<section class="achievement-section">

    <div class="container">

        <div class="section-title">

            <h2>
                {{ $achievement->title }}
            </h2>

        </div>


        <div class="achievement-main">


            @if($achievement->video)

            <div class="achievement-video">

                <video controls>

                    <source src="{{ asset('videos/achievements/'.$achievement->video) }}"
                    type="video/mp4">

                </video>

            </div>

            @endif



            <div class="achievement-text">

                <p>
                    {{ $achievement->description }}
                </p>

            </div>


        </div>



        @if($achievement->images->count())


        <div class="achievement-gallery">


            @foreach($achievement->images as $image)


            <div class="achievement-image-card">

                <img src="{{ asset('images/achievements/'.$image->image) }}"
                alt="achievement">


            </div>


            @endforeach


        </div>


        @endif


    </div>

</section>

@endif