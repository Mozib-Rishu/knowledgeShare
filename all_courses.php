<?php session_start();?>


<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Share</title>
	<?php include("head.php");?>
</head>

<body>

    <div class="container-fluid page-container">
        <div>
            <?php include("navbar.php");?>
        </div>

        <div class="card-group">
            <div class="card border-dark">
                <div style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            
        </div>
                    

                <!-- start footer -->
            <?php include("footer.php");?>
                <!-- end footer -->
    </div>
</body>
</html>
