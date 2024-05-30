<?php
include_once('./_common.php');

$g5['title'] = '엑셀파일로 게시글 일괄 등록';
include_once(G5_PATH.'/head.sub.php');
?>

<style>
.new_win h1{font-size: 1.17em; padding: 15px 20px; background: #fff; border-bottom: 1px solid #ddd;}
.local_desc01{padding: 10px 20px; border: 1px solid #f2f2f2; background: #f9f9f9; line-height:1.5em;}
#excelfile_upload{margin: 10px; padding: 20px; border: 1px solid #e9e9e9; background: #fff;}
#excelfile_upload label{font-weight: bold;}
.new_win .win_btn{clear: both; padding: 10px; text-align: center;}
.new_win .win_btn input{padding: 0 10px; height: 30px; line-height: 2em;}

.new_win .win_btn button{display: inline-block; padding: 0 10px; height: 30px; border: 0; line-height: 2em; cursor: pointer;}
.btn{border-radius:5px; font-weight: bold; font-size: 1.09em; vertical-align: middle;}

</style>

<div class="new_win">
    <h1><?php echo $g5['title']; ?></h1>

    <div class="local_desc01 local_desc">
        <p>
            엑셀파일을 이용하여 게시글을 일괄등록할 수 있습니다.<br>
            형식은 <strong>게시글일괄등록용 엑셀파일</strong>을 다운로드하여 게시글 정보를 입력하시면 됩니다.<br>
            수정 완료 후 엑셀파일을 업로드하시면 게시글이 일괄등록됩니다.<br>
            엑셀파일을 저장하실 때는 <strong>Excel 97 - 2003 통합문서 (*.xls)</strong> 로 저장하셔야 합니다.
        </p>

        <p>
            <a href="<?php echo G5_URL; ?>/<?php echo G5_LIB_DIR; ?>/Excel/boardexcel.xls"><strong style="color:red;">게시글일괄등록용 엑셀파일 다운로드</strong></a>
        </p>
    </div>

    <form name="fitemexcel" method="post" action="./boardexcelupdate2.php" enctype="MULTIPART/FORM-DATA" autocomplete="off">

    <div id="excelfile_upload">
        <label for="excelfile">파일선택</label>
        <input type="file" name="excelfile" id="excelfile">
    </div>

    <div class="win_btn btn_confirm">
        <input type="submit" value="게시글 엑셀파일 등록" class="btn_submit btn">
        <button type="button" onclick="window.close();" class="btn_close btn">닫기</button>
    </div>

    </form>

</div>

<?php
include_once(G5_PATH.'/tail.sub.php');