
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-4">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <?php 
                    if(session()->getFlashdata('msg')):
                        ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php 
                endif;
                ?>
                <?php echo form_open(site_url('login/auth'), array('class' => 'form-signin'));?>
                <div class="form-label-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                    <label for="email">Email address</label>
                </div>

                <div class="form-label-group">
                    <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                <hr class="my-4">
                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>
</div>