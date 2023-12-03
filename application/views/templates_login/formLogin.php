</head>

<body class="bg-gradient-primary">

    <div class="container" >

        <!-- Outer Row -->
        <div class="row justify-content-center" >

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div data-aos="zoom-in" data-aos-duration="700" class="card o-hidden border-0 shadow-lg my-5"  >
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" >
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">APLIKASI PENGGAJIAN<br><b>PT. BINTANG ABADI SENTOSA</b></h1>
                                    </div>
                                    <?= $this->session->flashdata('pesan') ?>
                                    <form class="user" method="post" action="<?= base_url('welcome') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username..." name="username">
                                            <?= form_error('username', '<div class="text-small text-danger" >', '</div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                            <?= form_error('password', '<div class="text-small text-danger" >', '</div>') ?>
                                        </div>
                                        <hr>
                                        <button type='submit' class="btn btn-primary btn-user btn-block mb-3">Login</button>
                                        
                                        <a style="width: 100%;" class="btn btn-warning" href="<?= base_url('landingPage') ?>">Back to landing page</a>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

   