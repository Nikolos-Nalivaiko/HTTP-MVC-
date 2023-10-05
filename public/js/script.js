function Slider() {

    let sliders = $(".reviews");

    sliders.each(function(index) {

        let slider = $(this);

        let CountItems = slider.find(".reviews__block").length; 

        let item = slider.find(".reviews__block");
        let container = slider.find(".reviews__slider");
    
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

}

function phoneMask() {
    $('#phone').mask("+38 (999) 999-99-99")
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

    let actions = $('.popup-success__close');

    actions.each(function(index) {
        let action = $(this);

        let popup = action.closest('.popup-success');
        action.click(function() {
            popup.fadeOut();
        })
    })  

    let actions_error = $('.popup-error__close');

    actions_error.each(function(index) {
        let action_error = $(this);

        let popup_error = action_error.closest('.popup-error');
        action_error.click(function() {
            popup_error.fadeOut();
        })
    })  
}