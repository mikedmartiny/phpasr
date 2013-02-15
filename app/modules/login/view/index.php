<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */
?>
<div id="body" class="group width">
    <div id="breadcrum">Home &gt; Login</div>
    <div id="login">
        <legend>Login</legend>
        
        <form action="" method="POST">
            <fieldset>
                <label>Email</label><br><br>
                <input type="text" name="loginEmail" value="<?php echo @$_POST['loginEmail']; ?>"><br><br><br>

                <label>Password</label><br><br>
                <input type="password" name="loginPassword"><br><br><br>

                <button type="submit" name="login">Login</button>
            </fieldset>
        </form>
        
        <?php echo $this->messageWriter(); ?>
    </div>
</div>