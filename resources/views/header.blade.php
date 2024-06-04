<style>
    nav {
        text-align: center;
    }
    a {
        text-decoration: none;
    }

    a:link,
    a:visited {
        color: black;
    }

    a:hover {
        color: red;
    }
</style>

<nav id="nav">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ url('kategori') }}">Kategori</a>
    <a href="{{ url('register') }}">Register</a>
    <a href="{{ url('login') }}">Login</a>
    <a href="{{ url('profile') }}">Profile</a>
</nav>