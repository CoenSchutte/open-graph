<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
<div class="container">
    <div class="row">

        <form action='{{route('submit')}}' method="POST">
            @csrf
            <select name="platform" required>
                <option value="twitter">Twitter</option>
                <option value="facebook">Facebook</option>
                <option value="all">all</option>
            </select>
            <input type="text" name="url" id="url" required>
            <input type="submit" value="Submit">
        </form>
    </div>

</div>
</body>
</html>
