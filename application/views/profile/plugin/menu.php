<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?=base_url()?>" class="simple-text">
                    Auto Comment
                </a>
            </div>

            <ul class="nav">
                <li class="<?=$menu['index'] == true ?'active':''?>">
                    <a href="<?=base_url()?>profile">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?=$menu['pages'] == true ?'active':''?>">
                    <a href="<?=base_url()?>profile/pages">
                        <i class="ti-user"></i>
                        <p>Page Profile</p>
                    </a>
                </li>
                <li class="<?=$menu['speech'] == true ?'active':''?>">
                    <a href="<?=base_url()?>profile/speech">
                        <i class="ti-user"></i>
                        <p>Speech bundle</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=$page_name?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">
                                <i class="ti-user"></i>
                                <p>
                                    <?=$name?>
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>main/logout">
                                <i class="ti-power-off"></i>
                                <p>
                                    ออกจากระบบ
                                </p>
                            </a>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>