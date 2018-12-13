<?php
/**
 * Created by PhpStorm.
 * User: arb
 * Date: 17/07/2018
 * Time: 16:09
 */
?>


<form class="form-horizontal" method="POST" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
    <fieldset>

        <!-- Form Name -->
        <legend>Connexion</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email</label>
            <div class="col-md-4">
                <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="validate"></label>
            <div class="col-md-4">
                <button id="validate" name="validate" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

    </fieldset>
</form>

