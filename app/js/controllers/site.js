app.controller('siteCtrl', function ($scope, Data, toaster, $state) {
    $scope.authError = null;

    $scope.login = function (form) {
        $scope.authError = null;

        Data.post('appsite/login', form).then(function (result) {
            if (result.status == 0) {
                $scope.authError = result.errors;
            } else {
                //cek warna di session
                Data.get('appsite/session').then(function (data) {
                    if (typeof data.data.user != "undefined" && data.data.user.settings!=null) {
                        $scope.app.settings = data.data.user.settings;
                    } else { //default warna jika tidak ada setingan
                        $scope.app.settings = {
                            themeID: 11,
                            navbarHeaderColor: 'bg-primary',
                            navbarCollapseColor: 'bg-primary',
                            asideColor: 'bg-dark',
                        };
                    }
                });
                
                $state.go('app.dashboard');
            }
        });
    };
})
