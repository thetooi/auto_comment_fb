        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">ชุดคำตอบ</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>
                                        <div class="row">
                                            <form action="<?=base_url()?>profile/speech?cmd=add_speech" method="POST">
                                                <div class="col-xs-10">
                                                    <input type="text" class="form-control border-input" id="speech_set" name="speech_set" required="" autocomplete="off" autofocus="" placeholder="ชื่อชุด ตั้งชื่อชุดใหม่ หรือสามารถใช้ชื่อเดิมที่มีอยู่ได้" value="">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control border-input" name="ask" required="" autocomplete="off" placeholder="คำถาม" value="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <textarea rows="3" class="form-control border-input" name="reply" required="" autocomplete="off" placeholder="คำตอบ"></textarea>
                                                    </div>
                                                </div>
                                              
                                                <div class="col-xs-2 text-right">
                                                    <button class="btn btn-sm btn-success btn-icon" type="submit"><i class="fa fa-save"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                    <?php foreach ($data_speech as $key => $value): ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <p><i class="fa fa-folder"></i> <b style="text-indent: 2.5em;"><?=htmlspecialchars($value['speech_set'])?></b> (<?=$value['COUNT(speech_set)']?> รายการ)</p>
                                            </div>

                                            <div class="col-xs-2 text-right">
                                                <a href="<?=base_url()?>profile/speech/<?=urlencode($value['speech_set'])?>" class="btn btn-sm btn-info btn-icon"><i class="fa fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                	


                </div>
            </div>
        </div>


        
        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, by <a href="https://fastwork.co/user/progame69">YongYongCode</a>
                </div>
            </div>
        </footer>

    </div>