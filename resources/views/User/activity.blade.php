<div class="untree_co-section">
    <div class="container">
        <div class="row text-center justify-content-center mb-5">
            <div class="col-lg-7">
                <h2 class="section-title text-center">Activity</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div id="image-carousel" class="owl-single dots-absolute owl-carousel">
                    @foreach ($activities as $activity )

                  <div class="item"><img src="{{ asset('storage/' . $activity->image1) }}" alt="{{ $activity->title }}" class="img-fluid rounded-20"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 ml-auto">
                <div id="text-carousel" class="owl-single dots-inside owl-carousel">
                    @foreach ($activities as $activity )


                    <div class="item">
                        <h2 class="section-title mb-4">{{$activity->title}}</h2>
                        <p>{{$activity->description}}</p>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
