"use strict";
console.info('%c See you later ', 'background:#222; color: #bada55;', '\n' + 'http://itddaa.com');
const URL = (num)=>window.location.pathname.split('/')[num];
const match = window.matchMedia("(max-width:768px)")
  , FADESPEED = 0.4;
const getCookieValue = (key)=>{
    let cookie = key + "=";
    let result = "";
    const cookieArr = document.cookie.split(';');
    cookieArr.forEach((item,idx)=>{
        if (item[0] === " ") {
            item = item.substring(1);
        }
        if (item.indexOf(cookie) === 0) {
            result = item.slice(cookie.length, item.length);
            return result;
        }
    }
    );
    return result;
}
const nLInit = function() {
    let newSwiper;
    function resizeEvent() {
        if (!match.matches) {
            const swElm = document.querySelector('._m .se_4 .wrap > .swiper')
              , se4t_f = document.querySelector('._m .se_4 .t_f')
              , news = document.querySelector('._m .se_4 .news');
            if (swElm != null) {
                se4t_f.after(news);
                swElm.remove();
                news.classList.remove('swiper-wrapper');
                document.querySelectorAll('._m .se_4 .news li').forEach(element=>{
                    element.classList.remove('swiper-slide');
                }
                );
                if (newSwiper != undefined) {
                    newSwiper.destroy();
                    newSwiper = undefined;
                }
            }
        } else {
            const se4t_f = document.querySelector('._m .se_4 .t_f')
              , swDiv = document.createElement('div')
              , swElm = document.querySelector('._m .se_4 .wrap > .swiper')
              , news = document.querySelector('._m .se_4 .news');
            swDiv.classList.add('swiper', 'newSwiper');
            if (swElm == null) {
                se4t_f.after(swDiv);
                swDiv.append(news);
                news.classList.add('swiper-wrapper');
                document.querySelectorAll('._m .se_4 .news li').forEach(element=>{
                    element.classList.add('swiper-slide');
                }
                );
                if (newSwiper == undefined) {
                    newSwiper = new Swiper('._m .se_4 .newSwiper',{
                        spaceBetween: 10,
                    });
                }
            }
        }
    }
    resizeEvent();
    window.addEventListener('resize', resizeEvent);
}
const h = function() {
    function headerOffsetEvent() {
        if (window.pageYOffset > 0) {
            document.querySelector('header').classList.add('scroll-down');
        } else {
            document.querySelector('header').classList.remove('scroll-down');
        }
    }
    headerOffsetEvent();
    window.addEventListener('scroll', headerOffsetEvent);
}
const intro = {
    init: function() {
        if (sessionStorage.getItem('intro') == "Y") {
            document.querySelector('.__intro').remove();
            document.body.onload = function() {
                m.init();
            }
            return;
        } else {
            sessionStorage.setItem('intro', 'Y');
            this.start();
        }
    },
    start: function() {
        document.body.style.overflow = 'hidden';
        const introTl = gsap.timeline({
            ease: "power2.inOut",
            onComplete: end
        });
        introTl.set('.__intro svg', {
            opacity: 0
        }).set('#n_', {
            width: 0
        }).set('#o_', {
            width: 0
        }).set('#s_', {
            width: 0
        }).to('.__intro svg', {
            opacity: 1,
            duration: 1
        }).to('#n_', {
            width: 45,
            duration: .7
        }, "line").to('#s_', {
            width: 45,
            duration: .7
        }, "line").to('#o_', {
            width: 45,
            duration: .7
        }, "line").to("#n_1", {
            x: 45,
            duration: .7
        }, "line2").to("#s", {
            x: 15,
            duration: .7
        }, "line2").to("#o", {
            x: -15,
            duration: .7
        }, "line2").to("#n_2", {
            x: -45,
            duration: .7
        }, "line2").to('#n_', {
            width: 15,
            x: 45,
            duration: .7
        }, "line2").to('#s_', {
            width: 15,
            x: 15,
            duration: .7
        }, "line2").to('#o_', {
            width: 15,
            x: -15,
            duration: .7
        }, "line2");
        function end() {
            document.body.style.overflowY = 'auto';
            m.init();
            ScrollTrigger.refresh();
            gsap.to('.__intro', {
                opacity: 0,
                duration: 1.5,
                onComplete: ()=>{
                    document.querySelector('.__intro').remove();
                }
            });
        }
    }
}
const m = {
    init: function() {
        this.v();
        this.se_1();
        this.se_2();
        this.se_3();
        this.se_4();
        this.se_5();
    },
    v: function() {
        const video = document.querySelector('._m .v');
        const videoIframe = document.querySelector('._m .v .videoBg iframe');
        function videoResize() {
            let height = (video.clientHeight);
            videoIframe.style.height = height + 'px';
            videoIframe.style.width = (16 / 9) * height + 'px';
        }
        videoResize();
        window.addEventListener('resize', videoResize);
        const tDom = document.querySelectorAll('._m .v ul li p');
        const t = {
            t1_text: tDom[0].textContent,
            t2_text: tDom[1].textContent,
        }
        let t1_i = 1;
        let t1_dealy = true;
        let t2_i = 0;
        let t2_dealy = false;
        tDom[0].innerHTML = t.t1_text[0];
        tDom[1].innerHTML = '';
        function typing1() {
            if (t1_dealy) {
                let changeText = t.t1_text[t1_i++];
                tDom[0].innerHTML += changeText;
                if (t1_i > t.t1_text.length - 1) {
                    t1_dealy = false;
                    t2_dealy = true;
                    tDom[0].style.borderRight = 0;
                }
            }
        }
        function typing2() {
            if (t2_dealy) {
                let changeText = t.t2_text[t2_i++];
                tDom[1].innerHTML += changeText;
                if (t2_i > t.t2_text.length - 1) {
                    t2_dealy = false;
                    setTimeout(function() {
                        t1_dealy = true;
                        tDom[0].style.borderRight = "3px solid #fff";
                        t1_i = 1;
                        tDom[0].innerHTML = t.t1_text[0];
                        t2_i = 0;
                        tDom[1].innerHTML = '';
                    }, 4000)
                }
            }
        }
        setInterval(function() {
            typing1();
            typing2();
        }, 70);
        const liChild = gsap.utils.toArray('._m .v ul li');
        liChild.forEach(function(item, idx) {
            gsap.fromTo(item, {
                y: 50,
                opacity: 0
            }, {
                y: 0,
                opacity: 1,
                duration: .5,
                delay: idx * 0.5
            });
        });
        const tl = gsap.timeline();
        gsap.set('._m .v .s_t p', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .v .s_t .b_logo', {
            y: 50,
            opacity: 0
        });
        tl.to('._m .v .s_t p', {
            y: 0,
            opacity: 1
        }).to('._m .v .s_t .b_logo', {
            y: 0,
            opacity: 1
        }, "-=25%");
        tl.pause();
        ScrollTrigger.create({
            trigger: '._m .v',
            start: 'center-=25% top',
            end: 'center-=25% top',
            onEnter: function() {
                tl.play();
            },
            onLeaveBack: function() {
                tl.reverse();
            }
        });
    },
    se_1: function() {
        ScrollTrigger.matchMedia({
            "(min-width:769px)": function() {
                const list = gsap.utils.toArray('._m .se_1 .list');
                list.forEach((item,idx)=>{
                    gsap.set(item.querySelector('.scroll-img'), {
                        width: "100vw",
                        height: "100vh"
                    });
                    gsap.to(item.querySelector('.scroll-img'), {
                        width: ((840 * 100) / 1920) + 'vw',
                        height: ((425 * 100) / 1920) + 'vw',
                        left: ((60 * 100) / 1920) + 'vw',
                        top: ()=>{
                            let cont = item.scrollHeight;
                            let scroll = item.scrollHeight - item.querySelector('.tb').clientHeight - parseInt(getComputedStyle(item.querySelector('.tb')).paddingTop);
                            return ((scroll / cont) * 100) + "%";
                        }
                        ,
                        scrollTrigger: {
                            trigger: item.querySelector('.scroll-img'),
                            endTrigger: item,
                            start: "top top",
                            end: "bottom bottom",
                            pin: true,
                            pinSpacing: false,
                            scrub: 1,
                            invalidateOnRefresh: true,
                        }
                    });
                }
                )
            },
            "(max-width:768px)": function() {
                const list = gsap.utils.toArray('._m .se_1 .list');
                list.forEach(item=>{
                    item.querySelector('.scroll-img').style.height = '';
                    item.querySelector('.scroll-img').style.width = '';
                    item.querySelector('.scroll-img').style.top = '';
                    item.querySelector('.scroll-img').style.left = '';
                    item.querySelector('.scroll-img').style.transform = '';
                }
                )
            }
        });
    },
    se_2: function() {
        var videoSrc = [{
            kor: 'https://player.vimeo.com/video/796123327?h=da98e0d116&quality=720p&controls=false&muted=true&loop=true',
            eng: 'https://player.vimeo.com/video/797595630?h=1e5f69ea38&quality=720p&controls=false&muted=true&loop=true'
        }, {
            kor: 'https://player.vimeo.com/video/796126491?h=185f9b4557&quality=720p&controls=false&muted=true&loop=true',
            eng: 'https://player.vimeo.com/video/796125340?h=0266e10298&quality=720p&controls=false&muted=true&loop=true'
        }]
        var scrollVideo1 = document.getElementById('scrollVideo1');
        var player1 = new Vimeo.Player(scrollVideo1);
        var scrollVideo2 = document.getElementById('scrollVideo2');
        var player2 = new Vimeo.Player(scrollVideo2);
        ScrollTrigger.matchMedia({
            "(min-width:769px)": function() {
                scrollVideo1.src = URL(1) === "kor" ? videoSrc[0].kor : videoSrc[0].eng;
                scrollVideo2.src = URL(1) === "kor" ? videoSrc[1].kor : videoSrc[1].eng;
                const se_2Tl = gsap.timeline({
                    ease: "power2.inOut",
                    scrollTrigger: {
                        trigger: '._m .se_2 ul',
                        pin: true,
                        scrub: 2,
                        end: 'bottom+=100% top',
                        onEnter: function() {
                            player1.play();
                            gsap.to('header', {
                                yPercent: -100
                            });
                        },
                        onEnterBack: function() {
                            gsap.to('header', {
                                yPercent: -100
                            });
                        },
                        onLeave: function() {
                            gsap.to('header', {
                                yPercent: 0
                            });
                        },
                        onLeaveBack: function() {
                            gsap.to('header', {
                                yPercent: 0
                            });
                        }
                    }
                });
                se_2Tl.set('._m .se_2 ul li:nth-of-type(1) .rbx .l_b2, ._m .se_2 ul li:nth-of-type(1) .rbx .r_b2', {
                    height: '50%'
                }).set('._m .se_2 ul li:nth-of-type(2) .rbx .t1, ._m .se_2 ul li:nth-of-type(2) .rbx  .b1', {
                    height: '50%'
                }).set('._m .se_2 ul li:nth-of-type(2) .rbx  .r1, ._m .se_2 ul li:nth-of-type(2) .rbx  .l1', {
                    width: '50%'
                }).set('._m .se_2 ul li:nth-of-type(2) .lbx .l_b2, ._m .se_2 ul li:nth-of-type(2) .lbx .r_b2', {
                    height: '50%'
                }).to('._m .se_2 ul li:nth-of-type(1) .rbx .l_b2, ._m .se_2 ul li:nth-of-type(1) .rbx .r_b2', {
                    height: '0'
                }).to('._m .se_2 ul li:nth-of-type(1) .lbx .t1, ._m .se_2 ul li:nth-of-type(1) .lbx  .b1', {
                    height: '50%'
                }, "my1").to('._m .se_2 ul li:nth-of-type(1) .lbx  .r1, ._m .se_2 ul li:nth-of-type(1) .lbx  .l1', {
                    width: '50%'
                }, "my1").to('._m .se_2 ul li:nth-of-type(1)', {
                    css: {
                        pointerEvents: "none"
                    }
                }).to('._m .se_2 ul li:nth-of-type(1) .lbx', {
                    opacity: 0,
                    duration: 0
                }).to('._m .se_2 ul li:nth-of-type(2) .rbx .t1, ._m .se_2 ul li:nth-of-type(2) .rbx  .b1', {
                    height: '0'
                }, "my2").to('._m .se_2 ul li:nth-of-type(2) .rbx  .r1, ._m .se_2 ul li:nth-of-type(2) .rbx  .l1', {
                    width: '0'
                }, "my2").to('._m .se_2 ul li:nth-of-type(1) .rbx .l_b1, ._m .se_2 ul li:nth-of-type(1) .rbx .r_b1', {
                    width: '50%'
                }).to('._m .se_2 ul li:nth-of-type(1) .rbx', {
                    opacity: 0,
                    duration: 0
                }).to('._m .se_2 ul li:nth-of-type(2) .lbx .l_b2, ._m .se_2 ul li:nth-of-type(2) .lbx .r_b2', {
                    onStart: function() {
                        player2.play();
                    },
                    height: '0'
                }, ">").to('._m .se_2 ul li:nth-of-type(2)', {
                    css: {
                        zIndex: 3
                    },
                    duration: 0
                });
            },
            "(max-width:768px)": function() {
                gsap.set('._m .se_2 ul li:nth-of-type(1) .rbx .l_b2, ._m .se_2 ul li:nth-of-type(1) .rbx .r_b2', {
                    height: '0%'
                })
                gsap.set('._m .se_2 ul li:nth-of-type(2) .rbx .t1, ._m .se_2 ul li:nth-of-type(2) .rbx  .b1', {
                    height: '0%'
                })
                gsap.set('._m .se_2 ul li:nth-of-type(2) .rbx  .r1, ._m .se_2 ul li:nth-of-type(2) .rbx  .l1', {
                    width: '0%'
                })
                gsap.set('._m .se_2 ul li:nth-of-type(2) .lbx .l_b2, ._m .se_2 ul li:nth-of-type(2) .lbx .r_b2', {
                    height: '0%'
                })
                scrollVideo1.src = URL(1) === "kor" ? videoSrc[0].kor : videoSrc[0].eng;
                scrollVideo2.src = URL(1) === "kor" ? videoSrc[1].kor : videoSrc[1].eng;
            }
        });
    },
    se_3: function() {
        const li = document.querySelectorAll('._m .se_3 .rx ul li');
        gsap.set(li[0], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[1], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[2], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[3], {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_3 .lx dl dt', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_3 .lx dl dd', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_3 .lx p', {
            y: 50,
            opacity: 0
        });
        const se_3Tl = gsap.timeline();
        se_3Tl.pause();
        function se_3LiTi() {
            const tl = gsap.timeline();
            tl.to(li[0], {
                y: 0,
                opacity: 1,
                duration: FADESPEED
            }).to(li[1], {
                y: 0,
                opacity: 1,
                duration: FADESPEED
            }, "-=15%").to(li[2], {
                y: 0,
                opacity: 1,
                duration: FADESPEED
            }, "-=15%").to(li[3], {
                y: 0,
                opacity: 1,
                duration: FADESPEED
            }, "-=15%");
            return tl;
        }
        se_3Tl.to('._m .se_3 .lx dl dt', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_3 .lx dl dd', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_3 .lx p', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }, ).add(se_3LiTi(), "-=15%");
        ScrollTrigger.create({
            trigger: '._m .se_3',
            start: 'top center',
            onEnter: function() {
                se_3Tl.play();
            },
            onLeaveBack: function() {
                se_3Tl.reverse();
            }
        });
    },
    se_4: function() {
        const tl = gsap.timeline();
        gsap.set('._m .se_4 .t_f', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_4 .news', {
            y: 50,
            opacity: 0
        });
        tl.to('._m .se_4 .t_f', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_4 .news', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        });
        tl.pause();
        ScrollTrigger.create({
            trigger: '._m .se_4',
            start: 'top center',
            onEnter: function() {
                tl.play();
            },
            onLeaveBack: function() {
                tl.reverse();
            }
        });
        const tl2 = gsap.timeline();
        gsap.set('._m .se_4 .t_f.contact h2', {
            x: -50,
            opacity: 0
        });
        gsap.set('._m .se_4 .t_f.contact ul', {
            x: 50,
            opacity: 0
        });
        tl2.to('._m .se_4 .t_f.contact h2', {
            x: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_4 .t_f.contact ul', {
            x: 0,
            opacity: 1,
            duration: FADESPEED
        });
        tl2.pause();
        ScrollTrigger.create({
            trigger: '._m .se_4 .t_f.contact',
            start: 'top-=250% center',
            onEnter: function() {
                tl2.play();
            },
            onLeaveBack: function() {
                tl2.reverse();
            }
        });
    },
    se_5: function() {
        const li = document.querySelectorAll('._m .se_5 ul li');
        const tl = gsap.timeline();
        gsap.set('._m .se_5 dl dt', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_5 dl dd', {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_5.se_5_eng .engtxt', {
            y: 50,
            opacity: 0
        });
        gsap.set(li[0], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[1], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[2], {
            y: 50,
            opacity: 0
        });
        gsap.set(li[3], {
            y: 50,
            opacity: 0
        });
        gsap.set('._m .se_5 .link', {
            y: 50,
            opacity: 0
        });
        tl.to('._m .se_5 dl dt', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_5 dl dd', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to(li[0], {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }, "-=25%").to(li[1], {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }, "-=15%").to(li[2], {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }, "-=15%").to(li[3], {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }, "-=15%").to('._m .se_5.se_5_eng .engtxt', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        }).to('._m .se_5 .link', {
            y: 0,
            opacity: 1,
            duration: FADESPEED
        });
        tl.pause();
        ScrollTrigger.create({
            trigger: '._m .se_5',
            start: 'top center',
            onEnter: function() {
                tl.play();
            },
            onLeaveBack: function() {
                tl.reverse();
            }
        });
    }
}
