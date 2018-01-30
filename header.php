<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>To do list</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="master.css">
    </head>
    <body>


    <div class="header">
          <div class="row">
            <div class="container">
              <div class="col-md-6 pull-left">
                <h1><a href="index.php">To do list</a></h1>
              </div>

              <div class="date-in-header col-md-3">
                  <p>Sun rises: <?php echo date_sunrise(time(), SUNFUNCS_RET_STRING, 54.68, 25.28, 90, 1);?></p>
                  <p>Sun sets: <?php echo date_sunset(time(), SUNFUNCS_RET_STRING, 54.68, 25.28, 90, 1);?> <p>


              </div>

              <div class="date-in-header col-md-3 pull-right">
                <p>Today is:</p>
                <p><?php echo date("Y-m-d") ?></p>
              </div>
            </div>

        </div>
    </div>
    </body>
</html>
