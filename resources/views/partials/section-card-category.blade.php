<section class="card-category">
    <div class="container-card">
        <div class="cards">

            {{-- @foreach ($categories as $category)
                <div class="card">
                    <img src="/images/card.jpg" alt="">
                    <div class="title">
                        <h1>Categoria: {{ $category->name }}</h1>
                    </div>
                </div>
            @endforeach --}}

            <div v-for="restaurant in restaurants" class="">
            <p>@{{ restaurant.name }}</p>

            </div>

        </div>
    </div>
</section>
