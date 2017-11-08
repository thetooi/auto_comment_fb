        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-announcement"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>จำนวนโพสต์</p>
                                            <?=number_format($count_post)?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> ปัจจุบัน
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-comment-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>คอมเมนต์ที่ทำงานแล้ว</p>
                                            <?=number_format($count_comment)?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> ปัจจุบัน
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><i class="ti-announcement"></i> รายการโพสต์</h4>
                                <p class="category">20 รายการล่าสุด</p>
                            </div>
                            <div class="content">
                                <ul>
                                    <?php if($count_post == 0): ?>
                                        <li><a href="#"><span class="pull-center">ไม่พบข้อมูล!!</span></a></li>
                                    <?php else: ?>
                                        <?php foreach ($feeds_post->result_array() as $key => $value): ?>
                                            <li><a href="https://www.facebook.com/<?=$value['post_fbid']?>" target="_blank"><?=$value['post_fbid']?><span class="pull-right"><?=$value['post_datetime']?></span></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> ล่าสุดเมื่อ <?=$count_post == 0 ? date('Y-m-d H:i:s',time()): $feeds_post->result_array()[0]['post_datetime']?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title"><i class="ti-comment-alt"></i> รายการคอมเมนต์</h4>
                                <p class="category">20 รายการล่าสุด</p>
                            </div>
                            <div class="content">
                                <ul>
                                    <?php if($count_comment == 0): ?>
                                        <li><a href="#"><span class="pull-center">ไม่พบข้อมูล!!</span></a></li>
                                    <?php else: ?>
                                        <?php foreach ($feeds_comment->result_array() as $key => $value): ?>
                                            <li><a href="https://www.facebook.com/<?=$value['logs_idcomment']?>" target="_blank"><?=$value['logs_idcomment']?><span class="pull-right"><?=$value['logs_datetime']?></span></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> ล่าสุดเมื่อ <?=$count_comment == 0 ? date('Y-m-d H:i:s',time()): $feeds_comment->result_array()[0]['logs_datetime']?>
                                    </div>
                                </div>
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
</div>
