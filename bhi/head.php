

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_header');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<style>
header { background: #2D2D2F;  height: 84px; z-index: 999;  position: relative;}
header .header_container { display: flex;  padding: 0 5vw; height: 84px; align-items: center; justify-content: space-between;}
header .header_container img {  padding: 8px 0;}
header .header_container ul { display: flex; padding: 0 9vw; align-items: center; justify-content: space-around; flex-grow: 1;}
header .header_container ul li a {color: #fff;  font-size: 18px; font-weight: 600; line-height: 26px;text-align: left;}
header .header_container .login ul { gap: 24px;   padding: 0;}
header .header_container .login ul li a { font-size: 14px; font-weight: 400; line-height: 20px;text-align: left;}
.hamburger {display: none;flex-direction: column;cursor: pointer;padding: 8px; position: absolute; right: 3vw;}
.hamburger div {width: 35px;height: 3px;background-color: #fff;margin: 3px 0;}
.transfer-inquiry{display: none;}
@media screen and (max-width: 1024px) {
    header .header_container .menu,
    header .header_container .login {display: none;}
    .hamburger {display: flex;z-index:1000;}
    .menu-opened header .header_container .menu {display: flex;flex-direction: column;color: #fff;width: 100%;padding: 50px 0 80px;position: absolute; right: 0; top: 84px; background: #2D2D2F;}
    .menu-opened header .header_container ul li,
    .menu-opened header .header_container .login ul li {margin: 10px 0;text-align: center;}
    .menu-opened header .header_container .login{display: flex;flex-direction: column;color: #fff;position: absolute;top: 430px;background: #2D2D2F;width: 90%;}
    .transfer-inquiry {display: block;}
}

</style>


<header>
    <div class="header_container">
        <a href="/"><img src="/img/head_logo.png" alt=""></a>
        <div class="hamburger" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <ul class="menu">
            <li><a href="/send.php">G-POINT 구매</a></li>
            <li><a href="/sellwonia.php">G-POINT 판매</a></li>
            <li><a href="/bbs/write.php?bo_table=inquiry">온라인문의</a></li>
            <li><a href="/my_wallet.php">지갑</a></li>
            <li><a href="/coinswap.php">G-POINT SWAP신청</a></li>
            <li class="transfer-inquiry"><a href="/bbs/write.php?bo_table=transfer">이체 문의</a></li>
            <li><a href=""><img src="/img/header_tell.png" alt=""></a></li>
        </ul>
        <div class="login">
            <ul>
                <?php if ($is_member) { ?>
                    <li><a href="/mypage.php">마이페이지</a></li>
                    <li><a href="<?php echo G5_BBS_URL; ?>/logout.php">로그아웃</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo G5_BBS_URL; ?>/login.php">로그인</a></li>
                    <li><a href="<?php echo G5_BBS_URL; ?>/register.php">회원가입</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>




<script>
function toggleMenu() {
    document.body.classList.toggle('menu-opened');
}
</script>




