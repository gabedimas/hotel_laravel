<form method="post" name="loginform" action="{{ url('login/auth') }}">
    @csrf
    <input type="text" placeholder="Your E-Mail" name="email" id="inputEmail">
    <br><br>
    <input type="password" placeholder="Your password" name="password" id="inputEmail">
    <br><br>
    <input type="submit" value="Login">
</form>

