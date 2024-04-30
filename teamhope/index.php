<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head2.php');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<style>
	.swiper_wrap,
    .swiper_wraps {
      position: relative;
      height: 100%;
    }

    .swiper_wraps {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .mySwiper {
      width: 100%;
      height: 100%;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
	#main_wrap{
		width: 1280px;
		margin: 0 auto;
	}
	#main_wrap .title_wrap{
		display: flex;
		padding: 50px 0 150px 0;
		gap: 180px;
	}
	#main_wrap h1{
		font-size: 60px;
	}
	#main_wrap .title_wrap .sub_tit{
		margin-top:15px;
	}
	#main_wrap .title_wrap .sub_tit h4{
		font-size: 24px;
		margin-bottom: 35px;
	}
	#main_wrap .title_wrap .sub_tit span{
		font-size: 16px;
	}
	#main_wrap .content_sub{
		display: flex;
		gap:60px;
		padding: 45px 0 45px 0;
		border-bottom: solid 1px #ccc;
	}
	#main_wrap .content_sub .contents{
		width: 920px;
		padding: 20px 0 20px 0;
		position:relative;
	}
	#main_wrap .content_sub .contents h4{
		margin-bottom:35px;
		font-size: 22px;
	}
	#main_wrap .content_sub .contents span{
		font-size: 16px;
	}
	#main_wrap .content_sub .contents p{
		position:absolute;
		font-size: 16px;
	}
	#main_wrap .content_sub .contents .right_img{
		cursor: pointer;
		position:absolute;
		right:0;
	}
	#main_wrap .artists_tit{
		margin-top:150px;
	}
	#main_wrap .artists .artists_info{
		padding: 50px 0 200px 0;
		width: 400px;
	}
	#main_wrap .artists .artists_info .artists_name{
		text-align:center;
		margin-top: 30px;
	}
	#main_wrap .artists .artists_info .artists_name span{
		font-size: 20px;
	}

	/* 화살표 스타일 */
	.swiper-button-next, .swiper-button-prev {
	  color: #fff;
	  width: 50px;
	  height: 50px;
	  border-radius: 50%;
	  display: flex;
	  align-items: center;
	  justify-content: center;
		position: absolute;
	  top: calc(100% - 60px); /* 하단에 위치 */
	}

	.swiper-button-next::after, .swiper-button-prev::after {
	  font-size: 20px;
	}

	/* 페이지네이션 스타일 */
	.swiper-pagination-bullet {
	  background: #494949;
	  opacity: 1;
	}

	.swiper-pagination-bullet-active {
	  width: 20px;
	  border-radius: 10px;
	  background: #fff;
	}

	.swiper-button-prev {
	  left: 45%; /* 왼쪽 여백 */
	}

	.swiper-button-next {
	  right: 45%; /* 오른쪽 여백 */
	}

	/* 페이지네이션 스타일 */
	.swiper-pagination {
	  position: absolute;
	  bottom: 40px; /* 하단에 위치 */
	  left: 50%;
	}
	.swiper-horizontal>.swiper-pagination-bullets, .swiper-pagination-bullets.swiper-pagination-horizontal, .swiper-pagination-custom, .swiper-pagination-fraction {
		bottom: var(--swiper-pagination-bottom, 49px); 
		top: var(--swiper-pagination-top, auto);
		left: 50%;
		transform:translateX(-50%);
		width: auto;
	}
	.artists{display: flex; gap:40px;}
	    .contents a {
        color: black; /* 링크 색상 */
        text-decoration: none; /* 밑줄 제거 */
    }

    .contents a:hover {
        color: black; /* 마우스 오버 시 색상 */
    }
</style>

<div class="swiper_wrap">
  <div class="swiper_wraps">
    <div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
        <!-- 슬라이드 아이템 -->
        
        <!--
        <div class="swiper-slide"><img src="/images/swiper_img1.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/swiper_img2.png" alt=""></div>
		<div class="swiper-slide"><img src="/images/swiper_img1.png" alt=""></div>
        -->
       
        <!-- <div class="swiper-slide"><img src="/images/byun2.jpg" alt=""></div> -->
        <div class="swiper-slide"><img src="/images/byun3.jpg" alt=""></div>
		<div class="swiper-slide"><img src="/images/joo.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/ga.png" alt=""></div>
        
        
      </div>
      <!-- 네비게이션 버튼 -->
		  <div class="swiper-button-prev"></div>
		  <div class="swiper-button-next"></div>
		  <!-- 페이징 -->
		  <div class="swiper-pagination"></div>
    </div>
  </div>
