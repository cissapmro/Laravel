<!DOCTYPE html>
<html>
<head>
<title> @yield('title') - Laravel</title>
</head>
<body>
<header>
    <h2>Header</h2>
</header>
<hr>
<section>
    @yield('content')
</section>
<hr>
<footer>
    @yield('rodape')
    <h2>Rodapé</h2>
</footer>
</body>
</html>
