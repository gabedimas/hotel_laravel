<form method="post" name="register" action="{{ url('register/add') }}">
    @csrf
    <input type="text" placeholder="Your E-Mail" name="email"> 
    <br><br>
    <input type="text" placeholder="Name" name="nama">
    <br><br>
    <input type="password" placeholder="Your password" name="password">
    <br><br>
    <select name="Role" >
    <option value="user">User</option>
    <option value="admin">Admin</option>
    <option value="manager">Manager</option>
    </select>
    <br><br>
    <input type="submit" value="Register">
</form>