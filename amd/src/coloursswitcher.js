/* jshint ignore:start */
define(['jquery', 'core/log'], function($, log) {

    "use strict"; // jshint ;_;

    log.debug('Essential Colour Switcher AMD');

    !(function($) {
        var ColoursSwitcher = function (element) {
            this.$element = $(element);
            this.SCHEMES = ['default', 'alternative1', 'alternative2', 'alternative3', 'alternative4'];
            this.scheme = 'default';
        }

        ColoursSwitcher.prototype = {

            constructor: ColoursSwitcher,
            init: function(data) {
                var i, s;
                /* Attach events to the links to change colours scheme so we can do it with
                   JavaScript without refreshing the page. */
                log.debug('Colour switcher on: ' + data.div);
                var body = $('body');
                for (i in this.SCHEMES) {
                    s = this.SCHEMES[i];
                    // Check if this is the current colour.
                    if (body.hasClass('essential-colours-' + s)) {
                        this.scheme = s;
                        log.debug('Colour switcher current scheme: ' + s);
                    }
                    var us = this;
                    $(data.div + ' .' + s).each(function() {
                        log.debug('Colour switcher init each: ' + s + ' fn: ' + us.setScheme.length);
                        $(this).click({scheme: s, us: us}, us.setScheme);
                    });
                }
            },
            setScheme: function(event) {
                event.preventDefault();
                log.debug('Colour switcher setScheme scheme: ' + event.data.scheme);
                log.debug('Colour switcher setScheme(before) our scheme: ' + event.data.us.scheme);
                // Switch over the CSS classes on the body.
                var prefix = 'essential-colours-';
                event.data.us.$element.removeClass(prefix + event.data.us.scheme).addClass(prefix + event.data.scheme);
                // Update the current colour.
                event.data.us.scheme = event.data.scheme;
                // Store the users selection (Uses AJAX to save to the database).
                // Core YUI function, so only need to replace if core changes.
                M.util.set_user_preference('theme_essential_colours', event.data.us.scheme);
                log.debug('Colour switcher setScheme(after) our scheme: ' + event.data.us.scheme);
            }
        };

        var old = $.fn.ColoursSwitcher

        $.fn.ColoursSwitcher = function(data) {
            this.colourswitcher = new ColoursSwitcher(this);
            this.colourswitcher.init(data);

            return this;
        };

        $.fn.ColoursSwitcher.noConflict = function () {
            $.fn.ColoursSwitcher = old
            return this
        }
    })($);

    return {
        init: function(data) {
            $(document).ready(function($) {
                log.debug('jQuery version: ' + $.fn.jquery);
                return $(document.body).ColoursSwitcher(data);
            });
            log.debug('Essential Colour Switcher AMD init');
        }
    }
});
/* jshint ignore:end */