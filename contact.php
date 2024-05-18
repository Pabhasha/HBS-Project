<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>hotel booking website-Contact Us </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="common.css">

  <?php require('links.php') ?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .custom-bg {
      background-color: #2ec1ac;
    }


    .custom-bg:hover {
      background-color: #279e8c;
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
    <h2 class="fw-bold h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Doloremque quasi dolorum nisi ab, nostrum distinctio eaque sunt ad vero! Ea distinctio impedit possimus sit ullam beatae labore aperiam, aut mollitia!</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 md-6 px-4 mt-4">
        <div class="bg-white rounded shadow p-4 ">
          <iframe height="320" class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.5758403132254!2d80.04157289999999!3d6.8213291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2523b05555555%3A0x546c34cd99f6f488!2sNSBM%20Green%20University!5e0!3m2!1sen!2slk!4v1708017488781!5m2!1sen!2slk" loading="lazy"></iframe>
          <h5>Address Information</h5>
          <a href="https://maps.app.goo.gl/Zm6FWQRec5cQC9VB8" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
            <i class="bi bi-geo-alt"></i> pitipana,Homagama
          </a>

          <h5 class="mt-4">Email</h5>
          <a href="mailto:testuser@gmail.com" class="d-inline-block text-decoration-none text-dark"><i class="bi bi-envelope"></i> mailto:testuser@gmail.com</a>

          <h5 class="mt-4">Follow Us</h5>
          <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
            <i class="bi bi-instagram"></i>
          </a>
          <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
            <i class="bi bi-twitter-x"></i>
          </a>
          <a href="#" class="d-inline-block mb-3 text-dark fs-5 me-2">
            <i class="bi bi-linkedin"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 md-6 px-4 mt-4">
        <div class="bg-white rounded shadow p-4">
          <form method="post" id="messageForm">
            <h5>Send a message</h5>
            <div class="mt-3">
              <label class="form-label" style="font-weight:500">Name</label>
              <input name="name" required type="text" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight:500">Email</label>
              <input name="email" required type="email" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight:500">Subject</label>
              <input name="subject" required type="text" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight:500">Message</label>
              <textarea name="message" required class="form-control shadow-none" rows="5"></textarea>
            </div>
            <button type="submit" name="send" class="btn text-white custom-bg mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  function filteration($data)
  {
    $filtered_data = array();
    foreach ($data as $key => $value) {
      $filtered_data[$key] = htmlspecialchars(trim($value));
    }
    return $filtered_data;
  }

  function insert($sql, $values, $datatypes)
  {
    $mysqli = new mysqli("localhost", "root", "", "hbsdb");
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      return false;
    }

    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
      return false;
    }

    $stmt->bind_param($datatypes, ...$values);
    if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
      return false;
    }

    $stmt->close();
    $mysqli->close();
    return true;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $frm_data = filteration($_POST);
    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];

    if (insert($q, $values, 'ssss')) {
      echo "<script>alert('Your message has been sent successfully.');</script>";
    } else {
      echo "<script>alert('Error: Server down! Please try again later.');</script>";
    }
  }
  ?>





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