<style>
body {
    background-color: #141317;
    font-family: 'Poppins', sans-serif;
}

.slider-container {
    max-width: 900px;
    margin: 40px auto;
    position: relative;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    border-radius: 15px;
}

.slides-wrapper {
    display: flex;
    transition: transform 0.3s;
}

.slider-item {
    flex: 0 0 100%;
    height: 500px;
    position: relative;
    background-size: cover;
    background-position: center;
    transition: opacity 0.3s;
    opacity: 0;
    overflow: hidden;
}

.slider-item.active {
    opacity: 1;
}

.slider-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.8);
    z-index: 1;
}

.slider-image img {
    width: 40%;
    position: absolute;
    bottom: 10%;
    left: 5%;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3);
}

.movie-title, .stars, .description {
    position: absolute;
    right: 5%;
    color: #FFF;
    z-index: 2;
    max-width: 50%;
}

.movie-title {
    position: absolute;
    left: 5%;
    top: 30%;
    font-size: 2em;
    z-index: 2;
    font-weight: bold;
    color: #FFF;
    max-width: 80%;
}

.stars {
    font-size: 1.2em;
    top: 35%;
}

.description {
    top: 50%;
    font-size: 1em;
    color:white;
}

.slider-controls {
    position: absolute;
    bottom: 10px;
    right: 10px;
    display: flex;
    gap: 10px;
    z-index: 3;
}

.slider-control {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, 0.6);
    border-radius: 50%;
    cursor: pointer;
    color: white;
    font-size: 20px;
    transition: background-color 0.3s;
}

.slider-control:hover {
    background-color: rgba(0, 0, 0, 0.9);
}

.country {
    font-size: 1em;
    color: #FFF;
    margin-bottom: 10px;
}

.year, .genre-label, .genre {
    font-size: 1.2em;
    margin-bottom: 10px;
    color:white;
}

.director-label, .actors-label {
    font-weight: bold;
    margin-top: 20px;
}

.calification-label, .calification, .director, .actors, .description {
    font-size: 1em;
    margin-bottom: 10px;
}

.movie-meta {
    position: absolute;
    top: 10%;
    left: 5%;
    z-index: 2;
}

.movie-info {
    position: absolute;
    bottom: 5%;
    left: 5%;
    z-index: 2;
    max-width: 70%;
    color:white;
}

</style>

<div class="slider-container">

    <!-- Inicio del contenedor .slides-wrapper -->
    <div class="slides-wrapper">

        <?php 
        $args = array(
            'post_type' => 'peliculas',
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);
        $slideIndex = 0;

        if ($query->have_posts()): 
            while ($query->have_posts()): 
                $query->the_post();
                $background_image = get_field('background');
                $background_image_url = $background_image ? $background_image['url'] : '';
                $terms_year = get_the_terms(get_the_ID(), 'ano');
                $terms_genre = get_the_terms(get_the_ID(), 'genero');
                $director = get_field('director');
                $actors = get_field('actores');
                $calification = get_field('calificacion');
        ?>
        <!-- Aquí comienza cada slider-item -->
        <div class="slider-item <?= $slideIndex === 0 ? 'active' : ''; ?>" style="background-image: url('<?= esc_url($background_image_url); ?>');">
    <div class="movie-meta">
        <p class="country">Country: Belgium, Luxembourg 2016</p>
        <p class="year"><?= $terms_year ? esc_html($terms_year[0]->name) : ''; ?></p>
        <p><span class="genre-label">Género:</span><span class="genre"><?= $terms_genre ? esc_html($terms_genre[0]->name) : ''; ?></span></p>
    </div>
    <h2 class="movie-title"><?php the_title(); ?></h2>
    <div class="movie-info">
        <p><span class="calification-label">Calification:</span><span class="calification"><?= esc_html($calification); ?></span></p>
        <p class="director-label">Director:</p>
        <p class="director"><?= esc_html($director); ?></p>
        <p class="actors-label">Actors:</p>
        <p class="actors"><?= esc_html($actors); ?></p>
        <p class="description"><?php the_excerpt(); ?></p>
    </div>
</div>
        <!-- Aquí termina el slider-item -->

        <?php 
            $slideIndex++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </div>
    <!-- Fin del contenedor .slides-wrapper -->

    <div class="slider-controls">
        <div class="slider-control slider-prev">&lt;</div>
        <div class="slider-control slider-next">&gt;</div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider-container');
    const slidesWrapper = document.querySelector('.slides-wrapper');
    const items = document.querySelectorAll('.slider-item');
    const prevButton = document.querySelector('.slider-prev');
    const nextButton = document.querySelector('.slider-next');
    let currentIndex = 0;
    let autoSlideTimeout;

    function showSlide(index) {
        // Calcula el desplazamiento necesario para mostrar el slide deseado
        const offset = -index * 100; // 100% del ancho del contenedor
        slidesWrapper.style.transform = `translateX(${offset}%)`;

        items.forEach((item, idx) => {
            item.classList.remove('active');
            if (idx === index) {
                item.classList.add('active');
            }
        });

        clearTimeout(autoSlideTimeout);
        autoSlideTimeout = setTimeout(nextSlide, 5000);
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        showSlide(currentIndex);
    }

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(currentIndex);
    });

    nextButton.addEventListener('click', nextSlide);

    showSlide(0);
});

    </script>