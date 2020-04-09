var app = angular.module('app');
app.controller('review-controller', function ($scope, $uibModalInstance, data, $uibModal, $http){
     console.log("modal data: ", data);
     var reviews = data.reviews;
     if(reviews==="null"){
          reviews = [];
     }
     $scope.reviews = reviews;
     $scope.getNumber = function(num) {
          return Number(num);   
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
             }).catch(function(reason) {
               console.log("Modal dismissed with reason", reason);
           });
      }
     
        $scope.cancel = function(){
          $uibModalInstance.close("Ok");
        } 
     })
     app.controller('write-review-controller', function ($scope,$http, $uibModalInstance, attraction){
          console.log("New review opened");
          $scope.reviewData = {attraction:attraction, date: new Date()+""}
          $scope.submitReview = function(){
               console.log("data: ", $scope.reviewData);
               
               $http({
                    method: "POST",
                    url: "server/places/reviews/insert.php",
                    data: $scope.reviewData
                }).then(function (response) {
                    console.log("Review Created! ", response);
                    $uibModalInstance.close();

                }, function (error) {
                    console.error(error);
                });
          }
          $scope.cancel = function(){
               $uibModalInstance.dismiss();
             } 
     })