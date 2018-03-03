<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <div class="container">

            <h2>Profile</h2>
            <hr> 

            <form class="form" action="" method="post">
            <div class="row">
                <div class="col-6">
                    <label class="form-control-label" for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email"
                            value="<?= ($email) ?>">

                    <label class="form-control-label" for="state">State</label>
                    <select class="form-control" type="text" id="state" name="state">
                        <?php foreach (($states?:[]) as $stateOption): ?>
                            <option <?php if ($stateOption == $state): ?>selected<?php endif; ?>>
                                <?= ($stateOption) ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label class="form-control-label">Seeking</label>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="seeking" value="male"
                                        <?php if ($seeking == 'male'): ?>checked<?php endif; ?>>
                                &nbsp;&nbsp;Male
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="seeking" value="female"
                                        <?php if ($seeking == 'female'): ?>checked<?php endif; ?>>
                                &nbsp;&nbsp;Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <label class="form-control-label" for="bio">Biography</label>
                    <textarea class="form-control" type="text" id="bio" name="bio" rows=7><?= ($bio) ?></textarea>
                </div>
            </div>

                <button id="next" class="btn btn-primary" type="submit" name="submit">Next ></button>
            </form>

        </div> <!-- /container -->

        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
