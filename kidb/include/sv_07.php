<?php
include_once('./_common.php');


?>
<style>
	.who_bg{
		background: url('../images/sub_bg_visual2.jpg') no-repeat center center/cover;
		height: 600px;
		animation-name : fade;
		animation-duration : 10s;
	}
	@keyframes fade {
	 from {
		background-size: 200%;
	  }

	  to {
		background-size: 250%;
	  }
	}
	.who_bg img{
		position: absolute;
		top: 160px;
		left: 760px;
		opacity: 0.2;
		width: 860px;
		height: 260px;
	}
	.who_bg .who_box{
		position: relative;
		width: 320px;
		height: 130px;
		background: #002e6c;
		color: #fff;
		padding: 30px;
		top: 160px;
		left: 260px;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		
	}
	.who_bg .who_box p a{
		color: #fff;
		font-size: 13px;
		word-break: break-word;
	}
	.who_bg .who_box span{
		position:relative;
		top:0;
		font-size: 25px;
		font-weight: bold;
		text-align:center;
	}
	.who_bg .who_box p{
		position:relative;
	}
	.who_box span,
	.who_box p{
		line-height: 1 !important;
	}
	.who_bg .who_box span{
/* 		<?php
		if ($bo_table == 'archive') {
			echo "font-size: 44px";
		} else {
			echo "font-size: 25px";
		}
		?> */
	}
	@media (max-width: 1900px) {
		.who_bg img{
			top: 8.4vw;
			left: 40.0vw;
			opacity: 0.2;
			width: 45.3vw;
			height: 13.7vw;
		}
	}
	@media (max-width: 1400px) {
		.who_bg{
			height: 31.25vw;
		}
		.who_bg .who_box{
			width: 16.67vw;
			height: 16.67vw;
			padding: 2.60vw;
			top: 10.33vw;
			left: 8.6vw;
		}
		.who_bg .who_box p a{
			font-size: 0.78vw;
		}
		.who_bg .who_box span{
			top:1.04vw;
			font-size: 2.79vw;
		}
		.who_bg .who_box p{
			display: flex;
			gap: 1px;	
			align-items: center;
		}
	}
	@media (max-width: 1024px) {
		.who_bg .who_box{
			display: none;
		}
	}

</style>
<div class="who_bg">
	<img src="../img/who_head.png" alt="">
	<div class="who_box">
		<span><?php echo $sv_tit;?></span>
		<p><a href="index.php">Home</a> - <a href="<?php echo $sv_links;?>"></a> <a href="<?php echo $sv_link;?>"><?php echo $sv_title;?></a></p>
	</div>	
</div>