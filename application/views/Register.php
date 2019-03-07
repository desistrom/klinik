<html>
<head>
<meta charset="utf-8">
<title>POS - Point Of Sale</title>
<link href="<?php echo base_url().'assets/' ?>Register_style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script>
	function myFunction()
		{
			alert("Thanks for Register");
		}
</script>
</head>
 
<body>
	<div class="main">
		<div class="user">
			<img src="<?php echo base_url().'assets/img/' ?>user.png" alt="">
		</div>
		<div class="login">
                    <span class="register"><label>MEMBUAT AKUN</label></span>
			<div class="inset">				
					<?php echo form_open('Register/signup'); ?>
			         <div>
						<span><label>nama</label></span>
                                                <span><input type="text" name="nama" class="textbox" required></span>
					 </div>
                                          <div>
						<span><label>Username</label></span>
                                                <span><input type="text" name="username" class="textbox" required></span>
					 </div>
					 <div>
						<span><label>Password</label></span>
					    <span><input type="password" name="password" class="password" required></span>
					 </div>
                                                <span><label>No. KTP</label></span>
                                                <span><input type="text" name="ktp" class="textboxt" required></span>
					 </div>                           
					<div class="sign">
						<div class="submit">
						  <input type="submit" name="submit" onclick="myFunction()" value="SIGN UP" >
						</div>
							<div class="clear"> </div>
					</div>
					</form>
                                        
				</div>
			</div>
		
		</div>
                                        
				
	 
</body>
</html>