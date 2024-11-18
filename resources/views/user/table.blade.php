<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Page</title>
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

        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 80%;
            max-width: 1000px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        table th {
            background-color: #007bff; /* Blue */
            color: white;
        }

        table td {
            background-color: #f9f9f9;
        }

        table tr:nth-child(even) td {
            background-color: #f1f1f1;
        }

        /* Button Style */
        .btn-delete {
            background-color: #dc3545; /* Red */
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-delete:hover {
            background-color: #c82333; /* Darker Red */
        }

        .btn-back {
            background-color: #007bff; /* Blue */
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-back:hover {
            background-color: #0056b3; /* Darker Blue */
        }

    </style>
</head>
<body>

    <div class="table-container">
        <h1>User Table</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through users to populate the table -->
                @foreach ($users as $user)
                    @if ($user->status == 1)  <!-- Only show active users -->
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->gender) }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</td>
                            <td>
                                <!-- Soft delete button -->
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Back to form page -->
        <form action="{{ route('user.create') }}" method="GET">
            <button type="submit" class="btn-back">Back to Form Page</button>
        </form>
    </div>

</body>
</html>
