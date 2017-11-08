        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">คำตอบ</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <?php foreach ($data_speech as $key => $value): ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-5">
                                                <p><i class="fa fa-question-circle"></i> <b style="text-indent: 2.5em;"><?=htmlspecialchars($value['speech_ask'])?></b></p>
                                            </div>

											<div class="col-xs-5">
                                                <p><i class="fa fa-retweet"></i> <b style="text-indent: 2.5em;"><?=htmlspecialchars(urldecode($value['speech_reply']))?></b></p>
                                            </div>
											
                                            <div class="col-xs-2 text-right">
                                                <a href="<?=base_url()?>profile/speech/<?=htmlspecialchars(urldecode($value['speech_set']))?>?cmd=del_speech&speech_id=<?=$value['speech_id']?>" class="btn btn-sm btn-danger btn-icon"><i class="fa fa-trash"></i></a>
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