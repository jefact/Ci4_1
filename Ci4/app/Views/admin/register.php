
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <?php if(session()->getFlashdata('error')):?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif;?>
                            <form class="user" method="POST" action="<?= base_url('/register'); ?>">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username"
                                        placeholder="Username" value="<?= set_value('username'); ?>">
                                        <?php if(isset($validation)):?>
                                            <small class="text-danger pl-3"><?= $validation->getError('username') ?></small>
                                        <?php endif;?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                        placeholder="John@gmail.com" value="<?= set_value('email'); ?>">
                                        <?php if(isset($validation)):?>
                                            <small class="text-danger pl-3"><?= $validation->getError('email') ?></small>
                                        <?php endif;?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password1"name="password1" placeholder="Password">
                                            <?php if(isset($validation)):?>
                                            <small class="text-danger pl-3"><?= $validation->getError('password2') ?></small>
                                        <?php endif;?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                        id="password2"name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('/login'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>