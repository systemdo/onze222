<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Onze222</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
        <div class="well col-md-6 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
                
            <?php 
                $form = ActiveForm::begin(
                    [ 
                        'options' => ['class' => 'form-horizontal']
                    ]
                ); 
            ?>
            
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="email">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <br/>
                    <!-- <div class="clearfix"></div>
                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div> -->
                    <div class="clearfix"></div>

                    <p class="">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            <?php ActiveForm::end(); ?>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->
