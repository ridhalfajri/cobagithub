<?= $this->extend('Login/templates/index.php'); ?>

<?= $this->section('content'); ?>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <i class="fas fa-seedling"></i>
                                        <h1 class="h4 text-gray-900 mb-4">C-FRUIT</h1>
                                    </div>
                                    <form class="user" action="<?= base_url('/'); ?>" method="post" >
                                        <?php if (session()->get('message')): ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                Login gagal <strong><?= session()->getFlashdata('message'); ?></strong> 
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="username" required name="username" class="form-control form-control-user"
                                                id="inputUsername" aria-describedby="usernameHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" required name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="Register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
<?= $this->endSection(); ?>
