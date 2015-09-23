'use strict';

angular.module('DropboxControllers', ['dropbox-picker'])

    .config(['DropBoxSettingsProvider', function(DropBoxSettingsProvider) {

      // Configure the options
        DropBoxSettingsProvider.configure({
            linkType: 'direct',//dropbox link type
            multiselect: true,//dropbox multiselect
            extensions: ['.pdf', '.doc', '.docx'],//dropbox file extensions
            box_clientId: 'o5cbyxnqlpbqvzm8x2tal8mvwh386hcj',// box CLient Id
            box_linkType: 'direct',//box link type
            box_multiselect: 'true'//box multiselect
          });
    }])

    .controller('DropBoxCtrl', ['$scope', 'DropBoxSettings', function($scope, DropBoxSettings) {
        $scope.dpfiles = [];
        $scope.remove = function(idx){
            $scope.dpfiles.splice(idx,1);
            }
        $scope.boxfiles = [];
        $scope.removeboxfiles = function(idx){
            $scope.boxfiles.splice(idx,1);
            }

    }]);