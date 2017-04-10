<div class="panel-body">



    <form role="form" id="form" action="?controller=login&action=login" method="POST">


        <div class="form-group"><label>Username</label>
            <p><?=(isset($userError)) ? $userError : ''?></p>
            <input type="text" name="username" placeholder="Email" class="form-control" required>
        </div>
        <div class="form-group"><label>Password</label>
            <p><?=(isset($passError)) ? $passError : ''?></p>
            <input type="password" name="password" placeholder="Enter password" class="form-control" required>
        </div>

        <div>
            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>Submit</strong></button>
        </div>
    </form>

</div>


