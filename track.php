<?php
mysql_connect("localhost","root","") or die("Connection failed. Please contact IT support.");
mysql_select_db("db_a61f6d_ths") or die("DB Not Found")

//collect

if(isset($POST['search']))
{
$searchq = $_POST['search'];
$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);

$query = mysql_query("SELECT * FROM tbl_orders WHERE NAME='%$searchq%'") or die("Search Failed");
$count = mysql_num_rows($query);
if($count == 0) {
$output = 'No orders found.';
}

else
{
while($row = mysql_fetch_array($query))
	{
		$DATE = $row['DATE'];
		$PRODUCT_ID = $row['PRODUCT_ID'];
		$SIZE = $row['SIZE'];
		$QUANTITY = $row['QUANTITY'];
		$STATUS = $row['STATUS'];

		$output = .$PRODUCT_ID.' '.$SIZE.' '.$QUANTITY.' '.$STATUS;

		echo .$output
	}
}

}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Miela Lacanilao">
    <title>THS - Track Your Order</title>

      <!-- ADD THIS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="text-center">

     <form action="Track.php" method="post">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">THS</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="/Homepage.php">Home</a>
        <a class="nav-link active" href="/Track.php">Track Your Order</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Order Tracking</h1>
      <p class="lead">Please enter your name.</p>

    <p class="lead"> <input type="text" name="search" placeholder="Name" /></p>
    <p class="lead"> <input type="submit" value="Enter" href="#" class="btn btn-lg btn-secondary"/> </p>
      <p class="lead"><?php print($output);?> </p>
  </main>
  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Instagram: @thehappysheets&nbsp;&nbsp;&nbsp; Facebook: The Happy Sheets</p>
    </div>
  </footer>
</div>
      </form>
</body>
</html>


<style type="text/css">

    /*
 * Globals
 */

/* Links */
a,
a:focus,
a:hover {
  color: #fff;
}

/* Custom default button */
.btn-secondary,
.btn-secondary:hover,
.btn-secondary:focus {
  color: #333;
  text-shadow: none; /* Prevent inheritance from `body` */
  background-color: #fff;
  border: .05rem solid #fff;
}


/*
 * Base structure
 */

html,
body {
  height: 100%;
  background-color: #333;
}

body {
  display: -ms-flexbox;
  display: flex;
  color: #fff;
  text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
  box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
}

.cover-container {
  max-width: 42em;
}


/*
 * Header
 */
.masthead {
  margin-bottom: 2rem;
}

.masthead-brand {
  margin-bottom: 0;
}

.nav-masthead .nav-link {
  padding: .25rem 0;
  font-weight: 700;
  color: rgba(255, 255, 255, .5);
  background-color: transparent;
  border-bottom: .25rem solid transparent;
}

.nav-masthead .nav-link:hover,
.nav-masthead .nav-link:focus {
  border-bottom-color: rgba(255, 255, 255, .25);
}

.nav-masthead .nav-link + .nav-link {
  margin-left: 1rem;
}

.nav-masthead .active {
  color: #fff;
  border-bottom-color: #fff;
}

@media (min-width: 48em) {
  .masthead-brand {
    float: left;
  }
  .nav-masthead {
    float: right;
  }
}


/*
 * Cover
 */
.cover {
  padding: 0 1.5rem;
}
.cover .btn-lg {
  padding: .75rem 1.25rem;
  font-weight: 700;
}


/*
 * Footer
 */
.mastfoot {
  color: rgba(255, 255, 255, .5);
}


</style>
