<!DOCTYPE html>
<html>
    <head>
        <title>Interests</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="styles/styles.css">
    </head>
    <body> 
        <div class="container">

            <h2>Interests</h2>
            <hr>

            <form class="form" action="" method="post">
                <label class="form-control-label">Indoor Interests</label>
                <div class="form-check">
                    <?php foreach (($indoors?:[]) as $activity): ?>
                        <div class="col-3 float-left">
                            <label class="form-check-label"><input class="form-check-label" type="checkbox" name="indoors[]"
                                value="<?= ($activity) ?>"
                                <?php if (!is_null( $indoor )): ?>
                                    <?php if (in_array( $activity ,  $indoor )): ?>checked<?php endif; ?>
                                <?php endif; ?>>
                                <?= ($activity)."
" ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <label class="form-control-label">Outdoor Interests</label>
                <div class="form-check">
                    <?php foreach (($outdoors?:[]) as $activity): ?>
                        <div class="col-3 float-left">
                            <label class="form-check-label"><input class="form-check-label" type="checkbox" name="outdoors[]"
                                value="<?= ($activity) ?>"
                                <?php if (!is_null( $outdoor )): ?>
                                    <?php if (in_array( $activity ,  $outdoor )): ?>checked<?php endif; ?>
                                <?php endif; ?>>
                                <?= ($activity)."
" ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
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
