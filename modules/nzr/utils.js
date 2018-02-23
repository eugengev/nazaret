/**
 * Created by kuranov on 31.01.15.
 */
window.nzr = window.nzr || {};
window.nzr.utils = (function(){
    return {

        compileTemplate: function (selector) {
            return doT.template($(selector).html());
        },

        gramsToKilos: function (grams) {
            var kilos = Math.round(grams / 10) / 100;
            return kilos;
        },

        getAgeGroup: function(months) {
            var group = 'young';
            if (months >= 1 * 12) {
                group = 'adult';
            }
            if (months >= 7 * 12) {
                group = 'mature';
            }
            return group;
        },

        formatWeight: function(weight, kilos) {
            if (typeof kilos === 'undefined') {
                kilos = true;
            }

            if (kilos) {
                var data = {
                    value: weight,
                    unit: 'кг',
                    formatted: weight + ' кг'
                };
                if (weight < 0.5) {
                    data.unit = 'г';
                    data.value = weight * 1000;
                    data.formatted = data.value + ' ' + data.unit;
                }
            } else {
                var data = {
                    value: weight,
                    unit: 'г',
                    formatted: weight + ' г'
                };
                if (weight > 500) {
                    data.unit = 'кг';
                    data.value = Math.round(weight / 10) / 100;
                    data.formatted = data.value + ' ' + data.unit;

                }
            }

            return data;
        },

        formatPrice: function(price) {
            var rezprice = '';
            if (price > 0) {
                var prices = price.toFixed(2).toString();
                if (prices.indexOf('.')) { rezprice = prices.replace('.','-'); }
            } else { rezprice = '0-00'; }
            return rezprice;
        },

        bindCloseOnBodyClick: function(eventName, element, removeFlag, cb) {
            if (!eventName.match(/^click\./)) {
                eventName = 'click.' + eventName;
            }
            var eventNs = eventName.split('.')[1];
            removeFlag = !!removeFlag;
            $('body').on(eventName, function(event) {
                var parents = $(event.target).parents(),
                    selfClick = false,
                    checkArray = [event.target].concat(parents.toArray());

                for (var i = 0; i < checkArray.length; i++) {
                    if (checkArray[i] === element) {
                        selfClick = true;
                        break;
                    }
                }
                if(!selfClick) {
                    if (removeFlag) {
                        $(document).off('.'+eventNs);
                        $('body').off(eventName);
                        $(element).remove();
                    } else {
                        $(element).hide();
                    }
                    if(typeof cb == 'function') {
                        cb();
                    }
                }
            });
        },

        bindCloseOnEscKeypressed: function(eventName, element, removeFlag, cb) {
            if (!eventName.match(/^keyup\./)) {
                eventName = 'keyup.' + eventName;
            }
            var eventNs = eventName.split('.')[1];
            removeFlag = !!removeFlag;
            $(document).on(eventName, function(e) {
                if (e.keyCode == 27) {
                    if (removeFlag) {
                        $(document).off('.'+eventNs);
                        $(element).remove();
                    } else {
                        $(element).hide();
                    }
                    if(typeof cb == 'function') {
                        cb();
                    }
                }
            });
        },

        bindEscKeypressed: function(eventName, cb) {
            if (!eventName.match(/^keyup\./)) {
                eventName = 'keyup.' + eventName;
            }
            var eventNs = eventName.split('.')[1];

            $(document).on(eventName, function(e) {
                if (e.keyCode == 27) {
                    $(document).off('.'+eventNs);
                    if(typeof cb == 'function') {
                        cb();
                    }
                }
            });
        },

        pluralize: function (number, titles) {
            var cases = [2, 0, 1, 1, 1, 2];
            return titles[ (number % 100 > 4 && number % 100 < 20) ? 2 : cases[(number % 10 < 5) ?number % 10 : 5]];
        }
    };
})();
