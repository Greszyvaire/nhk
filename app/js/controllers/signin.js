app.controller('siteCtrl', function ($scope, Data, toaster, $state) {
    
     var DirUrl ='ProjectKerja/sahidmontana_cp/dua/';
    var Exten='.html';
    $scope.authError = null;

    $scope.login = function (form) {
        $scope.authError = null;

        Data.post(DirUrl+'appsite/login/'+Exten, form).then(function (result) {
            if (result.status == 0) {
                $scope.authError = result.errors;
            } else {
                $state.go('app.dashboard');
            }
        });
    };
})
