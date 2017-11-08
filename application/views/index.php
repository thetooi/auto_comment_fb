<div class="wrapper">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="space-top"></div>
		        <div class="tim-container" style="min-height: 2000px;">
					<div class="tim-row">
						<h2 class="text-center">เข้าสู่ระบบ เพื่อใช้งาน</h2>
						<legend></legend>
						<p>
							<b>Login Facebook เพื่อรับ Token เข้าใช้งาน</b><br>
							<span style="color:red;">หมายเหตุ: ไม่มีการเก็บรหัสผ่านใด ๆ ของคุณไว้ คุณเชื่อมต่อกับ Facebook โดยตรงเพื่อสร้าง Token การเข้าถึงของคุณเพื่อให้บัญชีของคุณปลอดภัย! 100%</span>
		
							<form id="form-login" class="form-login">
								<input type="hidden" name="credentials_type" value="password" id="credentials_type">
								<b>อีเมล หรือ เบอร์โทร ที่ใช้เข้าใช้งาน Facebook</b> <input type="text" class="form-control border-input" name="email" placeholder="Email, phone or usename" value="" id="email">
								<input type="hidden" name="format" value="JSON" id="format">
								<input type="hidden" name="generate_machine_id" value="1" id="generate_machine_id">
								<input type="hidden" name="generate_session_cookies" value="1" id="generate_session_cookies">
								<input type="hidden" name="locale" value="en_US" id="locale">
								<input type="hidden" name="method" value="auth.login" id="method">
								<b>รหัสผ่าน</b> <input type="password" class="form-control border-input" name="password" placeholder="password" value="" id="password">
								<input type="hidden" name="return_ssl_resources" value="0" id="return_ssl_resources">
								<input type="hidden" name="v" value="1.0" id="v">
								<br>
								<input type="button" class="btn btn-info" id="clickme" onclick="_login()" value="ยืนยัน"/>
								<div id="re"></div>
								<div id="login" style="display: none;">
									<p>
										<b>วางข้อความลงที่นี่</b>
										<form id="formlogintoken">
											<textarea type="text" id="cut_token" name="cut_token" class="form-control border-input" placeholder="ลิ้งค์ที่ได้จะเป็นแบบนี้ : {'session_key':'5.bTOZIrj09WOTmA.1496753639.1-1000044','uid':1000044..." rows="5" autocomplete="on" required=""></textarea>		
											<input type="button" class="btn btn-info" onclick="login()" value="เข้าสู่ระบบ"/>
										</form>
									</p>
								</div>
							</form>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>