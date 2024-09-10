<!-- SignUp Modal -->
<div class="modal fade" id="signUp-modal" tabindex="-1" aria-labelledby="signUp-ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable d-flex flex-column align-items-center justify-content-center" style="max-width: 350px; margin:auto;">
        <p class="m-0" id="txtHint"></p>
        <div class="modal-content border border-danger">
            <div class="modal-body p-0">
                <div class="row mx-0">
                    <div class="col-12 px-0 d-flex align-items-center justify-content-center">
                        <div class="py-4 rounded d-flex flex-column align-items-center justify-content-center gap-3">
                            <div class="text-center">
                                <p class="m-0 text-primary fw-normal fs-4">Welcome!</p>
                                <p class="">Create your own account</p>
                            </div>
                            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" id="signup-form">
                                <!--Username -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div style="width: 45px; height:36px">
                                        <div class="w-100 h-100 rounded-circle d-flex align-items-center justify-content-center border border-secondary">
                                            <i class="bi bi-person-bounding-box fs-6 text-secondary"></i>
                                        </div>
                                    </div>
                                    <input type="text" id="userusername" class="form-control py-2 px-3 rounded-5" placeholder="Username" required>
                                </div>

                                <!--Email Id -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div style="width: 45px; height:36px">
                                        <div class="w-100 h-100 rounded-circle d-flex align-items-center justify-content-center border border-success">
                                            <i class="bi bi-envelope fs-6 text-success"></i>
                                        </div>
                                    </div>
                                    <input type="email" id="emailId" class="form-control py-2 px-3 rounded-5" placeholder="Email Id" required>
                                </div>

                                <!--Phone Number -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div style="width: 45px; height:36px">
                                        <div class="w-100 h-100 rounded-circle d-flex align-items-center justify-content-center border border-danger">
                                            <i class="bi bi-telephone fs-6 text-danger"></i>
                                        </div>
                                    </div>
                                    <input type="number" id="phone-number" class="form-control py-2 px-3 rounded-5" placeholder="Phone number" required>
                                </div>

                                <!--Password -->
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div style="width: 45px; height:36px">
                                        <div class="w-100 h-100 rounded-circle d-flex align-items-center justify-content-center border border-primary">
                                            <i class="bi bi-key-fill fs-6 text-primary"></i>
                                        </div>
                                    </div>
                                    <input type="password" id="userpassword" class="form-control py-2 px-3 rounded-5" placeholder="Password" required>
                                </div>

                                <div class="mt-4 d-flex justify-content-center">
                                    <button type="button" id="create-account" class="btn btn-success px-5 py-2 rounded-5">Create Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>