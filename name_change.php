<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Name Change</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Name Change</h2>
        <form action="change_name.php" method="POST">
            <div class="form-group">
                <label for="new_name">New Name:</label>
                <input type="text" class="form-control" id="new_name" name="new_name" required>
            </div>
            <!-- Hidden input field to carry forward email to the next page -->
            <input name="email" value="">
            <button type="submit" class="btn btn-primary">Change Name</button>
        </form>
    </div>
</body>
</html>
