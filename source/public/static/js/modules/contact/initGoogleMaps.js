(function(){require(["async!http://maps.google.com/maps/api/js?sensor=false"],function(){var e,o,t,a,n;console.log("maps..."),n=[{stylers:[{hue:"#23cefd"}]}],a={map:"#map",footer:"footer",header:"header"},o={},e=function(){o.map=$(a.map),o.footer=$(a.footer),o.header=$(a.header)},e(),t={setMapHeight:function(){var e,t,a;return console.log("set map height"),t=o.header.outerHeight(),e=o.footer.outerHeight(),a=$(window).height()-t-e,console.log(t),console.log(e),console.log($(window).height()),o.map.height(a),$("#section-1__contact").height(a-50)},initMap:function(){var e,o,a;t.setMapHeight(),a=new google.maps.StyledMapType(n),e=new google.maps.Map(document.getElementById("map"),{center:{lat:-12.0907838,lng:-77.0386785},zoom:15,mapTypeControlOptions:{mapTypeIds:[google.maps.MapTypeId.ROADMAP,"map_style"]}}),o=new google.maps.Marker({position:{lat:-12.0907838,lng:-77.0386785},map:e,animation:google.maps.Animation.DROP,icon:"img/pin.png"}),e.mapTypes.set("map_style",a),e.setMapTypeId("map_style")}},t.initMap()})}).call(this);