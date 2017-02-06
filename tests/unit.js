describe('Controller functions', function() {

    var myCtrl,scope;

    beforeEach(module('app'));

    describe('User inputs',function() {

        beforeEach(inject(function ($controller,$rootScope) {

            scope = $rootScope.$new();
            myCtrl = $controller('myCtrl',{
                $scope: scope
            });
        }));

        it('Allow only ten frames as input', function () {

            expect(scope.max_frames(9)).toEqual(true); // Checks whether 9 frames can be entered
            expect(scope.max_frames(12)).toEqual(false); // Checks whether 12 frames can be entered

        });

        it('Should show third roll only in the 10th frame', function () {

            expect(scope.third_roll(5,5,10)).toEqual(true); // Checks whether third roll is shown in the tenth frame
            expect(scope.third_roll(3,5,10)).toEqual(false); // Checks whether third frames is not shown in the tenth frame

        });

    });

    describe('$httpBackend',function () {

        beforeEach(module('app'));

        var $http, $httpBackend, $rootScope,$controller;

        beforeEach(inject(function($injector, $rootScope, $controller, _$httpBackend_, _$http_){

            $http = _$http_;
            $httpBackend = _$httpBackend_;

            scope = $rootScope.$new();
            myCtrl = $controller('myCtrl',{
                $scope: scope
            });

        }));

        it('Should add two rolls', function () {

            var frame1 = '{ "frames": [{"first": 3, "second": 4}] }';
            var getback = {"score":7,"frame":[7],"scoreTillFrame":[7]};

            scope.server_request(frame1);

            // Checks whether POST request can be sent by the frontend
            $httpBackend
                .when('POST', 'api/Server.php', frame1)
                .respond(200,getback);

            $httpBackend.flush();

            expect(scope.score).toEqual(getback.score); // Checks whether POST request sent by the frontend is as expected

        });

    });

});