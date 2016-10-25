<div class="col-xs-9">
    <h3>Log In</h3>
    <div><?php if(!empty($data['loginError'])) echo $data['loginError'] ?></div>
    <form method="post" action="/user/login">
        <div class="form-group">
            <label for="email">Email address:</label><span><?php if(!empty($data['emailError'])) echo $data['emailError']; ?></span>
            <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php if(!empty($data['email'])) echo $data['email'];  ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label><span><?php if(!empty($data['passwordError'])) echo $data['passwordError']; ?></span>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<div class="col-xs-3">
    ddd</div>