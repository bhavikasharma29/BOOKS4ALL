<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Dashboard - Jaipur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        .volunteer-card {
            background: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0px 0px 5px gray;
            position: relative;
        }
        button {
            padding: 8px 15px;
            margin-top: 10px;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
        .map-link {
            text-decoration: none;
            color: white;
            background: #007bff;
            padding: 8px 12px;
            border-radius: 5px;
            margin-left: 10px;
        }
        .map-link:hover {
            background: #0056b3;
        }
        .otp-section {
            display: none;
            margin-top: 10px;
        }
        input {
            padding: 5px;
            margin-right: 10px;
        }
        .status {
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Volunteer Dashboard - Jaipur</h2>

        <!-- Volunteer Entry 1 -->
        <div class="volunteer-card" id="entry1">
            <p><strong>Pickup Address:</strong> 45 MG Road, Jaipur</p>
            <p><strong>Delivery Address:</strong> 89 Civil Lines, Jaipur</p>
            <p><strong>Book Name:</strong> Themes in Indian History</p>
            <p><strong>Publication:</strong> Pearson</p>
            <a class="map-link" href="https://www.google.com/maps/dir/45+MG+Road,Jaipur/89+Civil+Lines,Jaipur" target="_blank">View Route</a>
            <button onclick="generateOTP(1)">Generate OTP</button>
            
            <div class="otp-section" id="otp-section-1">
                <input type="text" id="otp-input-1" placeholder="Enter OTP">
                <button onclick="verifyOTP(1)">Verify OTP</button>
            </div>

            <p class="status" id="status-1">Status: Pending</p>
        </div>

        <!-- Volunteer Entry 2 -->
        <div class="volunteer-card" id="entry2">
            <p><strong>Pickup Address:</strong> 22 Vaishali Nagar, Jaipur</p>
            <p><strong>Delivery Address:</strong> 18 Raja Park, Jaipur</p>
            <p><strong>Book Name:</strong> R.D Sharma</p>
            <p><strong>Publication:</strong> R.D Sharma</p>
            <a class="map-link" href="https://www.google.com/maps/dir/22+Vaishali+Nagar,Jaipur/18+Raja+Park,Jaipur" target="_blank">View Route</a>
            <button onclick="generateOTP(2)">Generate OTP</button>
            
            <div class="otp-section" id="otp-section-2">
                <input type="text" id="otp-input-2" placeholder="Enter OTP">
                <button onclick="verifyOTP(2)">Verify OTP</button>
            </div>

            <p class="status" id="status-2">Status: Pending</p>
        </div>

        <!-- Volunteer Entry 3 -->
        <div class="volunteer-card" id="entry3">
            <p><strong>Pickup Address:</strong> 34 Tonk Road, Jaipur</p>
            <p><strong>Delivery Address:</strong> 12 Malviya Nagar, Jaipur</p>
            <p><strong>Book Name:</strong> Sparsh & Sanchayan</p>
            <p><strong>Publication:</strong> Rajesh Sanskaar</p>
            <a class="map-link" href="https://www.google.com/maps/dir/34+Tonk+Road,Jaipur/12+Malviya+Nagar,Jaipur" target="_blank">View Route</a>
            <button onclick="generateOTP(3)">Generate OTP</button>
            
            <div class="otp-section" id="otp-section-3">
                <input type="text" id="otp-input-3" placeholder="Enter OTP">
                <button onclick="verifyOTP(3)">Verify OTP</button>
            </div>

            <p class="status" id="status-3">Status: Pending</p>
        </div>
    </div>

    <script>
        let generatedOTP = {};  // Stores the OTPs for verification

        function generateOTP(entryId) {
            let otp = Math.floor(1000 + Math.random() * 9000);  // Generate a 4-digit OTP
            generatedOTP[entryId] = otp;
            alert("OTP for Entry " + entryId + " is: " + otp);  // Simulated OTP sending
            document.getElementById("otp-section-" + entryId).style.display = "block";  // Show OTP input
        }

        function verifyOTP(entryId) {
            let enteredOTP = document.getElementById("otp-input-" + entryId).value;
            if (enteredOTP == generatedOTP[entryId]) {
                document.getElementById("status-" + entryId).innerHTML = "Status: Delivered";
                document.getElementById("status-" + entryId).style.color = "green";
                alert("OTP Verified! Delivery Successful.");
            } else {
                alert("Incorrect OTP. Please try again.");
            }
        }
    </script>
</body>
</html>
