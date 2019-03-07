<html>
<head>
<meta charset="utf-8">
<title>POS - Point Of Sale</title>
<link href="<?php echo base_url().'assets/' ?>login_style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<!--<script>
	function myFunction()
		{
			alert("Thanks for login");
		}
</script>-->
</head>
 
<body>
	<div class="main">
		<div class="user">
			<img src="<?php echo base_url().'assets/img/' ?>user.png" alt="">
		</div>
		<div class="login">
			<div class="inset">				
					<?php echo form_open('Auth/resetpass'); ?>
                                        <div>
						<span><label>No.KTP</label></span>
						<span><input type="text" name="ktp" class="textbox" id="active"></span>
					 </div>
                                         <div>
						<span><label>Password Baru</label></span>
						<span><input type="password" name="passnew" class="textbox" id="active"></span>
					 </div>
                                         <div>
						<span><label>Konfirmasi Password Baru</label></span>
						<span><input type="password" name="passnew2" class="textbox" id="active"></span>
					 </div>
                                         <div>
						<span><label>Jawab Perhitungan</label></span>
						
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" name="var1" class="textbox" value="<?php echo $var1?>" id="active">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" name="var2" class="textbox" value="<?php echo $var2?>" id="active">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" name="jawaban" class="textbox" id="active">
                                                        </div>
                                                    </div>
                                                
                                                
					 </div>
					 
					<div class="sign">
						<div class="submit">
						  <input type="submit" name="submit" onclick="myFunction()" value="Reset Password" >
						</div>
						
					</div>
					</form>
                                        
				</div>
			</div>
		
		</div>                                        
		 
   					<div class="copy-right">
                                            <p>Belum punya akun?? <a href="<?php echo site_url().'/Register'?>">Sign up</a></p>
                                        </div>
				
	 
</body>
</html>