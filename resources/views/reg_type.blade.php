<!DOCTYPE html>
<html>
<head>
	<title>Restaurent Portal</title>
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- JS, Popper.js, and jQuery -->
    
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script
  src="http://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
</head>

<header>
	<div>
	<nav class="navbar navbar-light justify-content-center" style="background-color: grey;">
         <ul class="nav nav-pills">
         <li class="nav-item">
             <a style="color: white;" class="nav-link" href="http://127.0.0.1:8000/restaurant">Home</a>
         </li>
         <li class="nav-item">
            <a style="color: white;" class="nav-link" href="">Login</a>
         <li class="nav-item">
            <a style="color: white;" class="nav-link active" href="http://127.0.0.1:8000/reg_type">Registration</a>
         </li>
         </ul>
    </nav>
   </div>
</header>

<body>
	<div style="margin-top: 200px; margin-left: 500px;">
        <h3 style="margin-left:50px;"><b>REGISTER BELOW</b></h3>
         <button style="margin-top: 50px;" class="btn btn-primary" id="customer_reg">For Customer</button>&nbsp;&nbsp;<button style="margin-top: 50px;" class="btn btn-primary" id="owner_reg">For Restaurant Owner</button>
	</div>
    <div id="customer"></div>
    <div id="owner"></div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#customer_reg").click(function(){
            $.ajax({
                url: "user_registration",
                success: function (result){
                     $("#customer").html(result);
                } 
            });

            });
        $("#owner_reg").click(function(){
            $.ajax({
                url: "restaurent_owner_reg",
                success: function (res){
                     $("#owner").html(res);
                } 
            });

            });

        });
</script>

</body>

<!-- <footer>
	 <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#!">Food</a>
  </div>
</footer> -->

</html>