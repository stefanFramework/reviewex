(function (window) {

    function RequestMaker() {}

    RequestMaker.prototype.request = function (url, data) {
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: "post",
                url: url,
                dataType: "json",
                data: data,
            }).done(function (result) {
                resolve(result);
            }).fail(function (err) {
                reject(err);
            });
        });
    }

    window.reviewex = window.reviewex || {};
    window.reviewex.utils = window.reviewex.utils || {};
    window.reviewex.utils.RequestMaker = RequestMaker;
})(window);
