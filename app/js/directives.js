/* loader ajax */
angular.module('app')
        .directive('uiButterbar', ['$rootScope', '$anchorScroll', function ($rootScope, $anchorScroll) {
                return {
                    restrict: 'AC',
                    template: '<span class="bar"></span>',
                    link: function (scope, el, attrs) {
                        el.addClass('butterbar hide');
                        scope.$on('$stateChangeStart', function (event) {
                            $anchorScroll();
                            el.removeClass('hide').addClass('active');
                        });
                        scope.$on('$stateChangeSuccess', function (event, toState, toParams, fromState) {
                            event.targetScope.$watch('$viewContentLoaded', function () {
                                el.addClass('hide').removeClass('active');
                            })
                        });
                    }
                };
            }]);

/* Html from JSON*/
angular.module('app')
        .filter('thisHtml', ['$sce', function ($sce) {
                return function (text) {
                    return $sce.trustAsHtml(text);
                };
            }]);

/*pagination text*/
angular.module('app')
        .directive('pageSelect', function () {
            return {
                restrict: 'E',
                template: '<input type="text" class="select-page" ng-model="inputPage" ng-change="selectPage(inputPage)">',
                link: function (scope, element, attrs) {
                    scope.$watch('currentPage', function (c) {
                        scope.inputPage = c;
                    });
                }
            }
        });

/*fullscreen*/
angular.module('app')
        .directive('uiFullscreen', ['$document', '$window', function ($document, $window) {
                return {
                    restrict: 'AC',
                    template: '<i class="fa fa-expand fa-fw text"></i><i class="fa fa-compress fa-fw text-active"></i>',
                    link: function (scope, el, attr) {
                        el.addClass('hide');
                        // disable on ie11
                        if (screenfull.enabled && !navigator.userAgent.match(/Trident.*rv:11\./)) {
                            el.removeClass('hide');
                        }
                        el.on('click', function () {
                            var target;
                            attr.target && (target = $(attr.target)[0]);
                            screenfull.toggle(target);
                        });
                        $document.on(screenfull.raw.fullscreenchange, function () {
                            if (screenfull.isFullscreen) {
                                el.addClass('active');
                            } else {
                                el.removeClass('active');
                            }
                        });
                    }
                };
            }]);


/*directive print*/
function printDirective() {
    function link(scope, element, attrs) {
        element.on('click', function () {
            var elemToPrint = document.getElementById(attrs.printElementId);
            if (elemToPrint) {
                printElement(elemToPrint);
            }
        });
    }
    function printElement(elem) {
        var popupWin = window.open('', '_blank', 'width=1000,height=700');
        popupWin.document.open()
        popupWin.document.write('<html><head><link rel="stylesheet" type="text/css" href="css/print.css" /></head><body onload="window.print()">' + elem.innerHTML + '</html>');
        popupWin.document.close();
    }
    return {
        link: link,
        restrict: 'A'
    };
}
angular.module('app').directive('ngPrint', [printDirective]);

/*scroll ke atas*/
angular.module('app')
        .directive('uiScroll', ['$location', '$anchorScroll', function ($location, $anchorScroll) {
                return {
                    restrict: 'AC',
                    link: function (scope, el, attr) {
                        el.on('click', function (e) {
                            $location.hash(attr.uiScroll);
                            $anchorScroll();
                        });
                    }
                };
            }]);

/* toogle class */
angular.module('app')
        .directive('uiToggleClass', ['$timeout', '$document', function ($timeout, $document) {
                return {
                    restrict: 'AC',
                    link: function (scope, el, attr) {
                        el.on('click', function (e) {
                            e.preventDefault();
                            var classes = attr.uiToggleClass.split(','),
                                    targets = (attr.target && attr.target.split(',')) || Array(el),
                                    key = 0;
                            angular.forEach(classes, function (_class) {
                                var target = targets[(targets.length && key)];
                                (_class.indexOf('*') !== -1) && magic(_class, target);
                                $(target).toggleClass(_class);
                                key++;
                            });
                            $(el).toggleClass('active');

                            function magic(_class, target) {
                                var patt = new RegExp('\\s' +
                                        _class.
                                        replace(/\*/g, '[A-Za-z0-9-_]+').
                                        split(' ').
                                        join('\\s|\\s') +
                                        '\\s', 'g');
                                var cn = ' ' + $(target)[0].className + ' ';
                                while (patt.test(cn)) {
                                    cn = cn.replace(patt, ' ');
                                }
                                $(target)[0].className = $.trim(cn);
                            }
                        });
                    }
                };
            }]);