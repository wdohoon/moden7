<?php
	include('./_common.php');
	include(G5_PATH."/head_mission.php");
	
?>
	
	<!-- <header>
		<div class="left">
			<a href="#" class="prev"></a>
		</div>
		<h2 class="shop"><span>MISSION FUNDING</span></h2>
	</header> -->
	<form action="/bbs/board.php" method="get" onsubmit="return gos()">
		<input type="hidden" value="mission" name="bo_table">	
		<div class="shop-search">
			<input type="text" class="inp-srch" name="stx" placeholder="검색어를 입력해 주세요.">
		</div>
	</form>
	
	<div class="search-result">
		<div class="head">
			<strong>최근검색어</strong>
			<a href="#">전체삭제</a>
		</div>
		<div class="body">
			<ul>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
				<li>
					<a href="#" class="key">미션펀딩</a>
					<button>X</button>
				</li>
			</ul>
		</div>
	</div>
	
	
	
	<script>
		function gos(){
			//return false;
			var vals = $(".inp-srch").val();
			
			if(!vals){
				alert('검색어를 입력해주세요');
				return false;
			}else{
				return true;
			}

			
		
		
		}
	</script>
	
	
	
<?php include(G5_PATH."/tail.php");?>
