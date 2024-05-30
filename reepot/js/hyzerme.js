(() => {
	if (typeof NodeList.prototype.forEach !== 'function')  {
		NodeList.prototype.forEach = Array.prototype.forEach;
	}
	const deviceWidth= window.innerWidth;
	const navHeight = document.querySelector('.global-head').offsetHeight;
	const tabHeight = document.querySelector('.brand-tab').offsetHeight;
	const mobileWidth	= 767;
	let yOffset = 0;
	let prevScrollHeight = 0;
	let currentScene = 0;
	let enterNewScene = false;
	let acc = 0.2;
	let delayedYOffset = 0;
	let rafId;
	let rafState;
	let deviceType;


	function loop() {
		delayedYOffset = delayedYOffset + (yOffset - delayedYOffset) * acc;

        if (delayedYOffset < 1) {
            scrollLoop();
        }

        if ((document.body.offsetHeight - window.innerHeight) - delayedYOffset < 1) {
            let tempYOffset = yOffset;
            scrollTo(0, tempYOffset - 1);
        }

		rafId = requestAnimationFrame(loop);

		if (Math.abs(yOffset - delayedYOffset) < 1) {
			cancelAnimationFrame(rafId);
			rafState = false;
		}
	}

	function tabUI(wrap){
		const tabItems		=	wrap.querySelectorAll('.tab > li');
		const tabPanelImgs	=	wrap.querySelectorAll('.tab-img > div');
		const tabPanelTxts	=	wrap.querySelectorAll('.tap-txt > div');
		const imgWrap		=	wrap.querySelector('.tab-img');
		const txtWrap		=	wrap.querySelector('.tap-txt');

		function activate(target) { 
			const name = target.getAttribute('aria-controls');  
			
			Array.from(tabItems).forEach(v => v.classList.remove('active'));  
			Array.from(imgWrap.children).forEach(v => v.classList.remove('active')); 
			imgWrap.querySelector(`.tab-panel[aria-id=${name}]`).classList.add('active');  
			target.classList.add('active');

			if(txtWrap){
				Array.from(txtWrap.children).forEach(v => v.classList.remove('active')); 
				txtWrap.querySelector(`.tab-panel[aria-id=${name}]`).classList.add('active');  
			}
		}

		tabItems.forEach(tabItem => {		//모든탭에 클릭 이벤트 주기
			tabItem.addEventListener('click', () => {
				activate(tabItem); 
			});
		})
	}

	window.addEventListener('load', () => {
        document.body.classList.remove('before-load');
		setLayout();

        let tempYOffset = yOffset;
        let tempScrollCount = 0;
        if (tempYOffset > 0) {
            let siId = setInterval(() => {
                scrollTo(0, tempYOffset);
                tempYOffset += 5;

                if (tempScrollCount > 20) {
                    clearInterval(siId);
                }
                tempScrollCount++;
            }, 20);
        }

		window.addEventListener('scroll', () => {
			yOffset = window.pageYOffset  - navHeight - tabHeight;
			//브랜드 탭
			scrollLoop();

			if (!rafState) {
				rafId = requestAnimationFrame(loop);
				rafState = true;
			}
		});

  		window.addEventListener('resize', () => {
			const currentWidth = window.innerWidth;
			const distance = Math.abs(currentWidth - deviceWidth);
			if( distance > 50)
			{
				location.reload();
			}
  		});

  		window.addEventListener('orientationchange', () => {
			setTimeout(() => {
				window.location.reload();
			}, 500);
  		});
	});
	setCanvasImages();

})();