</div>



<script>
  var swiper = new Swiper('.mySwiper', {
    // 기존 설정 유지
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    cssMode: true,
    keyboard: true,
    mousewheel: true,

    // 자동 재생 설정
    autoplay: {
      delay: 2000, 
      disableOnInteraction: false, 
    },
  });
</script>

	<?php 
		include_once('./include/include_menu.php');
	?>

<div id="main_wrap">

	<div class="title_wrap">
		<div class="tit">
			<h1>TEAMHOPE</h1>
		</div>
		<div class="sub_tit">
			<h4>TEAMHOPE는 희망을 꿈꾸는 사람들이 함께 합니다.</h4>
			<span>보이지 않는 것들은 희망으로 볼 수 있도록<br>그리고 보이는 것들은 희망으로 이끌 수 있도록<br>열의와 담대함으로 매순간 성장하는 <strong>TEAMHOPE</strong>와 함께해주세요.</span>
		</div>
	</div>

<?php
// g5_write_p53 테이블에서 가장 최근 3개의 데이터를 가져오는 쿼리
$sql = " SELECT * FROM `g5_write_media` ORDER BY wr_datetime DESC LIMIT 3 ";
$result = sql_query($sql);

// 데이터 출력
echo '<div class="content_wrap">
        <div class="content_tit">
            <h1>PR CENTER</h1>
        </div>';

while ($row = sql_fetch_array($result)) {
    // 해당 게시글에 첨부된 이미지 파일 정보 가져오기
    $file_sql = " SELECT * FROM `g5_board_file` WHERE bo_table = 'media' AND wr_id = '{$row['wr_id']}' AND bf_type BETWEEN '1' AND '3' LIMIT 1";
    $file_result = sql_query($file_sql);
    $file_row = sql_fetch_array($file_result);

    $image_path = '';
    if ($file_row) {
        $image_path = '/data/file/media/' . $file_row['bf_file']; // 이미지 파일 경로
    }

    // 글 내용을 100자로 제한
    $content = strip_tags($row['wr_content']); // HTML 태그 제거
    $summary_length = 180; // 표시할 문자 수
    $summary = mb_substr($content, 0, $summary_length, 'UTF-8'); // 문자열 자르기
    if(mb_strlen($content, 'UTF-8') > $summary_length) {
        $summary .= '...'; // 문자열이 제한 길이보다 길면 '...' 추가
    }

    // 개별 데이터와 이미지 출력
    echo '<div class="content_sub">
            <div class="content_img">
                <a href="/bbs/board.php?bo_table=media&wr_id='. $row['wr_id'] .'"><img src="'. $image_path .'" alt=""></a>
            </div>
            <div class="contents">
                <h4><a href="/bbs/board.php?bo_table=media&wr_id='. $row['wr_id'] .'">'. $row['wr_subject'] .'</a></h4>
                <span>'. $summary .'</span>
                <p>'. date('Y-m-d', strtotime($row['wr_datetime'])) .'</p>
            </div>
        </div>';
}

echo '</div>';
?>





<div class="artists_tit">
    <h1>ARTIST</h1>
</div>
<?php
// g5_write_p11 테이블에서 데이터 가져오기
$sql = "SELECT * FROM `g5_write_p11` ORDER BY wr_datetime DESC LIMIT 3";
$result = sql_query($sql);

// 데이터 출력
echo '<div class="artists">';

if ($result && sql_num_rows($result) > 0) {
    while ($row = sql_fetch_array($result)) {
        // 해당 게시글에 첨부된 이미지 파일 정보 가져오기
        $file_sql = "SELECT * FROM `g5_board_file` WHERE bo_table = 'p11' AND wr_id = '{$row['wr_id']}' AND bf_type BETWEEN '1' AND '3' LIMIT 1";
        $file_result = sql_query($file_sql);
        $file_row = sql_fetch_array($file_result);

        $image_path = '';
        if ($file_row) {
            $image_path = '/data/file/p11/' . $file_row['bf_file']; // 이미지 파일 경로
        }

        echo '<div class="artists_info">
                <div class="artists_img">
                    <a href="/bbs/board.php?bo_table=p11&wr_id='. $row['wr_id'] .'"><img src="'. $image_path .'" alt=""></a>
                </div>
                <div class="artists_name">
                    <span>'. $row['wr_subject'] .'</span>
                </div>
              </div>';
    }
} else {
    echo '<div class="artists_info">아티스트 정보가 없습니다.</div>';
}

echo '</div>';
?>
</div>	


<?php
include_once(G5_PATH.'/tail.php');