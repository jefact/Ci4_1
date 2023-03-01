
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">LOGIN PAGE</h1>
                                    </div>
                                    <!-- Checking session -->
                                    <?php if(session()->getFlashdata('error')):?>
                                    <div class="alert alert-danger">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                    <?php endif;?>
                                    
                                    <form class="user" method="post" action="<?= base_url('/login'); ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="email" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="<?= set_value('email') ?>">
                                                <?php if(isset($validation)):?>
                                                <small class="text-danger pl-3"><?= $validation->getError('email') ?></small>
                                                <?php endif;?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" name="password" placeholder="Password">
                                                <?php if(isset($validation)):?>
                                                <small class="text-danger pl-3"><?= $validation->getError('password') ?></small>
                                                <?php endif;?>                                        
                                            </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>