<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"E:\WWW\blog\public/../application/index\view\login\index.html";i:1483783808;s:61:"E:\WWW\blog\public/../application/index\view\common\foot.html";i:1483612292;}*/ ?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link href="__PUBLIC__/style/loginstyle.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<!--//webfonts-->
</head>
<body>
	<div class="main">
		<div class="header" >
        <h1><?php echo $website['stitle']; ?></h1>
			<content>登录或创建一个免费帐户！</content>
		</div>
		<p></p>
			<form  action="__ROOT__/login/res" method="post">
				<ul class="left-form">
					<h2>新账户:</h2>
					<li>
						<input type="text"  name="username" placeholder="Username" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text" name="Email"  placeholder="Email" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"  name="photho" placeholder="photho" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"  name="dizhi" placeholder="地址" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 

					<li>
						<input type="password" name="password"  placeholder="password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="password"  placeholder="password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 

					<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Please inform me of upcoming w3layouts, Promotions and news</label>
					<input type="submit" onClick="myFunction()" value="创建账户">
						<div class="clear"> </div>
				</ul>
               </form> <form action="__ROOT__/login/login" method="post">
				<ul class="right-form">
					<h3>登录:</h3>
					<div>
						<li><input type="text" name="username" placeholder="Username" required/></li>
						<li> <input type="password" name="password" placeholder="Password" required/></li>
						<div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写下面的验证码" />
                           <img src="<?php echo captcha_src(); ?>" alt="captcha" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">  
                                                   
                        </div>
                    </div>
						<h4>I forgot my Password!</h4>
							<input type="submit" onClick="myFunction()" value="登录" >
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
			
		</div>
			<!-----start-copyright---->
   					<div class="copy-right">
						
         
    <!--content end-->
    <!--footer start-->
     <div id="footer">
     <p><?php echo $website['scopyright']; ?></p>
    </div>
    <!--footer end-->
   


					</div>
				<!-----//end-copyright---->

	
</body>
</html>