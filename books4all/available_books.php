<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard | Books4All</title>
    <link rel="stylesheet" href="donor.css">
    <script>
        function toggleProfile() {
            document.getElementById("profile-menu").classList.toggle("show");
        }
    </script>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="logo__1_-removebg-preview.png" alt="Books4All Logo" style="height: 50px; width: auto;">
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
        <div class="profile">
            <img src="profile-icon.png" alt="Profile" onclick="toggleProfile()">
            <div id="profile-menu" class="profile-menu">
                <p>👤 User Name</p>
                <a href="logout.php">🚪 Logout</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Donate Books, Spread Knowledge</h1>
            <p>Your contribution can change a child's future.</p>
            <div class="btn-container">
                <a href="#donate-section" class="btn primary-btn">Donate Now</a>
                <a href="view-donations.html" class="btn secondary-btn">View Donations</a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-section">
        <div class="about-container">
            <h2>About Us</h2>
            <p>Books4All is dedicated to providing access to education for underprivileged children. By donating books, you contribute to a better future.</p>
        </div>
    </section>

    <!-- Donate a Book Section -->
    <section id="donate-section" class="donor-section">
        <div class="donor-container">
            <h2>Donate a Book</h2>
            <p>Fill in the details to donate your books and help those in need.</p>
            <div class="donation-options">

                <!-- Donate Book Form -->
                <div class="donation-card">
                    <form class="donation-form" action="add_book.php" method="POST">
                        <input type="text" name="book_name" placeholder="Book Name" required>
                        <input type="text" name="author" placeholder="Author" required>
                        <input type="text" name="publication" placeholder="Publication" required>

                        <!-- Grade Selection -->
                        <select name="grade" required>
                            <option value="" disabled selected>Select Grade Level</option>
                            <option value="Pre-K">Pre-K</option>
                            <option value="Kindergarten">Kindergarten</option>
                            <option value="1st Grade">1st Grade</option>
                            <option value="2nd Grade">2nd Grade</option>
                            <option value="3rd Grade">3rd Grade</option>
                            <option value="4th Grade">4th Grade</option>
                            <option value="5th Grade">5th Grade</option>
                            <option value="6th Grade">6th Grade</option>
                            <option value="7th Grade">7th Grade</option>
                            <option value="8th Grade">8th Grade</option>
                            <option value="9th Grade">9th Grade</option>
                            <option value="10th Grade">10th Grade</option>
                            <option value="11th Grade">11th Grade</option>
                            <option value="12th Grade">12th Grade</option>
                            <option value="College">College</option>
                        </select>

                        <!-- City Selection -->
                        <select name="city" required>
                            <option value="" disabled selected>Select Your City</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Bangalore">Bangalore</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="Pune">Pune</option>
                            <option value="Jaipur">Jaipur</option>
                            <option value="Lucknow">Lucknow</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Other">Other</option>
                        </select>

                        <input type="text" name="pickup_address" placeholder="Pickup Address" required>
                        <input type="INT" name="quantity" placeholder=" Enter quantity" required>
                        <input type="date" required>

                        <!-- Book Condition Selection -->
                        <select name="book_condition" required>
                            <option value="" disabled selected>Select Book Condition</option>
                            <option value="Well Used">New</option>
                            <option value="Gently Used">Good</option>
                            <option value="Like New">Fair</option>
                            
                        </select>

                        <input type="hidden" name="date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <button type="submit" class="btn donate-btn">Donate</button>
                    </form>
                </div>

                <!-- OR Divider -->
                <div class="or-text">OR</div>

                <!-- Upload Image Form -->
                <div class="donation-card">
                    <form class="donation-form">
                        <input type="file" accept="image/*" required>
                        <textarea placeholder="Additional Notes (Optional)"></textarea>
                        <button type="submit" class="btn donate-btn">Upload Image</button>
                    </form>
                </div>

            </div>
        </div>
    </section>

</body>
</html>
