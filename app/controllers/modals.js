var app = angular.module('app');
app.controller('review-controller', function ($scope, $uibModalInstance, data, $uibModal, $http){
     console.log("modal data: ", data);
     $scope.totalRating = data.totalRating;
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
           var reviewAmount = $scope.reviews.length +1;
           var review = {attraction: data.attraction, totalRating:$scope.totalRating, reviewAmount:reviewAmount};
           var modalInstance = $uibModal.open({
               animation: false,
               templateUrl: 'views/user/modals/reviews/write-review.html',
               controller: 'write-review-controller',
               backdrop: 'static',
               size: 'md',
               resolve: {
                    review: function () {
                      return review;
                    }
                  }
           });
           modalInstance.result.then(function(response){
               $scope.totalRating = response;
               console.log(response);
               
               $http({
                    method: "POST",
                    url: "server/places/reviews/fetch.php",
                    data: { attraction:data.attraction}
                })
                    .then(function (response) {
                        console.log("Response: ", response.data);
                        $scope.reviews = response.data;
        
                    }, function (error) {
                        console.error(error);
                    });
             }).catch(function(reason) {
               console.log("Modal dismissed with reason", reason);
           });
      }
     
        $scope.cancel = function(){
          $uibModalInstance.close($scope.totalRating);
        } 
     })
     app.controller('write-review-controller', function ($scope,$http, $uibModalInstance, review){
          console.log("New review opened");
          $scope.reviewData = {attraction:review.attraction, date: new Date()+""};
          $scope.submitReview = function(){
               console.log("data: ", $scope.reviewData);
               var newRating =  ((Number(review.totalRating)+$scope.reviewData.rating)/review.reviewAmount).toFixed(2);
               $scope.reviewData = Object.assign($scope.reviewData, {newRating:newRating});
               $http({
                    method: "POST",
                    url: "server/places/reviews/insert.php",
                    data: $scope.reviewData
                }).then(function (response) {
                    console.log("Review Created! ", response);
                    $uibModalInstance.close(newRating);

                }, function (error) {
                    console.error(error);
                });
          }
          $scope.cancel = function(){
               $uibModalInstance.dismiss();
             } 
     })