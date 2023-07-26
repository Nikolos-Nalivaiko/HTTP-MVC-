function Slider() {

    let CountItems = $(".reviews__block").length; 

    let item = $(".reviews__block");
    let container = $(".reviews__slider");

    let SlideToShow = 2;
    let SlideToScroll = 1;    

    if(window.innerWidth <= 767) {
        SlideToShow = 1;
        SlideToScroll = 1;
    } 



    let margin = 30;

    // 26,6 ЦЕ ВІДСТУП ( ТОБТО (margin * (SlideToShow - 1)) / SlideToShow) !!!!!!
    
    let ItemWidth = (container.width() / SlideToShow) - (margin * (SlideToShow - 1)) / SlideToShow;

    let track = $(".reviews__track");

    let  position = 0;

    let movePosition = SlideToScroll * ItemWidth;

    let next = $(".reviews__right");
    let prev = $(".reviews__left");

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
    
} 

function selectJS() {

    let dropdowns = $(".dropdown");

    dropdowns.each(function(index) {

        var dropdown = $(this);

        let button = dropdown.find('.dropdown__button');
        let list = dropdown.find(".dropdown__list");
        let items = dropdown.find(".dropdown__list-item");
        let label = dropdown.find(".dropdown__label");
        let input = dropdown.find(".dropdown__input--hidden");

        // button.text(items.eq(0).text());
        button.text('Оберіть регіон');

        button.click(function(e) {
            list.toggleClass("dropdown__list--vissible");
            button.addClass("dropdown__button--active");
            button.addClass("dropdown__button--active");
            label.addClass("dropdown__label--active");
        });

        items.each(function(index, item) {
            $(this).click(function(e) {
                e.stopPropagation();
                button.text($(this).text());
                input.val($(this).data('value'));
                list.removeClass("dropdown__list--vissible");
            });
        })

        $(document).on("click", function(e) {
            var target = $(e.target);

            if(!$.fn.is.call(target, button)) {
                list.removeClass("dropdown__list--vissible");
                button.removeClass("dropdown__button--active");
                label.removeClass("dropdown__label--active");
            }
            
        });

        $(document).on("keydown", function(e) {
            if(e.key === 'Tab' || e.key === 'Escape') {
                list.removeClass("dropdown__list--vissible");
                button.removeClass("dropdown__button--active");
                label.removeClass("dropdown__label--active");
            }
        });

    })
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