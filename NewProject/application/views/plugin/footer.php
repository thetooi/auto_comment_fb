</body>

    <!--   Core JS Files   -->
	<script src="<?=base_url()?>template/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?=base_url()?>template/assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?=base_url()?>template/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?=base_url()?>template/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?=base_url()?>template/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?=base_url()?>template/assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){
        
        	demo.initChartist();


        	// $.notify({
         //    	icon: 'ti-gift',
         //    	message: "ยินดีต้อนรับ <b>Comment AUTO</b>"

         //    },{
         //        type: 'success',
         //        timer: 1000
         //    });

    	});
	</script>
    
<script type="text/javascript">
    function _login(){
        $('#cut_token').val('')
        var email= $('#email').val();
        var password= $('#password').val();

        $.post("<?=base_url()?>main/getFormLogin",
        {
            email: email,
            password: password
        },
        function(data, status){
            $('div#re').html(data);
            $('div#login').show();
        });
    }

    function login(){

        $.ajax({
            url: "<?=base_url()?>main/login",
            method: "POST",
            data: { 
                token : $('#cut_token').val()
            },
            dataType: "json",
            
            beforeSend: function() {
                $.notify({
                    icon: 'ti-gift',
                    message: "<b>รอสักครู่</b>"

                },{
                    type: 'warning',
                    timer: 1000
                });
                $('#cut_token').prop('disabled', true);
            }
        }).done(function( data ) {
            if(data['status']===true) window.location="<?=base_url('profile')?>";
            else{
                $.notify({
                        icon: 'ti-gift',
                        message: "<b>ไม่สำเร็จกรุณาลองใหม่อีกครั้ง</b>"

                },{
                    type: 'danger',
                    timer: 3000
                });
                $('#cut_token').prop('disabled', false);
            }
            
        });

    }

    function worker(url) {
        var _url = url+$('#token_ment').val();
        window.open(_url, 'newwindow', 'width=500,height=400');
        return false;
    }

</script>
</html>
