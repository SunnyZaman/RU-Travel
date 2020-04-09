var app = angular.module('app');
app.controller('review-controller', function ($scope, $uibModalInstance, data, $uibModal){
     console.log("modal data: ", data);
     var reviews = data.reviews;
     if(reviews==="null"){
          reviews = [];
     }
     $scope.reviews = reviews;
     $scope.getNumber = function(num) {
          return new Array(Number(num));   
      }
      $scope.writeReview = function() {
           console.log("Writing a review");
           var attraction = data.attraction;
           var modalInstance = $uibModal.open({
               animation: false,
               templateUrl: 'views/user/modals/reviews/write-review.html',
               controller: 'write-review-controller',
               backdrop: 'static',
               size: 'md',
               resolve: {
                    attraction: function () {
                      return attraction;
                    }
                  }
           });
           modalInstance.result.then(function(response){
               console.log("Modal opened");
             });
      }
      $scope.ok = function(){
          $uibModalInstance.close("Ok");
        } 
        $scope.cancel = function(){
          $uibModalInstance.dismiss();
        } 
     })
     app.controller('write-review-controller', function ($scope, $uibModalInstance, attraction){
          console.log("New review opened");

          $scope.ok = function(){
               $uibModalInstance.close("Ok");
             } 
             $scope.cancel = function(){
               $uibModalInstance.dismiss();
             } 
     })