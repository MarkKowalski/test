<!--
Fix user errors notifications

-->


<div class="col-xs-9">
    <h3>Sign Up</h3>
 
    

    <div><?php if(!empty($data['userError'])) echo $data['userError']; ?></div>
    <div><?php if(!empty($data['verificationMsg'])) echo $data['verificationMsg'] ?></div>
    <form method="post" action="/user/signup">
        <div class="form-group">
            <label for="email">Email address:</label><span><?php if(!empty($data['emailError'])) echo $data['emailError']; ?></span>
            <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php if(!empty($data['email'])) echo $data['email'];  ?>">
        </div>
        <div class="form-group">
            <label for="password">Password:</label><span><?php if(!empty($data['passwordError'])) echo $data['passwordError']; ?></span>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="passwordRepeat">Password Repeat:</label><span><?php if(!empty($data['passwordRepeatError'])) echo $data['passwordRepeatError']; ?></span>
            <input name="passwordRepeat" type="password" class="form-control" id="passwordRepeat" placeholder="Password Repeat">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<div class="col-xs-3">
    Here could go some FAQ
</div>