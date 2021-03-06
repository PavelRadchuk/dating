<!DOCTYPE html>
<html>
    <head>
        <title>Personal Information</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div class="container">

            <h2>Personal Information</h2>
            <hr> 

            <div class="col-7">
                <form class="form" action="" method="post">

                    <label class="form-control-label" for="first">First Name</label>
                    <?php if (isset($errors['first'])): ?>
                        <p><?= ($errors['first']) ?></p>
                    <?php endif; ?>
                    <div class="input-group">
                        <input class="form-control" type="text" id="first" name="first"
                                value="<?= ($first) ?>">
                        <span class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                    </div>

                    <label class="form-control-label" for="last">Last Name</label>
                    <?php if (isset($errors['last'])): ?>
                        <p><?= ($errors['last']) ?></p>
                    <?php endif; ?>
                    <input class="form-control" type="text" id="last" name="last"
                            value="<?= ($last) ?>">

                    <label class="form-control-label" for="age">Age</label>
                    <?php if (isset($errors['age'])): ?>
                        <p><?= ($errors['age']) ?></p>
                    <?php endif; ?>
                    <input class="form-control" type="text" id="age" name="age"
                            value="<?= ($age) ?>">

                    <label class="form-control-label">Gender</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="male"
                                        <?php if ($gender == 'male'): ?>checked<?php endif; ?>>
                                &nbsp;&nbsp;Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="female"
                                        <?php if ($gender == 'female'): ?>checked<?php endif; ?>>
                                &nbsp;&nbsp;Female
                            </label>
                        </div>
                    </div>

                    <label class="form-control-label" for="phone">Phone Number</label>
                    <?php if (isset($errors['phone'])): ?>
                        <p><?= ($errors['phone']) ?></p>
                    <?php endif; ?>
                    <input class="form-control" type="text" id="phone" name="phone"
                            value="<?= ($phone) ?>">

                    <label class="form-control-label">Premium Membership</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="premium" value="premium"
                                        <?php if ($premium == 'premium'): ?>checked<?php endif; ?>>
                                &nbsp;&nbsp;Sign me up for a Premium Account!
                            </label>
                        </div>
                    </div>

                    <button id="next" class="btn btn-primary" type="submit" name="submit">Next ></button>
                </form>
            </div>

            <div class="col-4 float-right" id="note">
                <p class="text-center"><strong>Note:</strong> All information entered is protected by our <a href="">privacy policy</a>.
                Profile information can only be viewed by others with your permission.</p>
            </div>
        </div> <!-- /container -->

        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
