function Slider() {

    let sliders = $(".reviews");

    sliders.each(function(index) {

        let slider = $(this);

        let CountItems = slider.find(".reviews__block").length; 

        let item = slider.find(".reviews__block");
        let container = slider.find(".slider-container");
    
        let SlideToShow = 2;
        let SlideToScroll = 1;    
    
        if(window.innerWidth <= 767) {
            SlideToShow = 1;
            SlideToScroll = 1;
        } 

        let margin = 30;

        // 26,6 ЦЕ ВІДСТУП ( ТОБТО (margin * (SlideToShow - 1)) / SlideToShow) !!!!!!
        
        let ItemWidth = (container.width() / SlideToShow) - (margin * (SlideToShow - 1)) / SlideToShow;
    
        let track = slider.find(".reviews__track");
    
        let  position = 0;
    
        let movePosition = SlideToScroll * ItemWidth;
    
        let next = slider.find(".reviews__right");
        let prev = slider.find(".reviews__left");

        item.each(function(index, item) {
            $(item).css ({
                minWidth: ItemWidth,
                marginRight: margin,
            })
        })
    
        if(item.length <= SlideToShow) {
            next.css('display','none');
            prev.css('display','none');
        }
    
        next.click(function() {
            moveRight();
        });
    
    
        prev.click(function() {
            moveLeft();
        });
    
        function moveRight() {
            ItemsLeft = CountItems - Math.round((Math.abs(position) + (SlideToShow * ItemWidth) + (SlideToScroll * margin)) / ItemWidth);
        
            movePosition = (SlideToScroll * ItemWidth) + (SlideToScroll * margin);
            
            position -= ItemsLeft > SlideToScroll ? movePosition : ( ItemsLeft * ItemWidth) + (ItemsLeft * margin);
        
            if(ItemsLeft == 0) {
                position = 0;
            }
        
            track.css({
                transform:`translateX(${position}px)`
            })
        }
        
        function moveLeft() {
            ItemsLeft = Math.round(Math.abs(position) / ItemWidth);
        
            movePosition = (SlideToScroll * ItemWidth) + (SlideToScroll * margin);
            
            position += ItemsLeft > SlideToScroll ? movePosition : ( ItemsLeft * ItemWidth) + (ItemsLeft * margin);
        
        
            track.css({
                transform:`translateX(${position}px)`
            })
        }

    });
  
} 

function SliderCarImages() {

        let CountItems = $(".car-info__slider-item").length + 1; 

        let item = $(".car-info__slider-item");
        let container = $(".car-info__slider-continer");

        let CountItemsSum = $(".car-info__slider-item").length;

        let counter = 2;

        let margin = 20;

        let SlideToShow = 2.6;
        let SlideToScroll = 1;    
    
        if(window.innerWidth <= 992) {
            SlideToShow = 1.5;
            counter = 1;
            CountItems = $(".car-info__slider-item").length;
        } 

        if(window.innerWidth <= 520) {
            SlideToShow = 1.2;
            margin = 15;
        } 
        
        let ItemWidth = (container.width() / SlideToShow) - (margin * (SlideToShow - 1)) / SlideToShow;
    
        let track = $(".car-info__slider-track");
    
        let  position = 0;
    
        let movePosition = SlideToScroll * ItemWidth;
    
        let next = $(".car-info__slider-next");
        let prev = $(".car-info__slider-prev");

        item.each(function(index, item) {
            $(item).css ({
                minWidth: ItemWidth,
                marginRight: margin,
            })
        })
    
        if(item.length <= SlideToShow) {
            next.css('display','none');
            prev.css('display','none');
        }
    
        next.click(function() {
            moveRight();
        });
    
    
        prev.click(function() {
            moveLeft();
        });
    
        function moveRight() {
            counter++;

            ItemsLeft = CountItems - Math.round((Math.abs(position) + (SlideToShow * ItemWidth) + (SlideToScroll * margin)) / ItemWidth);
        
            movePosition = (SlideToScroll * ItemWidth) + (SlideToScroll * margin);
            
            position -= ItemsLeft > SlideToScroll ? movePosition : ( ItemsLeft * ItemWidth) + (ItemsLeft * margin);
        
            if(ItemsLeft == 0) {
                position = 0;
                counter = 2;
                if(window.innerWidth <= 992) {
                    counter = 1;
                } 
            }
        
            track.css({
                transform:`translateX(${position}px)`
            })

            $('.car-info__slider-count').html('<span class="car-info__slider-count--span">'+ counter +'</span> / ' + CountItemsSum);
        }
        
        function moveLeft() {

            ItemsLeft = Math.round(Math.abs(position) / ItemWidth);
        
            movePosition = (SlideToScroll * ItemWidth) + (SlideToScroll * margin);
            
            position += ItemsLeft > SlideToScroll ? movePosition : ( ItemsLeft * ItemWidth) + (ItemsLeft * margin);

            console.log(ItemsLeft);

            if(ItemsLeft == 1) {
                counter = 2;
                if(window.innerWidth <= 992) {
                    counter = 1;
                } 
            } 

            if(ItemsLeft > 1) {
                counter--;
            }
        
            track.css({
                transform:`translateX(${position}px)`
            })

            $('.car-info__slider-count').html('<span class="car-info__slider-count--span">'+ counter +'</span> / ' + CountItemsSum);
        }

        $('.car-info__slider-count').html('<span class="car-info__slider-count--span">'+ counter +'</span> / ' + CountItemsSum);
  
} 

function activeLabel() {
    let inputs = $(".input-add__input");

    inputs.each(function(index, input) {
        var targetValue = $(this).attr('id');
        $(this).focus(function() {
            $('label[for="' + targetValue + '"]').addClass('focused-label');
        });

        $(this).blur(function() {
            $('label[for="' + targetValue + '"]').removeClass('focused-label');
        });
    })
    
}

function visiblePass() {
    let icons = $(".input-add__icon-pass");

    icons.each(function(index, icon) {
        $(this).click(function() {
            let pass = $(this).prev('.input-add__input-pass');

            if(pass.prop("type") == 'password') {
                pass.prop("type", "text");
            } else {
                pass.prop("type", "password");
            }
        });
    })

    let icons_l = $(".login__icon-pass");

    icons_l.each(function(index, icon) {
        $(this).click(function() {
            let pass = $(this).prev('.login__input');

            if(pass.prop("type") == 'password') {
                pass.prop("type", "text");
            } else {
                pass.prop("type", "password");
            }
        });
    })
}

function phoneMask() {
    $('#phone').mask("+38 (999) 999-99-99")
}

function closeMessage() {
    
    let actions = $('.message-close');

    actions.each(function(index) {
        let action = $(this);

        let message = action.closest('.message');
        console.log(message)
        action.click(function() {
            message.fadeOut();
        })

    })
}

function popupRules() {
    let close = $('.popup-rules__btn--close');
    let popup = $('.popup-rules');
    if (!sessionStorage.getItem('pageReloaded')) {

        localStorage.setItem('popupOpened', 'false');
        sessionStorage.setItem('pageReloaded', 'true');
    }

    if (localStorage.getItem('popupOpened') !== 'true') {
        popup.show();

        localStorage.setItem('popupOpened', 'true');

        close.click(function() {
            popup.hide();
        });
    }
}

function closeInfoPopup() {

    let actions = $('.alert__close');

    actions.each(function(index) {
        let action = $(this);

        let popup = action.closest('.alert');
        action.click(function() {
            popup.fadeOut();
        })
    })   
}