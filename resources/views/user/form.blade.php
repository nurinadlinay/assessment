<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="date"] {
            width: 96%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Checkbox Style - Bigger Checkbox */
        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group label {
            margin-right: 10px; /* Creates space between the label and the checkbox */
        }

        .checkbox-group input[type="checkbox"] {
            transform: scale(1.5); /* Makes the checkbox bigger */
            margin-right: 10px; /* Space between checkbox and label */
        }

        .checkbox-label {
            font-size: 16px;
        }

        /* Button Style */
        .btn-submit,
        .btn-table {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 48%;
            display: inline-block;
        }

        .btn-submit {
            background-color: green;
            color: white;
        }

        .btn-table {
            background-color: #007bff;
            color: white;
        }

        .btn-submit:hover {
            background-color: darkgreen;
        }

        .btn-table:hover {
            background-color: #0056b3;
        }

        .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Added margin to create gap between buttons */
        .btn-submit {
            margin-right: 10px; /* Adds gap between the two buttons */
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Create User</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" name="birthday" required>
        </div>
        
        <div class="form-group checkbox-group">
            <label for="status" class="checkbox-label">Active:</label>
            <input type="checkbox" id="status" name="status" value="1">
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-submit">Submit</button>
            <!-- Table Page button now redirects using JavaScript -->
            <button type="button" class="btn-table" onclick="window.location.href='/table'">Go to Table Page</button>
        </div>
    </form>
</div>

</body>
</html>
