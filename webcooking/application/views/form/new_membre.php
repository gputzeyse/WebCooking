
            
            <section class='content'>
            <header>
            <h1> Inscription des nouveaux Membres </h1>
            </header>
            
            <?php if (isset($error)){ ?>
            <span class='error'><?php echo($error); ?></span>
            <?php }?>
            
            <?php echo (form_open('login/add')); ?>
            
            <fieldset>
            
            
            <label for="email">Email:</label>
            <?php echo (form_error('email','<span class="error">','</span>')); ?>
            <input type="email" name="email" value='<?php echo (set_value("email")); ?>' required/>
            
            <label for="password">Password:</label>
            <?php echo (form_error('password','<span class="error">','</span>')); ?>
            
            <input type="password" name="password" value='<?php echo (set_value("password")); ?>' required/>
            
            <label for="login">Pseudo:</label>
            <?php echo (form_error('login','<span class="error">','</span>')); ?>
            <input type="text" name="login" value='<?php echo (set_value("login")); ?>' required/>
            
            <label for="nom">Nom:</label>
            <?php echo (form_error('nom','<span class="error">','</span>')); ?>
            <input type="text" name="nom" value='<?php echo (set_value("nom")); ?>' required/>
            
            <label for="prenom">Prénom:</label>
            <?php echo (form_error('prenom','<span class="error">','</span>')); ?>
            <input type="text" name="prenom" value='<?php echo (set_value("prenom")); ?>' required/>
           
            <label for="adresse">Adresse:</label>
            <?php echo (form_error('adresse','<span class="error">','</span>')); ?>
            <input type="text" name="adresse" value='<?php echo (set_value("adresse")); ?>' required/>
            
            <label for="code_postal">Code postal:</label>
            <?php echo (form_error('code_postal','<span class="error">','</span>')); ?>
            <input type="text" name="code_postal" value='<?php echo (set_value("code_postal")); ?>' required/>
            
            <label for="ville">Ville:</label>
            <?php echo (form_error('ville','<span class="error">','</span>')); ?>
            <input type="text" name="ville" value='<?php echo (set_value("ville")); ?>' required/>
            
            <label for="date_naissance">Date de naissance:</label>
            <?php echo (form_error('date_naissance','<span class="error">','</span>')); ?>
            <input type="date" name="date_naissance" value='<?php echo (set_value("date_naissance")); ?>' required/>
            
            <label for="news">recevoir les Newsletter:</label>
            <input type="checkbox" name="news" value='1'/>
            
            
            </fieldset>
            
             
            <input type="submit" value="Inscription"/>  
           
            
            <?php echo (form_close()); ?>
            
       </section>