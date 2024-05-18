<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hotel booking website-Facilities </title>
  <link rel="stylesheet" href="common.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php require('links.php') ?>

  <style>
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

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Our facilities</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Doloremque quasi dolorum nisi ab, nostrum distinctio eaque sunt ad vero! Ea distinctio impedit possimus sit ullam beatae labore aperiam, aut mollitia!</p>
  </div>
  <div class="container mb-4">
    <div class="row">
      <?php
      // Database connection
      $mysqli = new mysqli("localhost", "root", "", "hbsdb");
      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
      }

      // Fetch data from 'facilities' table
      $sql = "SELECT id, title, description, image FROM facilities";
      $result = $mysqli->query($sql);
      $i = 1;

      // Display the fetched data in the HTML structure
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='col-lg-4 col-md-6 md-5 px-4 mt-4'>";
          echo "<div class='bg-white rounded shadow p-4 boder-top boder-4 boder-dark pop'>";
          echo "<div class='d-flex align-items-center mb-2'>";
          echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' width='40px'>";
          echo "<h5 class='m-0 ms-3'>" . $row['title'] . "</h5>";
          echo "</div>";
          echo "<p>" . $row['description'] . "</p>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<div class='col-12'><p>No data available</p></div>";
      }

      // Close the database connection
      $mysqli->close();
      ?>
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

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        "@0.00": {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        "@0.75": {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        "@1.00": {
          slidesPerView: 3,
          spaceBetween: 40,
        },
        "@1.50": {
          slidesPerView: 4,
          spaceBetween: 50,
        },
      },
    });
  </script>
</body>

</html>