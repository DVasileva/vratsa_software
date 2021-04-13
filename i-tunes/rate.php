<?php
include ('includes/header.php');
?>

<h2>How would you rate this song?</h2>
	<form action="rate.php" method="post">

			<div id="rating_div">
						<div class="star-rating">
							<span class="fa fa-star-o fa-2x" data-rating="1"></span>
							<span class="fa fa-star-o fa-2x" data-rating="2"></span>
							<span class="fa fa-star-o fa-2x" data-rating="3"></span>
							<span class="fa fa-star-o fa-2x" data-rating="4"></span>
							<span class="fa fa-star-o fa-2x" data-rating="5"></span>
							<button type="submit" class="btn btn-dark" id="save_rate">Save your rate</button>
						</div>
			</div>
	</form>


<!-- <div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">
<h4>Rate this song</h4>
<button type="button" class="btn  btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<input type="hidden" class="form-control" id="rating" name="rating" value="1">
<input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
</div>
<div class="form-group">
<button type="submit" class="btn btn-dark" id="saveRate">Save Rate</button>
</div>
</form>
</div>
</div> -->



<?php
include ('includes/footer.php');
?>