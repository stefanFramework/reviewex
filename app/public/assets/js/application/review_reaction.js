(function (window) {

    function ReviewReactionManager() {
        this.likeUrl = '';
        this.dislikeUrl = '';

        this.unlikeUrl = '';
        this.undislikeUrl = '';

        this.securityToken = '';

        this.requestMaker = null;

        this.ids = {
            wrapperElement: '#social-',
            likeElement: '.review-like',
            dislikeElement: '.review-dislike',
            unlikeElement: '.review-unlike',
            undislikeElement: '.review-undislike'
        }
    }

    ReviewReactionManager.prototype.init = function () {
        var self = this;
        $(self.ids.likeElement).click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            self._likeReview(id);
        });

        $(self.ids.dislikeElement).click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            self._dislikeReview(id);
        });

        $(self.ids.unlikeElement).click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            self._unlikeReview(id);
        });

        $(self.ids.undislikeElement).click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            self._undislikeReview(id);
        });
    };

    ReviewReactionManager.prototype._likeReview = function (id) {
        var self = this;

        if (self._comesFromPreviousDislike()) {
            self._makeRequest(self.undislikeUrl.replace('ID', id)).then(function () {
                $('#social-' + id + ' ' + self.ids.undislikeElement).hide();
                $('#social-' + id + ' ' + self.ids.dislikeElement).show();
            });
        }

        self._makeRequest(self.likeUrl.replace('ID', id)).then(function () {
            self._toggleLikeElement(id,true);
        });
    };

    ReviewReactionManager.prototype._dislikeReview = function (id) {
        var self = this;

        if (self._comesFromPreviousLike()) {
            self._makeRequest(self.unlikeUrl.replace('ID', id)).then(function () {
                self._toggleLikeElement(id,false);
            });
        }

        self._makeRequest(self.dislikeUrl.replace('ID', id)).then(function () {
            self._toggleDislikeElement(id,true);
        });
    };

    ReviewReactionManager.prototype._unlikeReview = function (id) {
        var self = this;

        self._makeRequest(self.unlikeUrl.replace('ID', id)).then(function () {
            self._toggleLikeElement(id,false);
        });
    };

    ReviewReactionManager.prototype._undislikeReview = function (id) {
        var self = this;

        self._makeRequest(self.undislikeUrl.replace('ID', id)).then(function () {
            self._toggleDislikeElement(id,false)
        });
    };

    ReviewReactionManager.prototype._toggleLikeElement = function (id, toggleForLike) {
        if (toggleForLike) {
            $(this.ids.wrapperElement + id + ' ' + this.ids.likeElement).hide();
            $(this.ids.wrapperElement + id + ' ' + this.ids.unlikeElement).show();
            return;
        }

        $(this.ids.wrapperElement + id + ' ' + this.ids.likeElement).show();
        $(this.ids.wrapperElement + id + ' ' + this.ids.unlikeElement).hide();
    }

    ReviewReactionManager.prototype._toggleDislikeElement = function (id, toggleForDislike) {
        if (toggleForDislike) {
            $(this.ids.wrapperElement + id + ' ' + this.ids.dislikeElement).hide();
            $(this.ids.wrapperElement + id + ' ' + this.ids.undislikeElement).show();
            return;
        }

        $(this.ids.wrapperElement + id + ' ' + this.ids.dislikeElement).show();
        $(this.ids.wrapperElement + id + ' ' + this.ids.undislikeElement).hide();
    }

    ReviewReactionManager.prototype._comesFromPreviousDislike = function () {
        return this._isVisible(this.ids.undislikeElement);
    }

    ReviewReactionManager.prototype._comesFromPreviousLike = function () {
        return this._isVisible(this.ids.unlikeElement);
    }

    ReviewReactionManager.prototype._isVisible = function (element) {
        return $(element).is(':visible');
    }


    ReviewReactionManager.prototype._makeRequest = function (url) {
        var self = this;
        return self.requestMaker.request(url, {
            _token: self.securityToken
        });
    };


    window.reviewex = window.reviewex || {};
    window.reviewex.review = window.reviewex.review || {};
    window.reviewex.review.ReviewReactionManager = ReviewReactionManager;

})(window);
