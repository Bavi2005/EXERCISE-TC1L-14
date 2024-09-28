<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Hosting Application</title>
    <link rel="stylesheet" href="studentevent_css.php">
    
    <!-- Including student CSS -->
    <?php include 'studentevent_css.php'; ?>

    <style>
        /* Dialog box styling */
        .dialog-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            text-align: center;
            z-index: 1000;
        }

        .dialog-box h3 {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .dialog-box button {
            padding: 10px 20px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dialog-box button:hover {
            background-color: #0d74d4;
        }

        /* Overlay to make background inactive */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .button-container
        {
        text-align: center;
        margin-top: 20px;
        }

        .back-button 
        {
            padding: 10px 20px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-button:hover 
        {
            background-color: #0d74d4;
        }
    </style>
</head>
<body>

    <!-- Including the student sidebar -->
    <?php include 'studenthome_sidebar.php'; ?>

    <div class="form-container">
        <div class="form-wrapper">
            <h2>Event Hosting Application</h2>
            <form id="eventForm" action="submit_event.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="event">What Event?</label>
                <input type="text" id="event" name="event" required>

                <label for="purpose">Purpose of the Event:</label>
                <textarea id="purpose" name="purpose" required></textarea>

                <label for="details">Event Details (Date, Time, Venue):</label>
                <textarea id="details" name="details" required></textarea>

                <button type="submit">Submit Application</button>
            </form>
        </div>
    </div>

    <!-- Overlay for the dialog box -->
    <div class="overlay" id="overlay"></div>

    <!-- Dialog Box for confirmation -->
    <div class="dialog-box" id="dialogBox">
        <h3>We will contact you soon!</h3>
        <button id="okayBtn">Okay</button>
    </div>

    <script>
        // JavaScript to display the dialog box and handle the redirect
        function showDialogBox() {
            event.preventDefault(); // Prevent the form from submitting normally

            // Show the dialog box and overlay
            document.getElementById('dialogBox').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';

            // Handle 'Okay' button click
            document.getElementById('okayBtn').addEventListener('click', function() {
                // Redirect to studenthome.php
                window.location.href = 'studenthome.php';
            });

            return false; // Stop form submission
        }
    </script>

    <div class="button-container">
        <a href="studenthome.php" class="back-button">Back to Student Dashboard</a>
    </div>

</body>
</html>
