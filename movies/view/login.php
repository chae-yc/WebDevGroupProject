<!-- log in -->

<div id="loginWin">

    <form class="modal-content animate" method="post" id='loginform' action="model/LoginModel.php">
        <div class="imgcontainer">
            <span onclick="cancel()" class="close" title="Close Modal">&times;</span>
            <img src="image\img_avatar2.png" alt="Avatar" class="avatar">
        </div>
    
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input id='unameid' type="text" placeholder="Enter Username" name="uname" require>
    
            <label for="pwd"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pwd" require>

            <input type="hidden" name="page" value="login">
            <input type="hidden" name="submit" value="sub">

            <!-- submit -->
            <button class="btn btn-success" onclick="login()">Login</button>
            
            <a href="view/register.php"  target="_blank" ><button type="button" class="btn btn-primary">Register</button></a>
            <button type="button" onclick="cancel()" class="btn btn-danger" >Cancel</button>
        </div>
    </form>
    <script src='js/login.js'></script>
</div>
