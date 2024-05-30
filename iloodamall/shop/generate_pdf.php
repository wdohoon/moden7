<?php
ob_start();
require 'tfpdf/tfpdf.php'; // tFPDF 라이브러리 포함

if (!isset($_GET['od_id'])) {
    exit; // od_id 파라미터가 없으면 스크립트 종료
}

$od_id = $_GET['od_id']; // 주문 ID 가져오기

// 데이터베이스 연결 및 주문 정보 조회
// $conn = ...; // 데이터베이스 연결 설정
$sql = "SELECT * FROM g5_shop_order WHERE od_id = '$od_id'";
$result = @mysqli_query($conn, $sql);
$order = @mysqli_fetch_assoc($result);

class PDF extends tFPDF {
    function Header() {
        $this->AddFont('NanumGothic','','NanumGothic.ttf',true);
        $this->SetFont('NanumGothic', '', 14);
        $this->Cell(0, 10, '거래명세표', 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('NanumGothic', '', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// 주문 정보
$pdf->SetFont('NanumGothic', '', 12);
$pdf->Cell(30, 10, '주문서번호: ' . $od_id);
$pdf->Ln(10);

//제목
$pdf->Cell(150, 20, '거래명세표' ,1);
$pdf->Cell(20, 10, '권' ,1);
$pdf->Cell(20, 10, '호' ,1);
$pdf->Ln(10);
$pdf->Cell(150, 40, ' ' );
$pdf->Cell(20, 10, '' ,1);
$pdf->Cell(20, 10, '' ,1);
$pdf->Ln(10);

// 고객 정보
$pdf->Cell(70, 10, '날짜 ',1);
$pdf->Cell(10, 70, '공급' ,1);
$pdf->Cell(20, 10, '등록번호' ,1);
$pdf->Cell(90, 10, '123-86-07799' ,1);
$pdf->Ln(10);

$pdf->Cell(70, 10, '고객명 귀하 ' . $order['od_name'],1);
$pdf->Cell(10, 10, ' ' );
$pdf->Cell(20, 20, '상호' ,1);
$pdf->Cell(40, 20, '(주)이루다' ,1);
$pdf->Cell(20, 20, '성명' ,1);
$pdf->Cell(30, 20, '김용한' ,1);
$pdf->Ln(10);

$pdf->Cell(70, 50, ' 합계금액' ,1);
$pdf->Cell(10, 10, ' ' );
$pdf->Ln(10);

$pdf->Cell(80, 40, ' ' );
$pdf->Cell(20, 20, '소재지' ,1);
$pdf->Cell(90, 20, '경기도 안양시 만안구 덕천로 152번길' ,1);
$pdf->Ln(20);

$pdf->Cell(80, 40, ' ' );
$pdf->Cell(20, 10, '업태' ,1);
$pdf->Cell(40, 10, '~~~' ,1);
$pdf->Cell(20, 10, '종목' ,1);
$pdf->Cell(30, 10, '~~~' ,1);
$pdf->Ln(10);

$pdf->Cell(80, 40, ' ' );
$pdf->Cell(20, 10, '전화번호' ,1);
$pdf->Cell(40, 10, '010-1234-5678' ,1);
$pdf->Cell(20, 10, '팩스' ,1);
$pdf->Cell(30, 10, '' ,1);
$pdf->Ln(10);

//월일
$pdf->Cell(10, 10, '월' ,1);
$pdf->Cell(10, 10, '일' ,1);
$pdf->Cell(70, 10, '품목 / 규격' ,1);
$pdf->Cell(10, 10, '단위' ,1);
$pdf->Cell(10, 10, '수량' ,1);
$pdf->Cell(20, 10, '단가' ,1);
$pdf->Cell(30, 10, '공급가액' ,1);
$pdf->Cell(30, 10, '세액' ,1);
$pdf->Ln(10);

// 데이터
$pdf->Cell(10, 10, '월' ,1);
$pdf->Cell(10, 10, '일' ,1);
$pdf->Cell(70, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(20, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Ln(10);

$pdf->Cell(10, 10, '월' ,1);
$pdf->Cell(10, 10, '일' ,1);
$pdf->Cell(70, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(20, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Ln(10);

$pdf->Cell(10, 10, '월' ,1);
$pdf->Cell(10, 10, '일' ,1);
$pdf->Cell(70, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(10, 10, '', 1);
$pdf->Cell(20, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Cell(30, 10, '', 1);
$pdf->Ln(10);

//소계
$pdf->Cell(110, 10, '소계', 1);
$pdf->Cell(40, 10, '금액', 1);
$pdf->Cell(40, 10, '세액', 1);
$pdf->Ln(10);

// 합계
$pdf->Cell(20, 10, '미수금', 1);
$pdf->Cell(40, 10, '', 1);
$pdf->Cell(20, 10, '합계', 1);
$pdf->Cell(40, 10, '합계금액', 1);
$pdf->Cell(30, 10, '인수자', 1);
$pdf->Cell(40, 10, '고나영', 1);
$pdf->Ln(10);

// 합계
$pdf->Cell(0, 10, '합계금액: ' . $order['od_total_price']);

$pdf->Output();
ob_end_flush();
?>

