
    <!-- Javascript -->
    <script type="text/javascript" src="assets/pages/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="assets/pages/js/jquery.noconflict.js"></script>
    <script type="text/javascript" src="assets/pages/js/modernizr.2.7.1.min.js"></script>
    <script type="text/javascript" src="assets/pages/js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/pages/js/jquery.placeholder.js"></script>
    <script type="text/javascript" src="assets/pages/js/jquery-ui.1.10.4.min.js"></script>

    <!-- Twitter Bootstrap -->
    <script type="text/javascript" src="assets/pages/js/bootstrap.js"></script>

    <!-- load revolution slider scripts -->
    <script type="text/javascript" src="assets/pages/components/revolution_slider/js/jquery.themepunch.tools.min.js">
    </script>
    <script type="text/javascript"
        src="assets/pages/components/revolution_slider/js/jquery.themepunch.revolution.min.js"></script>

    <!-- load BXSlider scripts -->
    <script type="text/javascript" src="assets/pages/components/jquery.bxslider/jquery.bxslider.min.js"></script>

    <!-- load FlexSlider scripts -->
    <script type="text/javascript" src="assets/pages/components/flexslider/jquery.flexslider-min.js"></script>


    <script type="text/javascript" src="assets/pages/js/calendar.js"></script>

    <!-- parallax -->
    <script type="text/javascript" src="assets/pages/js/jquery.stellar.min.js"></script>

    <!-- waypoint -->
    <script type="text/javascript" src="assets/pages/js/waypoints.min.js"></script>

    <!-- load page Javascript -->
    <script type="text/javascript" src="assets/pages/js/theme-scripts.js"></script>

    <script type="text/javascript">
    tjq(document).ready(function() {
        // calendar panel
        var cal = new Calendar();
        var unavailable_days = [17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
        var price_arr = {
            3: '$170',
            4: '$170',
            5: '$170',
            6: '$170',
            7: '$170',
            8: '$170',
            9: '$170',
            10: '$170',
            11: '$170',
            12: '$170',
            13: '$170',
            14: '$170',
            15: '$170',
            16: '$170',
            17: '$170'
        };

        var current_date = new Date();
        var current_year_month = (1900 + current_date.getYear()) + "-" + (current_date.getMonth() + 1);
        tjq("#select-month").find("[value='" + current_year_month + "']").prop("selected", "selected");
        cal.generateHTML(current_date.getMonth(), (1900 + current_date.getYear()), unavailable_days, price_arr);
        tjq(".calendar").html(cal.getHTML());

        tjq("#select-month").change(function() {
            var selected_year_month = tjq("#select-month option:selected").val();
            var year = parseInt(selected_year_month.split("-")[0], 10);
            var month = parseInt(selected_year_month.split("-")[1], 10);
            cal.generateHTML(month - 1, year, unavailable_days, price_arr);
            tjq(".calendar").html(cal.getHTML());
        });


        tjq(".goto-writereview-pane").click(function(e) {
            e.preventDefault();
            tjq('#hotel-features .tabs a[href="#hotel-write-review"]').tab('show')
        });

        // editable rating
        tjq(".editable-rating.five-stars-container").each(function() {
            var oringnal_value = tjq(this).data("original-stars");
            if (typeof oringnal_value == "undefined") {
                oringnal_value = 0;
            } else {
                //oringnal_value = 10 * parseInt(oringnal_value);
            }
            tjq(this).slider({
                range: "min",
                value: oringnal_value,
                min: 0,
                max: 5,
                slide: function(event, ui) {

                }
            });
        });
    });

    tjq('a[href="#map-tab"]').on('shown.bs.tab', function(e) {
        var center = panorama.getPosition();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);

        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'),
            panoramaOptions);
        map.setStreetView(panorama);
    });
    tjq('a[href="#steet-view-tab"]').on('shown.bs.tab', function(e) {
        fenway = panorama.getPosition();
        panoramaOptions.position = fenway;
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'),
            panoramaOptions);
        map.setStreetView(panorama);
    });
    var map = null;
    var panorama = null;
    var fenway = new google.maps.LatLng(48.856614, 2.352222);
    var mapOptions = {
        center: fenway,
        zoom: 12
    };
    var panoramaOptions = {
        position: fenway,
        pov: {
            heading: 34,
            pitch: 10
        }
    };

    function initialize() {
        tjq("#map-tab").height(tjq("#hotel-main-content").width() * 0.6);
        map = new google.maps.Map(document.getElementById('map-tab'), mapOptions);
        panorama = new google.maps.StreetViewPanorama(document.getElementById('steet-view-tab'), panoramaOptions);
        map.setStreetView(panorama);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>