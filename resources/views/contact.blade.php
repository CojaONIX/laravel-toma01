@extends('layout')

@section('title', 'Contact')
 
@section('content')

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni deleniti porro tenetur est ad fugiat, aspernatur optio maxime laudantium cupiditate totam cum consequuntur nam non natus dolorem. Aperiam sit deserunt eos voluptatum, dignissimos excepturi corporis sunt facilis voluptatem ducimus esse omnis exercitationem consequuntur obcaecati iure aliquid ipsam? Eaque, corrupti. Et, minima iure esse impedit itaque dignissimos magnam mollitia consectetur inventore ex nesciunt quod totam repudiandae ut iusto. Dicta maiores fugiat suscipit asperiores animi veniam voluptatibus voluptatem voluptate laboriosam necessitatibus, ullam ipsa. Quaerat, nesciunt eius consequuntur, inventore odio ea ex saepe iusto dolores nihil repellendus tempora quae ducimus? Cupiditate, fugit illum!</p>
    
    <div class="row">
        <div class="col-6">
            <form method="post" action="/contact">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email:" autofocus value="">
                    <label for="email">Email:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject:" value="">
                    <label for="name">Subject:</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Message:" id="message" name="message" style="height: 200px"></textarea>
                    <label for="message">Message:</label>
                </div>
                
                <button class="btn btn-outline-primary col-12 my-3" type="submit">Send</button>
            </form>
        </div>
        <div id="myMap" class="col-6" style="border:1px solid black; height: 400px;"></div>
    </div>
@endsection

@section('js')
    <script>

        function myMap() {
            var mapCanvas = document.getElementById("myMap");
            var myCenter = new google.maps.LatLng(43.53787540426466, 21.700925189985583);

            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP, // ROADMAP | TERRAIN | SATELLITE | HYBRID
                center: myCenter,
                zoom: 12,
                disableDefaultUI: true,
                panControl: true,
                zoomControl: true,
                fullscreenControl: true,
                //fullscreenControlOptions: {index: 100, position: google.maps.ControlPosition.RIGHT_TOP},		
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                overviewMapControl: false,
                rotateControl: false  
            };
            var map = new google.maps.Map(mapCanvas, mapOptions);
            marker = new google.maps.Marker({position: myCenter, map: map});
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOM3JgjQqCsQGClTP3QVIcbWIcCkuEKog&callback=myMap"></script>
@endsection