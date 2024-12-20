
    $(document).ready(function() {

        // ******************user****************//
        setInterval(function() {
            $.post("noti.php", {
                data: 'get'
            }, function(data) {
                if (data > 0) {
                    $('.noti').show();
                    $(".n-c").text(data);
                }
            });
        }, 1000);

        $(".notify").click(function() {
            $('.noti').hide();
            $.post("noti.php", {
                    update: 'update'
                },
                function(data) {

                });
        });

        // ******************bookings****************//
        setInterval(function() {
            $.post("noti.php", {
                data1: 'get'
            }, function(data) {
                if (data > 0) {
                    $('.noti1').show();
                    $(".n-c1").text(data);
                }
            });
        }, 1000);

        $(".notify1").click(function() {
            $('.noti1').hide();
            $.post("noti.php", {
                    update1: 'update'
                },
                function(data) {

                });
        });

        // ***********************course Registration******************//
        setInterval(function() {
            $.post("noti.php", {
                data2: 'get'
            }, function(data) {
                if (data > 0) {
                    $('.noti2').show();
                    $(".n-c2").text(data);
                }
            });
        }, 1000);

        $(".notify2").click(function() {
            $('.noti2').hide();
            $.post("noti.php", {
                    update2: 'update'
                },
                function(data) {

                });
        });

        // ***********************issues******************//
        setInterval(function() {
            $.post("noti.php", {
                data3: 'get'
            }, function(data) {
                if (data > 0) {
                    $('.noti3').show();
                    $(".n-c3").text(data);
                }
            });
        }, 1000);

        $(".notify3").click(function() {
            $('.noti3').hide();
            $.post("noti.php", {
                    update3: 'update'
                },
                function(data) {

                });
        });
    });
