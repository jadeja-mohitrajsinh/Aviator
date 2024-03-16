<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" media="screen" href="css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="contact-script.js"></script>
    <script src="js/script.js"></script>
      

  </head>
  <body>
  <!-- <div id="cursor"></div> -->

   <?php 
   include 'components/Nav-Bar.php';
   ?>

      <section class="hero-cover">
        <img
          class="image-block__hero"
          src="asset/img/MAIN/hero-main.png"
          alt=""
          draggable="false"
        />
        <div class="overlay-text">
          <h1>YOUR JOURNEY<br />YOUR WAY</h1>
          <h3>
            Elevate your travel experience to unparalleled heights with our<br />
            exclusive fleet of private jets
          </h3>
        </div>
      </section>
      <br /><br /><br /><br />
      <section class="headin-info main" data-aos="fade-up">
        <h1>DISCOVER THE SKIES<br />UNLEASHED</h1>
        <h3>
          Soar to success with our diverse fleet, where each flight narrates a
          business triumph. Redefine travel as a strategic journey, elevating
          your ventures to new heights. Join us in rewriting the story of
          corporate travel.
        </h3>
      </section>
      <br />
      <section>
        <div
          id="carouselExampleIndicators"
          class="carousel slide main"
          data-bs-ride="carousel"
        >
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="asset/img/G800/v_g800_a_mkt_007_Desktop.jpg"
                class="d-block w-100"
                alt="Slide 1"
                data-bs-interval="3000"
                draggable="false"
              />
            </div>
            <div class="carousel-item">
              <img
                src="asset/img/G700/post_d_g700_g_print_00033_desktop.jpg"
                class="d-block w-100"
                alt="Slide 2"
                data-bs-interval="3000"
                draggable="false"
              />
            </div>
            <div class="carousel-item">
              <img
                src="asset/img/G400/post_v_g400_a_mkt_008_desktop.jpg"
                class="d-block w-100"
                alt="Slide 3"
                data-bs-interval="5000"
                draggable="false"
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <br />
      <br />
      <br />
      <br />
      <section class="section">
        <div class="container" style="max-width: 100%">
          <div class="row">
            <div class="col-md-6 order-md-5 container-img text-md-end">
              <div class="container-img text-lg-end">
                <img
                  src="asset/img/G800/Cabin_R6__S1_Single Seat_Desktop.jpg"
                  alt="Image Alt Text"
                  draggable="false"
                />
              </div>
            </div>
            <div class="col-md-6 order-md-4 container-text">
              <div class="text">
                <h1>Unmatched Performance</h1>
                <p>
                  Indulge in the epitome of sophistication as you soar through
                  the skies in our exclusive fleet of private jets. Immerse
                  yourself in an ambiance of opulence and comfort, curated for
                  the discerning traveler.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container" style="max-width: 100%">
          <div class="row">
            <div class="col-md-6 order-md-2 container-img">
              <div class="container-img text-lg-end">
                <img
                  src="asset/img/G800/Cabin_R10__S1_FWD-AFT_Desktop.jpg"
                  alt="Another Image Alt Text"
                  draggable="false"
                />
              </div>
            </div>
            <div class="col-md-6 order-md-3 container-text">
              <div class="text">
                <h1>Seamless Technology, Elegant Design</h1>
                <p>
                  Aviator aircraft harmonize cutting-edge technology and
                  sophisticated design, offering a seamless and elegant travel
                  experience.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container" style="max-width: 100%">
          <div class="row">
            <div class="col-md-6 order-md-5 container-img text-md-end">
              <div class="container-img text-lg-end">
                <img
                  src="asset/img/G800/Cabin_R6__S1_Single Seat_Desktop.jpg"
                  alt="Image Alt Text"
                  draggable="false"
                />
              </div>
            </div>
            <div class="col-md-6 order-md-4 container-text">
              <div class="text">
                <h1>Unmatched Performance</h1>
                <p>
                  Soar to new heights with exceptional speed, range, and
                  performance.Our private jets are engineered for those who
                  appreciate the thrill and efficient travel.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container" style="max-width: 100%">
          <div class="row">
            <div class="col-md-6 order-md-6 container-img">
              <div class="container-img">
                <img
                  src="asset/img/MAIN/cro_20190726_064_50_370x230@2x.webp"
                  alt="Another Image Alt Text"
                  draggable="false"
                />
              </div>
            </div>
            <div class="col-md-6 order-md-7 container-text">
              <div class="text">
                <h1>ELEVATE YOUR JOURNEY WITH EXCLUSIVE ACCESSORIES</h1>
                <p>
                  Enhance your private jet experience with our curated
                  collection of high-end accessories.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

  <?php
  include 'components/Contact-Us.php';
  include 'components/footer.php';
  ?>

  </body>
</html>
