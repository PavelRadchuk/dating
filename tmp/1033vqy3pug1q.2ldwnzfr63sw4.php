<!DOCTYPE html>
<html>
    <head>
        <title>Meet Some People</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link type="text/css" rel="stylesheet" href="styles/styles.css">
    </head>
    <body>

        <div class="container">

            <div class="row">
                <div id="summary" class="col-6">
                    <p>Name: <?= ($first) ?>  <?= ($last) ?></p>
                    <p>Gender: <?= ($gender) ?></p>
                    <p>Age: <?= ($age) ?></p>
                    <p>Phone: <?= ($phone) ?></p>
                    <p>Email: <?= ($email) ?></p>
                    <p>State: <?= ($state) ?></p>
                    <p>Seeking: <?= ($seeking) ?></p>
                    <?php if ($member  instanceof PremiumMember): ?><p>Interests:
                        <?php foreach (($indoor?:[]) as $activity): ?><?= ($activity) ?>  <?php endforeach; ?>
                        <?php foreach (($outdoor?:[]) as $activity): ?><?= ($activity) ?>  <?php endforeach; ?>
                    </p><?php endif; ?>
                </div>

                <div class="col-6">
                    <img src="https://image.flaticon.com/icons/svg/16/16480.svg" alt="default profile pic">
                    <h4 id="bioHeader">Biography</h4>
                    <p><?= ($bio) ?></p>
                </div>
            </div>

            <a id="contact" class="btn btn-lg btn-primary" href="" role="button">Contact Me!</a>

        </div> <!-- /container -->

        <!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
