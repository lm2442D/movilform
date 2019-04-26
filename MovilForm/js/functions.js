var map;
var Santiago_lng = -70.6472400;
var Santiago_lat = -33.4726900;

//var directionsDisplay = new google.maps.DirectionsRendered({polylineOptions:{strokeColor:'#2E9AFE'}});
//var directionsService= new google.maps.DirectionsService();

function start_map()
{
    map=new google.maps.Map(document.getElementById('map'),
    {center: {lat: Santiago_lat,lng: Santiago_lng},
    zoom: 4  
    });

}

function get_my_location()
{
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position){
            $('#my_lat').val(position.coords.latitude);
            $('#my_lng').val(position.coords.longitude);
            var pos={
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var maker = new google.maps.Marker({
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP,
                position: pos
            });

        })
    }
}