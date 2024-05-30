// SubVisual
function subVisual(obj){

    let li;

    const template =
    `
        <div class="_subVisual">
            <div class="svbg"></div>
            <dl>
                <dt>${obj.title[0]}</dt>
                <dd>${obj.title[1]}</dd>
            </dl>
           
        </div>
    `;

    $('._sub').prepend(template);

    obj.list.name.forEach(function (tmenu, e){
        li = `<li><a href="${obj.list.sublink[e]}">${tmenu}</a></li>`;
        $('.subDepth').append(li);
    });


    $('._sub ._subVisual>ul>li:last-of-type>a').click(function () {
        $('._sub ._subVisual>ul>li .subDepth').slideToggle();
        return false;
    });



    // 모션
    var sVdt = '._sub ._subVisual dl dt';
    var sVdd = '._sub ._subVisual dl dd';
    var sVul = '._sub ._subVisual ul';

    gsap.set(sVdt, {opacity: 0, yPercent: 100});
    gsap.set(sVdd, {opacity: 0, yPercent: 10});
    gsap.set(sVul, {opacity: 0, yPercent: 100});

    var sVmotion = gsap.timeline();
    sVmotion
        .to(sVdt, { opacity: 1, yPercent: 0, duration: .8 })
        .to(sVdd, { opacity: 1, yPercent: 0, duration: .8 }, '-=80%')
        .to(sVul, { opacity: 1, yPercent: 0, duration: .8 }, '-=80%');


    ScrollTrigger.create({
        trigger: "._sub ._subVisual",
        start: 'top+=50px top',
        // markers: true,
        invalidateOnRefresh : true,
        toggleClass: {targets: "._sub ._subVisual", className: "on"},
    });

}

