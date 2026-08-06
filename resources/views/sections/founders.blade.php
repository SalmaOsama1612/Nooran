<section class="founders-section">

    <div class="container">

        <div class="section-title">
            <h3>مؤسسو المملكة العربية السعودية</h3>
            <p>شخصيات أسهمت في بناء النهضة التعليمية والتنموية</p>
        </div>

        @foreach($founders as $index => $founder)

        <div class="founder-item {{ $index % 2 == 0 ? 'normal' : 'reverse' }}">

            <div class="founder-image">
                <img src="{{asset('images/founders/'.$founder->image)}}" alt="{{$founder->name}}">
            </div>

            <div class="founder-content">

                <h3>
                    {{$founder->name}}
                </h3>

                <h5>
                    {{$founder->quote}}
                </h5>

                <p>
                    {{$founder->description}}
                </p>

            </div>

        </div>

        @endforeach

    </div>

</section>