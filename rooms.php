<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Booking Website - Rooms</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php require('links.php') ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBICHjsg4_yq3SOJGyqUfw_UO8h2Jz_LfU&callback=initMap&loading=async" defer></script>
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

    .h-line {
      width: 150px;
      margin: 0 auto;
      height: 1.7px;
    }

    .card-wrapper {
      margin-bottom: 15px;
    }

    .card {
      height: 100%;
      /* Set a fixed height for all cards */
      width: 100%;
      /* Adjusted width to take full width of the column */
      padding: 10px;
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

  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Our Rooms</h2>
    <div class="h-line bg-dark"></div>
  </div>

  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-6 col-md-6 px-4"> <!-- Rooms Column -->
        <!-- Add your PHP code to dynamically generate room cards here -->
        <div class="col-lg-6 col-md-6 px-4" style="width: 550px;"> <!-- Rooms Column -->
          <?php
          // Database connection details
          $hname = 'localhost';
          $uname = 'root';  // username
          $pass = '';       // password
          $db = 'hbsdb';    // database name

          // Create connection
          $conn = new mysqli($hname, $uname, $pass, $db);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Fetch data from database
          $sql = "SELECT * FROM property_info WHERE accepted = 1";
          $result = $conn->query($sql);

          // Display rooms
          if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
              echo "<div class='card mb-3 border-0 shadow'>";
              echo "<div class='row g-0 mt-3'>";
              echo "<div class='col-md-5 mt-4'>";
              echo "<img src='data:image/jpeg;base64," . base64_encode($row['room_image']) . "' class='img-fluid rounded' alt='Room Image'>";
              echo "<div class='d-flex justify-content-center mt-4'>";

              // Check booking status and display appropriate button
              if ($row['booking_status'] == 'available') {
                echo "<form action='rooms.php' method='post'>";
                echo "<input type='hidden' name='property_id' value='" . $row['property_id'] . "'>";
                echo "<button type='submit' name='book_now' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</button>"; // Book button
                echo "</form>";
              } elseif ($row['booking_status'] == 'pending') {
                echo "<button type='button' class='btn btn-sm text-dark custom-bg shadow-none' disabled>Pending</button>"; // Pending button
              } else {
                echo "<button type='button' class='btn btn-sm text-dark custom-bg shadow-none' disabled>Booked</button>"; // Booked button
              }

              echo "</div>";
              echo "</div>";
              echo "<div class='col-md-7 px-lg-3'>";
              echo "<div class='card-body'>";
              echo "<h5 class='card-title'>" . $row["room_name"] . "</h5>";
              echo "<h6 class='card-subtitle mb-3 text-muted'>Rs. " . $row["room_price"] . " per year</h6>";
              echo "<div class='features mb-3'>";
              echo "<h6 class='mb-1'>Features</h6>";
              echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["room_features"] . "</span>";
              echo "</div>";
              echo "<div class='facilities mb-3'>";
              echo "<h6 class='mb-1'>Facilities</h6>";
              echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["room_facilities"] . "</span>";
              echo "</div>";
              echo "<h6 class='mb-1'>Student count</h6>";
              echo "<span class='badge rounded-pill bg-light text-dark'>" . $row["student_count"] . " students</span>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
          } else {
            echo "<div class='col-md-12'><p>No records found</p></div>";
          }

          // Handle booking now action
          if (isset($_POST['book_now']) && isset($_POST['property_id'])) {
            $propertyId = $_POST['property_id'];
            $query = "UPDATE property_info SET booking_status = 'pending' WHERE property_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i', $propertyId);

            $stmt->execute();
          }

          // Close connection
          $conn->close();
          ?>
        </div>
      </div>



      <!-- Map Column -->
      <div class="col-lg-6 col-md-6 px-4">
        <div class="bg-white rounded shadow p-5">
          <!--iframe height="320" class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5758403132254!2d80.04157289999999!3d6.8213291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2523b05555555%3A0x546c34cd99f6f488!2sNSBM%20Green%20University!5e0!3m2!1sen!2slk!4v1708017488781!5m2!1sen!2slk" loading="lazy"></iframe-->
          <div id="map" style="width: 500px;height: 500px;"></div>
          <script>
            function initMap() {
              const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: {
                  lat: 7.9917939,
                  lng: 79.8316158,
                },
              });

              <?php
              // Database connection details
              $hname = 'localhost';
              $uname = 'root';  // username
              $pass = '';       // password
              $db = 'hbsdb';    // database name

              // Create connection
              $conn = new mysqli($hname, $uname, $pass, $db);

              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

              // Fetch data from database
              $sql = "SELECT * FROM property_info WHERE accepted = 1";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                  // Create a closure to encapsulate marker and infowindow
                  echo "(function() {\n";
                  echo "var marker = new google.maps.Marker({\n";
                  echo "position: {\n";
                  echo "lat: " . $row["latitude"] . ",\n";
                  echo "lng: " . $row["longitude"] . "\n";
                  echo "},\n";
                  echo "map,\n";
                  echo "title: '" . $row["room_name"] . "',\n";
                  echo "});\n";

                  // Info window content
                  echo "var contentString = '<div class=\"card\" style=\"max-width: 200px;\">";
                  echo "<img src=\"data:image/jpeg;base64," . base64_encode($row['room_image']) . "\" class=\"card-img-top\" alt=\"Room Image\">";
                  echo "<div class=\"card-body\">";
                  echo "<h5 class=\"card-title\">" . $row["room_name"] . "</h5>";
                  echo "<h6 class=\"card-subtitle mb-3 text-muted\">Rs. " . $row["room_price"] . " per year</h6>";
                  echo "<div class=\"features mb-3\">";
                  echo "<h6 class=\"mb-1\">Features</h6>";
                  echo "<span class=\"badge rounded-pill bg-light text-dark\">" . $row["room_features"] . "</span>";
                  echo "</div>";
                  echo "<div class=\"facilities mb-3\">";
                  echo "<h6 class=\"mb-1\">Facilities</h6>";
                  echo "<span class=\"badge rounded-pill bg-light text-dark\">" . $row["room_facilities"] . "</span>";
                  echo "</div>";
                  echo "<h6 class=\"mb-1\">Student count</h6>";
                  echo "<span class=\"badge rounded-pill bg-light text-dark\">" . $row["student_count"] . " students</span>";
                  echo "</div>";
                  echo "</div>';\n";

                  // Info window
                  echo "var infowindow = new google.maps.InfoWindow({\n";
                  echo "content: contentString \n";
                  echo "});\n";

                  // Add click event listener to marker
                  echo "marker.addListener('click', function() {
            infowindow.open(map, marker);
        });\n";
                  echo "})();\n"; // Close the closure
                }
              }

              // Close connection
              $conn->close();
              ?>
            }

            window.initMap = initMap;
          </script>

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