function sliderTeam() {
    var sliderTeams = jQuery('.slider--teams'),
        list = jQuery('#list'),
        listItems = jQuery('#list li'),
        nItems = listItems.length,
        nView = 3,
        autoSlider,
        current = 0,
        isAuto = true,
        acAuto = 2500,
      
    _init = function() {
        _initWidth();
        _eventInit();
    },
      
    _initWidth = function() {
        list.css({
            'margin-left': ~~(100 / nView) + '%',
            'width': ~~(100 * (nItems / nView)) + '%'
        });
        listItems.css('width', 100 / nItems + '%');
        sliderTeams.velocity({ opacity: 1 }, { display: "block" }, { delay:1000 });
    },
     
    _eventInit = function() {  
        window.requestAnimFrame = (function() {
            return  window.requestAnimationFrame       || 
            window.webkitRequestAnimationFrame || 
            window.mozRequestAnimationFrame    || 
            window.oRequestAnimationFrame      || 
            window.msRequestAnimationFrame     || 
            function(callback, element){
                window.setTimeout(callback, 1000 / 60);
            };
        })();

        window.requestInterval = function(fn, delay) {
            if( !window.requestAnimationFrame       && 
                !window.webkitRequestAnimationFrame && 
                !window.mozRequestAnimationFrame    && 
                !window.oRequestAnimationFrame      && 
                !window.msRequestAnimationFrame)
                    return window.setInterval(fn, delay);
            var start = new Date().getTime(),
                handle = new Object();

            function loop() {
                var current = new Date().getTime(),
                    delta = current - start;
                    
                if(delta >= delay) {
                    fn.call();
                    start = new Date().getTime();
                }
                
                handle.value = requestAnimFrame(loop);
            };
            handle.value = requestAnimFrame(loop);
            return handle;
        }

        window.clearRequestInterval = function(handle) {
            window.cancelAnimationFrame ? window.cancelAnimationFrame(handle.value) :
            window.webkitCancelRequestAnimationFrame ? window.webkitCancelRequestAnimationFrame(handle.value)   :
            window.mozCancelRequestAnimationFrame ? window.mozCancelRequestAnimationFrame(handle.value) :
            window.oCancelRequestAnimationFrame ? window.oCancelRequestAnimationFrame(handle.value) :
            window.msCancelRequestAnimationFrame ? msCancelRequestAnimationFrame(handle.value) :
            clearInterval(handle);
        };
        
        jQuery.each(listItems, function(i) {
            var ethis = jQuery(this);
            ethis.on('touchstart click', function(e) {
                e.preventDefault();
                _stopMove(i);
                _moveIt(ethis, i);
            });
        });
        
        
        jQuery.each(listItems, function(i) {
            var ethis = jQuery(this);
            ethis.on('mouseenter', function(e) {
                e.preventDefault();
                _pauseMove(i);
            });
        });
        
        sliderTeams.on('mouseleave', function(e) {
            e.preventDefault();
            _restartMove();
        });
        

        autoSlider = requestInterval(_autoMove, acAuto);
    },
      
    _moveIt = function(obj, x) { 
        var n = x;
        
        obj.find('figure').addClass('active');        
        listItems.not(obj).find('figure').removeClass('active');
        
        list.velocity({
            translateX: ~~((-(100 / nItems)) * n) + '%',
            translateZ: 0
        }, {
            duration: 1000,
            easing: [400, 26],
            queue: false
        });   
    },
      
    _autoMove = function(currentSlide) {
        if (isAuto) { 
          current = ~~((current + 1) % nItems);
        } else {
          current = currentSlide;
        }
        console.log(current);
        _moveIt(listItems.eq(current), current);
    },
      
    _stopMove = function(x) {
        clearRequestInterval(autoSlider);
        isAuto = false;
        _autoMove(x);
    },
      
    _pauseMove = function() {
        clearRequestInterval(autoSlider);
        isAuto = false;
    },
    
    _restartMove = function() {
        autoSlider = requestInterval(_autoMove, acAuto);
        isAuto = true;
    };
  
    return {
        init: _init
    };
};

jQuery(document).ready(function() {
    sliderTeam().init();

    jQuery('#list li figure:first').addClass('active');
});

