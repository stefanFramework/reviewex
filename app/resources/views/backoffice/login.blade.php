<html>
<head>
    <title>
        Reviewex
    </title>
</head>
<body>
    <form method="post" action="{{ $loginRoute }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <hr>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
