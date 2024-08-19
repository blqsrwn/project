<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .header, .footer {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1 class="text-center">Electricity Consumption Calculator</h1>
    </div>

    <div class="container mt-5">
        <form action="" method="POST" class="mt-4">
            <div class="form-group">
                <label for="voltage">Voltage (V):</label>
                <input type="number" step="0.01" class="form-control" id="voltage" name="voltage" required>
            </div>
            <div class="form-group">
                <label for="current">Current (A):</label>
                <input type="number" step="0.01" class="form-control" id="current" name="current" required>
            </div>
            <div class="form-group">
                <label for="rate">Current Rate (cents/kWh):</label>
                <input type="number" step="0.01" class="form-control" id="rate" name="rate" required>
            </div>
            <button type="submit" class="btn btn-secondary">Calculate</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $voltage = $_POST['voltage'];
            $current = $_POST['current'];
            $rate = $_POST['rate'];

            // Calculate Power (Wh)
            $power = $voltage * $current;

            // Assuming 1 hour usage for the calculation
            $energyPerHour = ($power / 1000); // in kWh

            // Calculate total cost per hour and per day
            $totalPerHour = $energyPerHour * ($rate / 100);
            $totalPerDay = $totalPerHour * 24;

            // Format the results to two decimal places
            $totalPerHourFormatted = number_format($totalPerHour, 2);
            $totalPerDayFormatted = number_format($totalPerDay, 2);

            echo "<div class='container mt-5'>
                    <h3>Results:</h3>
                    <p>Power: {$power} Wh</p>
                    <p>Energy per Hour: {$energyPerHour} kWh</p>
                    <p>Total Cost per Hour: RM {$totalPerHourFormatted}</p>
                    <p>Total Cost per Day: RM {$totalPerDayFormatted}</p>
                  </div>";
        }
        ?>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Electricity Calculator. All Rights Reserved</p>
    </div>
</body>
</html>
