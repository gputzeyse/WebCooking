        <section id="content">
            <header>
            	<h1>Connexion  </h1>
            </header>
            
            <?php if (isset($error)){?>
            <span class='error'><?php echo($error); ?></span>
            <?php }?>
            
            <?php echo (form_open('login')); ?>
                
            <label for="email">Email</label>
            <?php echo (form_error('email','<span class="error">','</span>')); ?>
            
            <input type="text" name="email" value='<?php echo (set_value("email")); ?>' />
            
            <label for="password">Password</label>
            <?php echo (form_error('password','<span class="error">','</span>')); ?>
            
            <input type="password" name="password" value='<?php echo (set_value("password")); ?>' />
            
            <input type="submit" value="Login"/>
            
            <?php echo (form_close()); ?>
            
        </section>
