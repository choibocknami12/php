<header>
    <div class="header_container">
        <div class="header_nav bg-primary">
            <div class="header_img">
                <img src="../../view/img/cat_icon.png" alt="">
                <!-- 아래는 같은 경로이며 절대 경로 -->
                <!-- <img src="/view/img/cat_icon.png" alt=""> -->
                <span>nami's daily</span>
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