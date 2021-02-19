<section class="card-category">
    <div class="container-card-category">

        <div class="menu-filter">

            <h3 class="ricerca-avanzata">Ricerca Avanzata</h3>

                <select class="category-select" name="" v-model="selectedCategory">
                    <option value="">Categoria</option>
                    @foreach ($categories as $category)

                      <option :value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach
                </select>

                <button @click="searchRestaurants()" type="button" name="button">Cerca</button>
        </div>

        <div class="container-card">

            <div class="cards">
                    <div class="card" v-for="restaurant in restaurants">
                        <a :href="'{{url('/restaurants')}}'+'/'+ restaurant.slug">
                            <img src="/images/card.jpg" alt="">
                            <p>@{{ restaurant.name }}</p>
                            <p>@{{ restaurant.slug }}</p>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</section>
