"use strict";
$(".selectize-close-btn").selectize({
    plugins: ["remove_button"],
    persist: !1,
    create: !0,
    render: {
        item: function (e, t) {
            return '<div>"' + t(e.text) + '"</div>'
        }
    }
});
