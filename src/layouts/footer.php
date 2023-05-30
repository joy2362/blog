<footer class="row tm-row">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
         aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/login">
                    <div class="modal-body">
                        <div class="form-group ">
                            <label for="email" class="col-form-label tm-color-primary">Email</label>
                            <input class="form-control" name="email" id="email" type="email" required>
                        </div>
                        <div class="form-group  ">
                            <label for="password" class="col-form-label tm-color-primary">Password</label>
                            <input class="form-control " name="password" id="password" type="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn tm-color-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn tm-color-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr class="col-12">
    <div class="col-md-6 col-12 tm-color-gray">
        Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
    </div>
    <div class="col-md-6 col-12 tm-color-gray tm-copyright">
        Copyright 2020 Blog Company Co. Ltd.
    </div>
</footer>