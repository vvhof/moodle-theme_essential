/* jshint ignore:start */
define(['jquery', 'core/log'], function($, log) {

    "use strict"; // jshint ;_;

    log.debug('Essential Category Course Title Image AMD.');

    return {
        init: function() {
            log.debug('Essential Category Course Title Image AMD init.');
            $(document).ready(function($) {
                // Replacement image?
                var $courseImage = $('#section-0 .summary .categorycti');
                if ($courseImage.length) {
                    log.debug('ECTI replacement image in course.');

                    // Is there an image to replace?
                    var $categorycti = $('#region-main > .categorycti');
                    if ($categorycti.length) {
                        // Yes, so remove existing image.
                        log.debug('ECTI existing image.');
                        // Ref: http://stackoverflow.com/questions/2644299/jquery-removeclass-wildcard
                        $categorycti.removeClass(function (index, css) {
                            return (css.match(/categorycti-\S+/g) || []).join(' ');
                        });
                    } else {
                        // No, create wrapper.
                        log.debug('ECTI no existing image.');
                        $categorycti = $('#region-main > .coursetitle');
                        $categorycti.wrap('<div class="categorycti"><div>');
                    }

                    // Now use the replacement image.
                    $categorycti.css('background-image', 'url(' + $courseImage.attr('src') + ')');
                    $categorycti.css('height', $courseImage.attr('ctih'));
                    var $ctititle = $('.categorycti .coursetitle');
                    $ctititle.css('color', $courseImage.attr('ctit'));
                    $ctititle.css('background-color', $courseImage.attr('ctib'));
                    $ctititle.css('opacity', $courseImage.attr('ctio'));
                }
            });
        }
    };
});
/* jshint ignore:end */
