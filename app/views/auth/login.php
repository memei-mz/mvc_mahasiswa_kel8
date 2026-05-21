<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h4>
                        Login
                    </h4>

                </div>

                <div class="card-body">

                    <?php if (isset($_SESSION['error'])) : ?>

                        <div class="alert alert-danger">

                            <?= $_SESSION['error']; ?>

                        </div>

                        <?php unset($_SESSION['error']); ?>

                    <?php endif; ?>

                    <form method="POST"
                        action="<?= BASEURL; ?>/auth/login">

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text"
                                name="username"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <button type="submit"
                            class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>