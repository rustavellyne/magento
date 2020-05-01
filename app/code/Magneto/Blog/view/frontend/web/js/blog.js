define(['uiComponent',], function(Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Magneto_Blog/blog'
        },
        initialize: function () {
            this._super();
            return this;
        },
        getDate: function (value) {
            let date = new Date(value);
            return `${date.getDate()} ${date.getMonth()} ${date.getFullYear()}`
        },
    })
})