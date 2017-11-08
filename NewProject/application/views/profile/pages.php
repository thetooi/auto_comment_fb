        <div class="content">
            <div class="container-fluid">
                <div id="loadding" align="center">กำลังโหลดข้อมูล...</div>
                <div class="row" id="re_pages">
                   
                    <div class="col-lg-12" align="center"><div id="nextloadpage" class="btn btn-info" >โหลดข้อมูลเพจเพิ่ม</div></div>
                </div>

            </div>
        </div>

    <script type="text/javascript">
        var next;
        $(document).ready(function(){
            $('#nextloadpage').click(function () {
                getPages('<?=$this->session->user['access_token']?>',next);
            });

            getPages('<?=$this->session->user['access_token']?>','https://graph.facebook.com/me/accounts?limit=3&access_token=<?=$this->session->user['access_token']?>');
        });

        function getPages(token,url){
        // token_user = token;
        // $.getJSON("https://graph.facebook.com/me/accounts?limit=10&access_token="+token, actionGetPages);   

        $.ajax({
            url: "<?=base_url()?>profile/pages?cmd=loadpage&link="+encodeURIComponent(url),
            method: "GET",
            dataType: "json",
            
            beforeSend: function() {
                $('div#loadding').show();
                $.notify({
                    icon: 'ti-gift',
                    message: "<b>กำลังโหลดข้อมูลเพจ</b>"

                },{
                    type: 'info',
                    timer: 8000
                });
            }
        }).done(function( data ) {
            $('div#loadding').hide();
            if(data['status']===true){
                $('div#re_pages').prepend(data['str']);
                next = data['nextpage'];
            }else{
                $.notify({
                        icon: 'ti-gift',
                        message: "<b>ไม่สำเร็จกรุณาลองใหม่อีกครั้ง</b>"

                },{
                    type: 'danger',
                    timer: 3000
                });
            }
            
        });
     
    }

    // function actionGetPages(result) {
    //     $.each(result['data'], function(i, field){
    //         $.getJSON("https://graph.facebook.com/me/?access_token="+field['access_token'], actionGetMe);
    //         $.getJSON("https://graph.facebook.com/me/albums?access_token="+field['access_token'], actionGetAlbums);
               
    //         $('div#re_pages').html(meID);
    //     });
    // }
    
    // function actionGetMe(result) {
        

    //     meID = result['id'];
    //     meName = result['name'];
    //     meLike = result['likes'];
    //     meUsername = result['username'];    

    // }

    // function actionGetAlbums(result) {
    //     $.each(result['data'], function(i2, field2){
    //         if(field2['type'] == "cover") {
    //             $.getJSON("https://graph.facebook.com/"+field2['id']+"/photos?access_token="+token_user, actionGetPhotos);
    //         }
    //     });
    // }

    // function actionGetPhotos(result) {
    //     id_cover = result['data'][0]['id']; 
    // }

    </script>


        
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, by <a href="https://fastwork.co/user/progame69">YongYongCode</a>
                </div>
            </div>
        </footer>

    </div>