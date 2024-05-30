'use strict';
/*
jqeury1.12.4 기반
공통 ui
*/
$(function() {
    var deviceType, nowPath = window.location.pathname, $window = $(window), viewportW = $window.width(), viewportH = $window.height(), $html = $('html'), $body = $('body'), $Container = $('#container'), isMain = $body.hasClass('main'), isScrollUI = $body.hasClass('scrollUI-body'), tabletWidth = 1024, mobileWidth = 767, agent = navigator.userAgent.toLowerCase(), isIE = 'Netscape' == navigator.appName && -1 != agent.indexOf('trident') || -1 != agent.indexOf('msie');
    //디바이스 너비
    viewportW > tabletWidth && (deviceType = 'lg'),
    viewportW <= tabletWidth && viewportW > mobileWidth && (deviceType = 'md'),
    viewportW <= mobileWidth && (deviceType = 'sm');
    var UI = {
        init: function init() {
            //UI.goTop();
            UI.nav(),
            UI.footer(),
            UI.modal()
        },
        browserCheck: function browserCheck() {
            //Internet Explorer 10 이하는 접근금지
            10 == function() {
                var myNav = navigator.userAgent.toLowerCase();
                return -1 != myNav.indexOf('msie') && parseInt(myNav.split('msie')[1])
            }() && (alert('\uC774 \uBE0C\uB77C\uC6B0\uC800\uB294 \uC11C\uBE44\uC2A4 \uC9C0\uC6D0\uC774 \uACE7 \uC885\uB8CC\uB429\uB2C8\uB2E4. \n\uCD5C\uC2E0 \uBE0C\uB77C\uC6B0\uC800\uB97C \uC774\uC6A9\uD574\uC8FC\uC138\uC694.'),
            window.location = 'https://browsehappy.com/')
        },
        nav: function nav() {
            function checkBrnadItem() {
                $('.gn-brand-item').hasClass('active') ? $html.addClass('is-scroll-lock') : $html.removeClass('is-scroll-lock')
            }
            var $navWrap = $('#glovalnavSection')
              , $nav = $('#glovalnav')
              , $navTop = $('#glovalnavTop')
              , $oneDepth = $nav.find('.gn-item > .depth1-item')
              , $oneDepthTop = $navTop.find('.gn-item > .depth1-item')
              , $navToggle = $navWrap.find('#gnToggle')
              , navTopH = $navTop.outerHeight();
            if ('lg' == deviceType) {
                $window.on('mousewheel', function() {//navScroll(e.originalEvent.deltaY);
                }).scroll(function() {
                    var scrollT = $window.scrollTop();
                    scrollT < navTopH ? $navWrap.css('top', '-' + scrollT + 'px') : $navWrap.css('top', '-' + navTopH + 'px')
                })
            }
            $navToggle.on('click', function() {
                $html.toggleClass('gnOn'),
                $oneDepth.parent().removeClass('active'),
                $oneDepth.parent().filter('.on').addClass('toggle active')
            }),
            $oneDepth.on('click', function() {
                event.stopPropagation(),
                $(this).parent().hasClass('on') ? $(this).parent().removeClass('toggle').toggleClass('active').siblings().removeClass('active') : ($(this).parent().toggleClass('active').siblings().removeClass('active').removeClass('toggle'),
                $oneDepthTop.parent().removeClass('active')),
                checkBrnadItem()
            }),
            $oneDepthTop.on('click', function() {
                event.stopPropagation(),
                $(this).parent().toggleClass('active').siblings().removeClass('active'),
                $oneDepth.parent().removeClass('active'),
                checkBrnadItem()
            }),
            isIE || 'lg' != deviceType || (window.onclick = function(event) {
                event.target.closest('.depth2-box') || ($oneDepth.parent().hasClass('active') && $oneDepth.parent().removeClass('active'),
                $oneDepthTop.parent().hasClass('active') && $oneDepthTop.parent().removeClass('active'),
                checkBrnadItem())
            }
            )
        },
        footer: function footer() {
            var $footer = $('#glovalFooter')
              , $siteItemHead = $footer.find('.gf-sm-depth1')
              , $siteItemBody = $footer.find('.gf-sm-body');
            800 >= viewportW && accordionUI('.gf-sitemap-section', 'active')
        },
        goTop: function() {
            var scr, $goTop = $('#goTop a'), startP = $('.global-head').height(), endP = $('#glovalFooter').offset().top;
            $window.scroll(function() {
                scr = $window.scrollTop(),
                scr > startP ? $goTop.addClass('on') : $goTop.removeClass('on'),
                scr + window.innerHeight > endP ? $goTop.addClass('end') : $goTop.removeClass('end')
            }),
            $goTop.on('click', function() {
                $('html,body').stop().animate({
                    scrollTop: 0
                }, 200)
            })
        },
        modal: function() {
            var modal = document.getElementById('Modal')
              , openBtn = document.getElementById('modalOpen')
              , closeBtn = document.querySelector('#Modal .close');
            modal && (openBtn.onclick = function() {
                modal.classList.add('open')
            }
            ,
            openBtn && (closeBtn.onclick = function() {
                modal.classList.remove('open')
            }
            ),
            window.onclick = function(event) {
                event.target == modal && modal.classList.remove('open')
            }
            )
        }
    };
    UI.init(),
    isScrollUI || ($(window).on('resize', function() {
        var currentWidth = $(window).width()
          , distance = Math.abs(currentWidth - viewportW);
        50 < distance && location.reload()
    }),
    window.addEventListener('orientationchange', function() {
        setTimeout(function() {
            window.location.reload()
        }, 500)
    }))
});
function goTop() {
    var scr, $window = $(window), $goTop = $('#goTop a'), startP = $('.global-head').height(), endP = $('#glovalFooter').offset().top;
    $window.scroll(function() {
        scr = $window.scrollTop(),
        scr > startP ? $goTop.addClass('on') : $goTop.removeClass('on'),
        scr + window.innerHeight > endP ? $goTop.addClass('end') : $goTop.removeClass('end')
    }),
    $goTop.on('click', function() {
        $('html,body').stop().animate({
            scrollTop: 0
        }, 200)
    })
}
window.addEventListener('load', function() {
    setTimeout(function() {
        goTop()
    }, 300)
});
/*
	아코디언 UI
	사용: accordionUI('.as-section2'[, 'active']);
*/
var accordionUI = function(wrap, active) {
    active = active || !1;
    var $wrap = $(wrap)
      , $arHead = $wrap.find('[data-role="accordion-head"]')
      , $arBody = $wrap.find('[data-role="accordion-body"]')
      , speed = 300;
    $arBody.hide(),
    $arHead.click(function() {
        $arBody.is(':visible') && ($arBody.slideUp(speed),
        'string' == typeof active && $arHead.removeClass(active)),
        $(this).next($arBody).is(':visible') ? ($(this).next($arBody).slideUp(speed),
        'string' == typeof active && $(this).removeClass(active)) : ($(this).next($arBody).slideDown(speed),
        'string' == typeof active && $(this).addClass(active))
    })
};
/*
 * @info : 커스텀 셀렉트박스
 사용:  var uiSelect1 = new uiSelect('.js-select-box.type1');
        var uiSelect2 = new uiSelect('.js-select-box.type2');
*/
function uiSelect(selector) {
    this.$selectBox = null,
    this.$select = null,
    this.$list = null,
    this.$listLi = null,
    uiSelect.prototype.init = function(selector) {
        this.$selectBox = $(selector),
        this.$select = this.$selectBox.find('.ui-select .ui-selected'),
        this.$list = this.$selectBox.find('.ui-select .ui-select-options'),
        this.$listLi = this.$list.children('li')
    }
    ,
    uiSelect.prototype.initEvent = function() {
        var that = this;
        this.$select.on('click', function() {
            that.listOn()
        }),
        this.$listLi.on('click', function() {
            that.listSelect($(this))
        }),
        $(document).on('click', function(e) {
            that.listOff($(e.target))
        })
    }
    ,
    uiSelect.prototype.listOn = function() {
        this.$selectBox.toggleClass('on'),
        this.$selectBox.hasClass('on') ? this.$list.css('display', 'block') : this.$list.css('display', 'none')
    }
    ,
    uiSelect.prototype.listSelect = function($target) {
        $target.addClass('selected').siblings('li').removeClass('selected'),
        this.$selectBox.removeClass('on'),
        this.$select.text($target.text()),
        this.$list.css('display', 'none')
    }
    ,
    uiSelect.prototype.listOff = function($target) {
        !$target.is(this.$select) && this.$selectBox.hasClass('on') && (this.$selectBox.removeClass('on'),
        this.$list.css('display', 'none'))
    }
    ,
    this.init(selector),
    this.initEvent()
}
/*
	tab UI : 한페이지에 한개, 멀티는 추가개발 필요
	사용: tabUI();
*/
function tabUI() {
    var tabItem = '.tab-item'
      , tabPanel = '.p-tab-panel';
    $(tabItem + ':first-of-type, ' + tabPanel + ':first-of-type').addClass('active').attr('tabindex', '0'),
    $(tabItem + ':first-of-type').attr('aria-selected', 'true'),
    $(tabItem).on('click', function() {
        var yn = $(this).attr('data-num')
          , pnl = '#' + $(this).attr('aria-controls');
        $(this).addClass('active').attr({
            tabindex: '0',
            "aria-selected": 'true'
        }).siblings().removeClass('active').attr({
            tabindex: '-1',
            "aria-selected": 'false'
        }),
        $(pnl).attr('tabindex', '0').addClass('active').siblings(tabPanel).attr('tabindex', '-1').removeClass('active')
    })
}
/*
	뉴스레터 개인정보 수집 팝업
	사용: newsPolicyPop()
*/
function newsPolicyPop() {
    event.preventDefault(),
    window.open('/policy/news-privacy.php', '\uB274\uC2A4\uB808\uD130 - \uAC1C\uC778\uC815\uBCF4 \uC218\uC9D1\xB7\uC774\uC6A9 \uB3D9\uC758', 'width=550, height=650, location=no, menubar=no, toolbar=no')
}
