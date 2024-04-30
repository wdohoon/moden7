<?php
include_once('./_common.php');
?>
<style>
    .quick {
        position: fixed;
        bottom: 50%;
        right: 20px;
        z-index: 999;
    }

    .quick .imgs {
        display: flex;
        flex-direction: column;
        gap: 30px; 
    }

    .quick .imgs a {
        display: block;
        width: 40px;
        height: 40px; 
    }
	.quick .imgs a img{
		width: 100%;
		height: 100%;
	}
</style>

<div class="quick">
    <div class="imgs">
        <a href="https://www.youtube.com/@TEAMHOPE_ent" target="_blank"><img src="/images/youtubes.png" alt=""></a>
        <a href="https://www.instagram.com/teamhope_ent" target="_blank"><img src="/images/instars.png" alt=""></a>
    </div>
</div>
