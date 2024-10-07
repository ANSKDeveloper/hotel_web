<?php
    include("conn.php");

    $mys =  "select * from hotel_list order by id desc";

    $res = mysqli_query($con,$mys);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .search-section {
            background-color: #f8f9fa;
            padding: 40px 0;
            border-radius: 10px;
        }
        
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
        
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30' fill='white'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        
        @media (min-width: 768px) {
            .search-section .form-control,
            .search-section .btn {
                height: 55px;
            }
            .search-section .form-control {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#latest"><i class="fas fa-list"></i> Latest Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#best"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#reviews"><i class="fas fa-comments"></i> Guest Reviews</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
                <a href="user.html">
                    <button class="btn btn-light ms-3"><i class="fas fa-plus"></i> List Your Hotel</button>
                </a>
            </div>
        </div>
    </nav>

    <section class="hero bg-dark text-white text-center py-5" style="background-image: url('background.jpg'); background-size: cover;">
        <div class="hero-content">
            <h2>Find Your Dream Hotel Today!</h2>
            <p>Explore our extensive list of hotels and book your perfect stay.</p>
        </div>
    </section>

    <section class="search-section text-center">
        <div class="container">
            <h3 class="mb-4">Search for Hotels</h3>
            <form class="row g-3 justify-content-center">
                <div class="col-md-3">
                    <select class="form-control form-select" aria-label="Room Type">
                        <option selected>Select Hotel Type</option>
                        <option value="1">Budget Hotel</option>
                        <option value="2">Luxury Hotel</option>
                        <option value="3">Boutique Hotel</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Location" aria-label="Location">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" placeholder="Max Price" aria-label="Max Price">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning" style="height: 100%;"><i class="fas fa-search"></i> Start Searching now</button>
                </div>
            </form>
        </div>
    </section>

    <section id="latest" class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Latest Hotels</h3>
            <div class="row">
                <?php
                      while($row = mysqli_fetch_array($res)){
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="hotel/<?php echo $row[5]; ?>" class="card-img-top" alt="Hotel 1">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $row[1]; ?></h3>
                            <h5>Location:- <?php echo $row[2]; ?></h5>
                            <p class="card-text">Price: <?php echo $row[3]; ?> per night</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐</p>
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
                <?php
                 }
                ?>
            </div>
        </div>
    </section>

    <section id="best" class="py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-4">Top Rated Hotels</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="hotel4.jpg" class="card-img-top" alt="Hotel 4">
                        <div class="card-body">
                            <h5 class="card-title">Luxury Suites</h5>
                            <p class="card-text">Price: $300 per night</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐⭐</p>
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="hotel5.jpg" class="card-img-top" alt="Hotel 5">
                        <div class="card-body">
                            <h5 class="card-title">City Center Hotel</h5>
                            <p class="card-text">Price: $250 per night</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐</p>
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="hotel6.jpg" class="card-img-top" alt="Hotel 6">
                        <div class="card-body">
                            <h5 class="card-title">Beachfront Resort</h5>
                            <p class="card-text">Price: $280 per night</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐⭐</p>
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="reviews" class="py-5">
        <div class="container">
            <h3 class="text-center mb-4">Guest Reviews</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="user1.jpg" class="card-img-top rounded-circle" alt="User 1">
                        <div class="card-body">
                            <p class="card-text">"An amazing stay! Highly recommend."</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="user2.jpg" class="card-img-top rounded-circle" alt="User 2">
                        <div class="card-body">
                            <p class="card-text">"Great location and service."</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <img src="user3.jpg" class="card-img-top rounded-circle" alt="User 3">
                        <div class="card-body">
                            <p class="card-text">"Will definitely come back!"</p>
                            <p class="card-text">Rating: ⭐⭐⭐⭐⭐</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-4">Contact Us</h3>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Send</button>
            </form>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-info-circle"></i> About Us</h4>
                    <p>Your reliable hotel booking service providing a range of options to meet your needs.</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-link"></i> Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#latest"><i class="fas fa-list"></i> Latest Hotels</a></li>
                        <li><a class="text-white" href="#best"><i class="fas fa-star"></i> Top Rated Hotels</a></li>
                        <li><a class="text-white" href="#reviews"><i class="fas fa-comments"></i> Guest Reviews</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-envelope"></i> Contact Us</h4>
                    <p>Email: contact@hotelbooking.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4><i class="fas fa-users"></i> Follow Us</h4>
                    <div>
                        <a class="text-white mx-2" href="#"><i class="fab fa-facebook"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="text-white mx-2" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="text-center bg-dark text-white py-2">
        <p>&copy; 2024 Hotel Booking. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>