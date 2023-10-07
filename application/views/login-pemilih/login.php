<div class="login-box">
    <img src="<?= base_url(); ?>assets/dist/img/Lambang_Universitas_Majalengka.png" alt="" class="img" style="width:120px; margin-left:32%;">
    <div class="login-logo">
        <a href="#"><b class="text-primary">E-Voting</b> <span style="color:#2C3A47;">ORMAWA</span> </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body" style="background-color: #2C3A47;">
            <?= $this->session->flashdata('pesan-gagal'); ?>

            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="NPM : 19.14.1.xxxx " name="npm" autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user text-white"></span>
                        </div>
                    </div>
                </div>

                <div class="social-auth-links text-center mb-3">
                    <button type="submit" name="login" class="btn btn-block btn-primary">
                        <i class="fas fa-vote-yea mr-2"></i> Mulai Voting
                    </button>
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->