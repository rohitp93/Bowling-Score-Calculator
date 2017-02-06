(function () {

    var app = angular.module('app', []);

    app.controller('myCtrl', function ($scope, $http) {

        var round = [];
        var frame = {};
        var score = [];
        var scoretillframe = [];

        $scope.score = score;
        $scope.frame = frame;
        $scope.scoretillframe = scoretillframe;

        $scope.frame.frames = [];

        //To add the entered scores and send them the backend server
        $scope.add = function (first, second, third) {

            if(third != undefined) {
                round = [{"first": parseInt(first), "second": parseInt(second), "third":parseInt(third)}];
                frame.frames = frame.frames.concat(round);

                $scope.server_request(frame);
            }

            else {
                round = [{"first": parseInt(first), "second": parseInt(second)}];
                frame.frames = frame.frames.concat(round);

                $scope.server_request(frame);
            }
        };

        //To send http POST to php script and receive the response
        $scope.server_request = function (send_frame) {

            $http.post("api/Server.php", send_frame)
                .then(function (response) {
                    $scope.score = response.data.score;
                    $scope.perframe = response.data.frame;
                    $scope.scoretillframe = response.data.scoreTillFrame;
                    console.log(response.data);

                });

        };

        //To display third roll only for the tenth frame
        $scope.third_roll = function (f,s,l) {

            var sum = parseInt(f) + parseInt(s);

            if (sum == 10 || f == 10){
                return (l >= 9);
            }
            else {
                return false;
            }
        };

        //To allow only 10 frmaes in a game
        $scope.max_frames = function (l) {

            return (l< 10);
        };

        $scope.frame10 = function(l){

            return(l>=9);
        };
    });

})();