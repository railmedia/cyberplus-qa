jQuery(document).ready(function(){

    jQuery('.cpqa_q_and_a_plain').accordion({
        beforeActivate: function(event, ui) {
            if (ui.newHeader[0]) {
                var currHeader  = ui.newHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            } else {
                var currHeader  = ui.oldHeader;
                var currContent = currHeader.next('.ui-accordion-content');
            }
            var isPanelSelected = currHeader.attr('aria-selected') == 'true';

            currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));

            currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);

            currContent.toggleClass('accordion-content-active',!isPanelSelected)
            if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

            return false;
        }
    });

    jQuery('body').on('click', '#cpqa_q_and_a_reset', function(e){
        e.preventDefault();
        cpqa_q_and_a_reset();
    });

    jQuery('body').on('click', '#cpqa_q_and_a_submit', function(e){

        e.preventDefault();

        var errors = 0;

        if( jQuery('#cpqa_q_and_a_form .required').length ) {

            var validFields = 0;

            jQuery('#cpqa_q_and_a_form .required').each(function(index, reqField) {

                switch( jQuery(this)[0].type ) {

                    case 'radio':

                        var name = jQuery(this).attr('name');

                        if( ! jQuery('input[name="' + name + '"]').is(':checked') ) {
                            jQuery(this).parent().css('border', '1px solid red');
                            validFields++;
                        } else {
                            jQuery(this).parent().css('border', 'initial');
                        }

                    break;

                    default:

                        if( ! jQuery(this).val() ) {
                            jQuery(this).css('border', '1px solid red').focus();
                            validFields++;
                        } else {
                            jQuery(this).css('border', 'initial');
                        }

                }

            });

            if( validFields > 0 ) {
                errors = 1;
                return false;
            }

        }

        if( ! errors ) {

            var preloader = jQuery('.cpqa-loader');

            preloader.css('display', 'inline-block');

            jQuery.ajax('/wp-json/cpqa/v1/get-answers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('X-WP-Nonce', cpqa.nonce);
                },
                data: JSON.stringify( { data: jQuery('#cpqa_q_and_a_form').serialize() } ),
                dataType: 'json',
                success: function( answers ) {

                    preloader.hide();

                    jQuery('.cpqa_q_and_a_form h5').each( function(i, q){
                        var qid = parseInt( jQuery(this).attr('data-qid') ),
                            answer = answers.answers[qid] ? answers.answers[qid] : '';

                        jQuery(this).after('<div class="q-a-container"><div class="q-a-body">' + answer + '</div></div>');

                    });

                    jQuery('#cpqa_q_and_a').removeClass('incomplete').addClass('complete');
                    jQuery('#cpqa_q_and_a').accordion({
                        collapsible: true,
                        heightStyle: 'content',
                        beforeActivate: function(event, ui) {
                            if (ui.newHeader[0]) {
                                var currHeader  = ui.newHeader;
                                var currContent = currHeader.next('.ui-accordion-content');
                            } else {
                                var currHeader  = ui.oldHeader;
                                var currContent = currHeader.next('.ui-accordion-content');
                            }
                            var isPanelSelected = currHeader.attr('aria-selected') == 'true';

                            currHeader.toggleClass('ui-corner-all',isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top',!isPanelSelected).attr('aria-selected',((!isPanelSelected).toString()));

                            currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e',isPanelSelected).toggleClass('ui-icon-triangle-1-s',!isPanelSelected);

                            currContent.toggleClass('accordion-content-active',!isPanelSelected)
                            if (isPanelSelected) { currContent.slideUp(); }  else { currContent.slideDown(); }

                            return false;
                        }
                    });

                    jQuery('#cpqa_q_and_a_submit').hide();
                    jQuery('#cpqa_q_and_a_reset').show();

                }
            });

        }

    });

});

function cpqa_q_and_a_reset() {
    jQuery('#cpqa_q_and_a').accordion('destroy');
    jQuery('.q-a-container').remove();
    jQuery('#cpqa_q_and_a').removeClass('complete').addClass('incomplete');
    jQuery('#cpqa_q_and_a_submit').show();
    jQuery('#cpqa_q_and_a_reset').hide();
}
