<?php require_once(APP_ROOT . "/views/layout/top.php"); ?>
    <div class="container">
        <div class="col-md-6 offset-3">
            <h1 class="text-primary text-center my-5">Login Page</h1>
            <!---------- Form Start --------->
            <form action="<?php echo url("User/login"); ?> " method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                </div>
                <button type="submit" class="btn btn-primary float-right">Login</button>
            </form>
            <!---------- Form End --------->
        </div>
    </div>
<?php require_once(APP_ROOT . "/views/layout/base.php"); ?>