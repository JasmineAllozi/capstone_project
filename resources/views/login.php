

    <form id="login_form" method="POST" action="/authenticate">

        <?php if (!empty($_SESSION) && isset($_SESSION['error']) && !empty($_SESSION['error'])) : ?>
            <div class='' role='alert'>
                <?= $_SESSION['error'] ?>
            </div>
        <?php
            $_SESSION['error'] = null;
        endif; ?>
               <h1 style="text-align: center;">Login To Your Account</h1>

         <div class="form">
            <label for="admin-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="admin-username" name="username">
        </div>
        <div class="form" >
            <label for="admin-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin-password" name="password">
        </div>
        <div class="form" >
            <input type="checkbox" class="form-check-input" id="remember-me" name="remember_me">
            <label class="form-check-label" for="remember-me">Remember Me</label>
        </div>
        <button type="submit" class="btn" id="login_btn">Login</button>
        </div>
        
    </form>
         
    
