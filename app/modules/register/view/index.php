<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 15/02/2013 NEW FILE
 */
?>
<div id="body" class="group width">
    <div id="breadcrum">Home &gt; Register</div>
    <div id="register">
        <legend>Register</legend>
        
        <form action="" method="POST">
            <fieldset>
                <label>Email</label><br><br>
                <input type="text" name="loginEmail"><br><br><br>

                <label>Password</label><br><br>
                <input type="password" name="loginPassword"><br><br><br>

                <button type="submit" name="login">Login</button>
            </fieldset>
        </form>
        
        <?php echo $this->messageWriter(); ?>
    </div>
</div>