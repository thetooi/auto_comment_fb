        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <span><b>Page : <?=urldecode(urldecode($this->uri->segment(5)))?></b></span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>    
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input type="text" class="form-control border-input" id="token_ment" name="token_ment" autocomplete="off" autofocus="" placeholder="EAACEdEose0cBANeijcaVZAf498DMn8wfQ3Jg4RIlZByCUFtwSNzAdSfYSRZBZAorI5AK..." value="">
                                            </div>
                                             <div class="col-md-3">
                                                <div class="pull-right">
                                                    <a class="btn btn-sm btn-warning btn-icon" href="https://developers.facebook.com/tools/explorer/145634995501895/" target="_blank">รับโทเคน</a>
                                                    <div class="btn btn-sm btn-success btn-icon" onclick="worker('<?=base_url()?>work/<?=urldecode($this->uri->segment(2))?>/<?=urldecode($this->uri->segment(3))?>/');">เริ่มทำงาน</div>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">รายการโพสต์ที่ต้องการดำเนินงาน</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
                                    <li>
                                        <div class="row">
                                            <form action="<?=base_url()?><?=urldecode($this->uri->segment(1))?>/<?=urldecode($this->uri->segment(2))?>/<?=urldecode($this->uri->segment(3))?>/<?=urldecode($this->uri->segment(4))?>/<?=$this->uri->segment(5)?>/?action=add_post" method="POST">
                                                <div class="col-xs-10">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control border-input" name="idpost" required="" autocomplete="off" placeholder="ไอดีโพสต์">
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control border-input" name="speech_set" id="speech_set">
                                                            <?php foreach ($data_speech as $key => $value): ?>
                                                                <option value="<?=$value['speech_set']?>"><?=htmlspecialchars($value['speech_set'])?> (<?=$value['COUNT(speech_set)']?> รายการ)</option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col-xs-2 text-right">
                                                    <button class="btn btn-sm btn-success btn-icon" type="submit"><i class="fa fa-save"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                    <?=$feeds_post->num_rows() == 0 ? '<li><div class="row" align="center">ไม่พบข้อมูล</div></li>' : ''?>
                                    <?php $ii=0; ?>
                                    <?php foreach ($feeds_post->result_array() as $key => $value): ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <?=++$ii?>. <a target="_blank" href="https://www.facebook.com/<?=$value['post_fbid']?>"><?=$value['post_fbid']?></a> - <?=$value['speech_set']?>
                                            </div>

                                            <div class="col-xs-2 text-right">
                                                <a class="btn btn-sm btn-danger btn-icon" href="<?=base_url()?><?=urldecode($this->uri->segment(1))?>/<?=urldecode($this->uri->segment(2))?>/<?=urldecode($this->uri->segment(3))?>/<?=urldecode($this->uri->segment(4))?>/<?=$this->uri->segment(5)?>/?action=del_post&post_id=<?=$value['post_id']?>"><i class="fa fa-trash"></i></a>
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