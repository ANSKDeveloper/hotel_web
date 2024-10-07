<?php
     session_start();

     if($_SESSION["useremail"]  == ""){
        header("location:user.html");
     }
     include("conn.php");
    

     $email = $_SESSION["useremail"];

     $mys =  "select username from user where email = '$email'";
     $mila_name = mysqli_query($con,$mys);

     $ha_mil_gya = mysqli_fetch_array($mila_name);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Listed Rooms</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Hotel Booking</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#contact">Welcome <?php echo $ha_mil_gya[0]; ?> </a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="Logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="text-center mb-4">Your Listed Rooms</h2>
        <a href="listing.php" class="btn btn-primary mb-3">Add new room</a>
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control" placeholder="Search Rooms..." onkeyup="searchRooms()">
        </div>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Room Name</th>
                    <th>Location</th>
                    <th>Price per Night</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="roomTableBody">
                <tr>
                    <td>Deluxe Room</td>
                    <td>New York</td>
                    <td>$150</td>
                    <td>
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Standard Room</td>
                    <td>Los Angeles</td>
                    <td>$100</td>
                    <td>
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>Suite</td>
                    <td>San Francisco</td>
                    <td>$200</td>
                    <td>
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h4><i class="fas fa-info-circle"></i> About Us</h4>
                    <p>Your reliable hotel booking service providing a range of options to meet your needs.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h4><i class="fas fa-envelope"></i> Contact Us</h4>
                    <p>Email: contact@hotelbooking.com</p>
                    <p>Phone: (123) 456-7890</p>
                </div>
                <div class="col-md-4 mb-3">
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

    <script>
        function searchRooms() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('roomTableBody');
            const rows = table.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;
                for (let j = 0; j < cells.length - 1; j++) { // Exclude the last cell (Actions)
                    if (cells[j].innerText.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                    }
                }
                rows[i].style.display = found ? '' : 'none';
            }
        }

        function editRoom(button) {
            const row = button.closest('tr');
            const roomName = row.cells[0].innerText;
            const location = row.cells[1].innerText;
            const price = row.cells[2].innerText;

            // Here you can add logic to open an edit modal or redirect to an edit page
            alert(`Editing Room: ${roomName}\nLocation: ${location}\nPrice: ${price}`);
        }

        function deleteRoom(button) {
            if (confirm("Are you sure you want to delete this room?")) {
                const row = button.closest('tr');
                row.remove();
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>