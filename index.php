<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hotel booking website-Home </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <?php require('links.php') ?>

  <style>
    * {

      font-family: 'Inter', sans-serif;

    }

    .h-font {
      font-family: 'Poppins', sans-serif;
    }

    .custom-bg {
      background-color: #2ec1ac;
    }

    .custom-bg:hover {
      background-color: #279e8c;
    }

    .availabity-form {
      margin-top: -50px;
      z-index: 2;
      position: relative;
    }

    @media screen and (max-width:575px) {
      .availabity-form {
        margin-top: 0px;
        padding: 0 35px;
      }

    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
</head>

<body class="bg-light">
  <?php require('header.php'); ?>

  <!-- ======= Hero Section ======= -->
  <div class="container-fluid px-lg-4 mt-4">
    <!-- Swiper -->
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="img/hostel_1.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="img/hostel_2.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="img/hostel_3.jpg" class="w-100 d-block" />
        </div>

      </div>
    </div>
  </div>


  <!-- availabity form -->
  <div class="container availabity-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-3 rounded">
        <h5 class="mb-4">Check Availability of Hostels</h5>
        <form>
          <div class="row align-items-end">
            <div class="col-lg-4 mb-3">

              <label class="form-label" style="font-weight:500">Check-In Date</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-4 mb-3">
              <label class="form-label" style="font-weight:500">Check-Out Date</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight:500">Number Of Students</label>
              <select class="form-select shadow-none">

                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>



  <!-- Rooms  -->

  <h2 class="mt-5 pt-4 md-4 text-center ">Available Rooms And Hostels</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="width:350px; margin: auto;">
          <img src="img/room_1.jpeg" class="card-img-top">
          <div class="card-body">
            <h5>Sample Room</h5>
            <h6 class="mb-4 ">Rs. 100000 per year </h6>
            <div class="fuatures md-4">
              <h6 class="mb-1">Fuatures</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Rooms</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Bathroom</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">1 balcony</span>
            </div>
            <div class="facility mb-4">
              <h6 class="mb-1 mt-4">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">WIFI</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">AC</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">Room Heater</span>
            </div>
            <h6 class="mb-1 mt-4 ">Student count</h6>
            <span class="badge rounded-pill bg-light text-dark text-warp">3 students</span>

            <div class="rating mb-4 mt-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">

            </div>
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="width:350px; margin: auto;">
          <img src="img/room_2.jpeg" class="card-img-top">
          <div class="card-body">
            <h5>Sample Room</h5>
            <h6 class="mb-4 ">Rs. 100000 per year </h6>
            <div class="fuatures md-4">
              <h6 class="mb-1">Fuatures</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Rooms</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Bathroom</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">1 balcony</span>
            </div>
            <div class="facility mb-4">
              <h6 class="mb-1 mt-4">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">WIFI</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">AC</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">Room Heater</span>
            </div>
            <h6 class="mb-1 mt-4 ">Student count</h6>
            <span class="badge rounded-pill bg-light text-dark text-warp">3 students</span>
            <div class="rating mb-4 mt-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">

            </div>
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 my-3">
        <div class="card border-0 shadow" style="width:350px; margin: auto;">
          <img src="img/room_3.jpeg" class="card-img-top">
          <div class="card-body">
            <h5>Sample Room</h5>
            <h6 class="mb-4 ">Rs. 100000 per year </h6>
            <div class="fuatures md-4">
              <h6 class="mb-1">Fuatures</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Rooms</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">2 Bathroom</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">1 balcony</span>
            </div>
            <div class="facility mb-4">
              <h6 class="mb-1 mt-4">Facilities</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">WIFI</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">AC</span>
              <span class="badge rounded-pill bg-light text-dark text-warp">Room Heater</span>
            </div>
            <h6 class="mb-1 mt-4 ">Student count</h6>
            <span class="badge rounded-pill bg-light text-dark text-warp">3 students</span>
            <div class="rating mb-4 mt-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light text-dark text-warp">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">

            </div>
            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More details</a>
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none ">More Rooms<i class="bi bi-arrow-right p-1"></i></a>
      </div>
    </div>
  </div>


  <!-- Our Facilities  -->

  <h2 class="mt-5 pt-4 md-4 text-center  ">Our Facilities </h2>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0  px-lg-">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded sha py-4 my-3 ">
        <img src="img/Wifi-removebg-preview.png" alt="" height=80 width=80>
        <h5 class="mt-3">WIFI</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded sha py-4 my-3 ">
        <img src="img/AC.jpeg" alt="" height=80 width=80>
        <h5 class="mt-3">AC</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded sha py-4 my-3 ">
        <img src="img/food.jpeg" alt="" height=80 width=80>
        <h5 class="mt-3">Food</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded sha py-4 my-3 ">
        <img src="img/hot water.jpeg" alt="" height=80 width=80>
        <h5 class="mt-3">Hot Water</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded sha py-4 my-3 ">
        <img src="img/security-removebg-preview.png" alt="" height=80 width=80>
        <h5 class="mt-3">Security</h5>
      </div>
    </div>
  </div>


  <!-- Testimonials  -->

  <h2 class="mt-5 pt-4 md-4 text-center  ">Testimonials </h2>
  <div class="container mt-5">

    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-5">
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="img/user-removebg-preview.png" alt="Profile Image" width="30px" height="30px" />
            <h6 class="m-0 ms-2">Random User</h6>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in velit nec lorem tempus commodo quis et urna</p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white mb-3">
          <div class="profile d-flex align-items-center p-4">
            <img src="img/user-removebg-preview.png" alt="Profile Image" width="30px" height="30px" />
            <h6 class="m-0 ms-2">Random User</h6>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in velit nec lorem tempus commodo quis et urna</p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="img/user-removebg-preview.png" alt="Profile Image" width="30px" height="30px" />
            <h6 class="m-0 ms-2">Random User</h6>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in velit nec lorem tempus commodo quis et urna</p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center mb-3">
            <img src="img/user-removebg-preview.png" alt="Profile Image" width="30px" height="30px" />
            <h6 class="m-0 ms-2">Random User</h6>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in velit nec lorem tempus commodo quis et urna</p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>


  <!-- Find US -->
  <h2 class="mt-5 pt-4 md-4 text-center  ">Find US </h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe height="320" class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5758403132254!2d80.04157289999999!3d6.8213291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2523b05555555%3A0x546c34cd99f6f488!2sNSBM%20Green%20University!5e0!3m2!1sen!2slk!4v1708017488781!5m2!1sen!2slk" loading="lazy"></iframe>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Call US</h5>
          <a href="tel:+941154566" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone"></i>tel:+941154566</a>
        </div>

        <div class="bg-white p-4 rounded mb-4">
          <h5>Follow Us</h5>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook"></i>Facebook
            </span>
          </a>
          <br>

          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram"></i>Instagram
            </span>
          </a>
          <br>
          <a href="#" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter-x"></i>Twitter X
            </span>
          </a>
          <br>
          <a href="#" class="d-inline-block ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-linkedin"></i>linkedin
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>


  <?php require('footer.php'); ?>



  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      }
    });

    // var swiper = new Swiper(".swiper-testimonials", {
    //   effect: "coverflow",
    //   grabCursor: true,
    //   centeredSlides: true,
    //   slidesPerView: "auto",
    //   slidesPerView: "3",
    //   loop: true,
    //   coverflowEffect: {
    //     rotate: 50,
    //     stretch: 0,
    //     depth: 100,
    //     modifier: 1,
    //     slideShadows: false,
    //   },
    //   pagination: {
    //     el: ".swiper-pagination",
    //   },
    //   breakpoints: {
    //     "@0.00": {
    //       slidesPerView: 1,
    //       spaceBetween: 10,
    //     },
    //     "@0.75": {
    //       slidesPerView: 2,
    //       spaceBetween: 20,
    //     },
    //     "@1.00": {
    //       slidesPerView: 3,
    //       spaceBetween: 40,
    //     },
    //     "@1.50": {
    //       slidesPerView: 4,
    //       spaceBetween: 50,
    //     },
    //   },
    // });
  </script>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-testimonials', {
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>

</html>