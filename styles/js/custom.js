/*language and currency switcher*/

$(document).ready(function() {
$('.switcher').hover(function() {
$(this).find('.option').stop(true, true).slideDown(300);
},function() {
$(this).find('.option').stop(true, true).slideUp(150);
});
});


/*styled select menus*/

(function($){
    $.fn.extend({
    customStyle : function(options) {
        if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)) {
            return this.each(function() {
                var currentSelected = $(this).find(':selected');
                $(this).after('<span class="customstyleselectbox"><span class="customstyleselectboxinner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
                var selectBoxSpan = $(this).next();
                var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));            
                var selectBoxSpanInner = selectBoxSpan.find(':first-child');
                selectBoxSpan.css({display:'inline-block'});
                selectBoxSpanInner.css({width:selectBoxWidth, display:'inline-block'});
                var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) + parseInt(selectBoxSpan.css('padding-bottom'));
                $(this).height(selectBoxHeight).change(function() {
                    selectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
                });
         });
        }
    }
    });
})(jQuery);
