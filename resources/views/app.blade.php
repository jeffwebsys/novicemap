<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Google Maps Demo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 1rem 2rem;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h2>Drop PinPoint</h2>
                <div class="map" id="app">
                    <!-- map droplocs goes here -->
                   
                    <gmap-map
                        :center="mapCenter"
                        :zoom="10"
                        style="width: 100%; height: 440px;"
                        @click="handleMapClick"
                        > 
                       
                        
                        
                        <gmap-info-window
                        :options="infoWindowOptions"
                        :position="infoWindowPosition"
                        :opened="infoWindowOpened"
                        @closeclick="handleInfoWindowClose"
                        >
                        <div class="info-window">
                            <h2 v-text="activeDroplocs.name"></h2>
                            <h5 v-text="'Hours:' + activeDroplocs.hours"></h5>
                            <p v-text="activeDroplocs.address"></p>
                            <p v-text="activeDroplocs.city +', '+ activeDroplocs.state"></p>
                        </div>
                        </gmap-info-window>
                       
                       
                    <gmap-marker
                     v-for="(r, index) in droplocs"
                    :key="r.id"
                    :position="getPosition(r)"
                    :clickable="true"
                    :draggable="false"
                    @click="handleMarkerClicked(r)"
                    ></gmap-marker>
                    

                        

                    </gmap-map>


                    <div class="box">
                        <p v-text="'Current Latitude:' + activeDroplocs.latitude"></p>
                        <p v-text="'Current Longitude:' +activeDroplocs.longitude"></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        
    </body>
</html>