<header>
    <div class="header_container">
        <div class="header_nav bg-primary">
            <div class="header_img">
                <div>
                    <img src="../../view/img/cat_icon.png" alt="">
                </div>
                <!-- 아래는 같은 경로이며 절대 경로 -->
                <!-- <img src="/view/img/cat_icon.png" alt=""> -->
                <div>
                    <span>nami's daily</span>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    게시판
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <?php
                                        foreach($this->arrBoardNameInfo as $item) {
                                    ?>
                                    
                                    <li>
                                        <a class="dropdown-item" href="/board/list?b_type=<?php echo $item["b_type"] ?>">
                                            <?php echo $item["b_name"] ?>
                                        </a>
                                    </li>
                                    
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            
            <?php if($this->controllerChkUrl === "user/login") { ?>
                <div class="header_login_btn">
                    <div class="header_login_btn_user">
                        <button class="btn btn-outline-light" href="">login</button>
                    </div>
                    <div class="header_login_btn_regist">
                        <a class="btn btn-outline-light" role="button" href="/user/regist">regist</a>
                    </div>
                </div>
            <?php } ?>
            <?php if($this->controllerChkUrl !== "user/login" && $this->controllerChkUrl !== "user/regist") { ?>
                <div class="header_login_btn">
                    <div class="header_login_btn_regist">
                        <a class="btn btn-outline-light" role="button" href="/user/logout">logout</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</header>