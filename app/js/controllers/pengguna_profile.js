app.controller('penggunaProfileCtrl', function($scope, Data, toaster) {

   
    Data.get('pengguna/profile').then(function(data) {
        $scope.form = data.data;
    });

    $scope.save = function(form) {
        var url = 'pengguna/update/' + form.id;
        form.settings = $scope.app.settings;
        Data.post(url, form).then(function(result) {
            if (result.status == 0) {
                toaster.pop('error', "Terjadi Kesalahan", result.errors);
            } else {
                $scope.is_edit = false;
                toaster.pop('success', "Berhasil", "Data berhasil tersimpan, sebaiknya anda melakukan logout applikasi kemudian login kembali, untuk memastikan perubahan benar - benar terjadi.");
            }
        });
    };


})
