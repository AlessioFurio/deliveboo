<section class="card-category">
    <div class="container-card">

        <div class="cards">
            <div class="card" v-for="restaurant in restaurants">
                <img src="/images/card.jpg" alt="">
                <p>@{{ restaurant.name }}</p>
            </div>
        </div>
        
    </div>
</section>
