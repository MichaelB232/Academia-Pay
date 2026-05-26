<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial;
            margin: 40px;
            background-color: #f5f5f5;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="card">

        <h1>Dashboard</h1>

        <hr>

        <h3>Welcome, {{ $user->username }}</h3>

        <form action="/logout" method="POST">

            @csrf

            <button type="submit" class="logout-btn">
                Logout
            </button>

        </form>

    </div>

</body>

</html>
