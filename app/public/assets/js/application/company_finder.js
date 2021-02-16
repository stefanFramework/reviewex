(function (window) {

    function CompanyFinder(searchUrl, redirectUrl, securityToken) {
        this.searchUrl = searchUrl;
        this.redirectUrl = redirectUrl;
        this.securityToken = securityToken;
        this.ids = {
            menuElement: '#ui-id-1',
            menuHelper: '.ui-helper-hidden-accessible',
            txtCompanySearch: '#companies'
        };
        this.noResultsMessage = '';
    }


    CompanyFinder.prototype.init = function () {
        var self = this;
        var term = '';

        $(this.ids.txtCompanySearch).autocomplete({
            source: function(request, response) {
                self.term = request.term;
                self._getCompanyData(self.term)
                    .then(function (data) {
                        if (data.length === 0) {
                            $(self.ids.menuHelper).hide();
                            response(self._createNoResultsMessage());
                            return;
                        }

                        $(self.ids.menuHelper).hide();
                        response(data);
                    });
            },
            minLength: 2,
            select: function( event, ui ) {
                if (ui.item.value === self.noResultsMessage) {
                    ui.item.value = '';
                    return;
                }
                var finalUrl = self.redirectUrl.replace('CODE', ui.item.code);
                window.location.replace(finalUrl);
            }, open: function (event, ui) {
                var menuElement = $(self.ids.menuElement);
                var styledTerm = "<span class='ui-autocomplete-term'>" + self.term + "</span>";

                menuElement.find('li').each(function() {
                    var divElement = $(this).find('div');
                    var htmlTerm = divElement.html();
                    var regEx = new RegExp(self.term, "ig");
                    divElement.html(htmlTerm.replace(regEx, styledTerm));
                });
            }
        });

        $(this.ids.txtCompanySearch).autocomplete( "option", "appendTo", ".search-form" );
    };

    CompanyFinder.prototype._createNoResultsMessage = function () {
        return [{label: this.noResultsMessage, value: this.noResultsMessage}];
    }

    CompanyFinder.prototype._getCompanyData = function (term) {
        var self = this;
        return new Promise(function (resolve, reject) {
            $.ajax({
                type: "post",
                url: self.searchUrl,
                dataType: "json",
                data: {
                    term: term,
                    _token: self.securityToken
                },
            }).done(function (result) {
                resolve(result);
            }).fail(function (err) {
                reject(err);
            });
        });
    }


    window.reviewex = window.reviewex || {};
    window.reviewex.company = window.reviewex.company || {};
    window.reviewex.company.CompanyFinder = CompanyFinder;

})(window);
