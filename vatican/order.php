<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Selection Form</title>
    <link rel="stylesheet" href="order.css">
</head>
<body>
    <div class="form-container">
        <h1>Select Event</h1>
        <form action="connection2.php" method="POST">
            
            <div class="form-group">
                <label for="event">Choose Event:</label>
                <select name="event" id="event" required>
                    <option value="">Select Event</option>
                    <option value="birthday">Birthday</option>
                    <option value="wedding">Wedding</option>
                </select>
            </div>

            
            <div id="birthday-fields" class="hidden">
                <div class="form-group">
                    <label for="birthday_name">Birthday Name:</label>
                    <input type="text" name="birthday_name" id="birthday_name">
                </div>
                <div class="form-group">
                    <label for="size_kg">Size in KG:</label>
                    <input type="number" name="size_kg" id="size_kg" min="0">
                </div>
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" name="color" id="color">
                </div>
                <div class="form-group">
                    <label for="date_of_collection">Date of Collection:</label>
                    <input type="date" name="date_of_collection" id="date_of_collection">
                </div>
                <div class="form-group">
                    <label for="deposit_amount">Deposit Amount:</label>
                    <input type="number" name="deposit_amount" id="deposit_amount" min="0">
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method:</label>
                    <select name="payment_method" id="payment_method">
                        <option value="mpesa">Mpesa Till</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            </div>

           
            <div id="wedding-fields" class="hidden">
                <div class="form-group">
                    <label for="cake_name">Cake Name:</label>
                    <input type="text" name="cake_name" id="cake_name">
                </div>
                <div class="form-group">
                    <label for="cake_size_kg">Size in KG:</label>
                    <input type="number" name="cake_size_kg" id="cake_size_kg" min="0">
                </div>
                <div class="form-group">
                    <label for="cake_colors">Cake Colors:</label>
                    <input type="text" name="cake_colors" id="cake_colors">
                </div>
                <div class="form-group">
                    <label for="wedding_date_of_collection">Date of Collection:</label>
                    <input type="date" name="wedding_date_of_collection" id="wedding_date_of_collection">
                </div>
                <div class="form-group">
                    <label for="wedding_payment_method">Payment Method:</label>
                    <select name="wedding_payment_method" id="wedding_payment_method">
                        <option value="mpesa">Mpesa Till</option>
                        <option value="cash">Cash</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        
        document.getElementById('event').addEventListener('change', function () {
            var eventChoice = this.value;
            
           
            document.getElementById('birthday-fields').classList.add('hidden');
            document.getElementById('wedding-fields').classList.add('hidden');
            
            
            if (eventChoice === 'birthday') {
                document.getElementById('birthday-fields').classList.remove('hidden');
            } else if (eventChoice === 'wedding') {
                document.getElementById('wedding-fields').classList.remove('hidden');
            }
        });
    </script>
</body>
</html>
