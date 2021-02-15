<section class="card-category">
    <div class="container-card">
        <div class="cards">

            @foreach ($categories as $category)
                <div class="card">
                    <img src="/images/card.jpg" alt="">
                    <div class="title">
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
