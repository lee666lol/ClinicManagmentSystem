<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Custom Controls</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      let map;
      const chicago = { lat: 41.85, lng: -87.65 };

      /**
       * Creates a control that recenters the map on Chicago.
       */
      function createCenterControl(map) {
        const controlButton = document.createElement("button");
        // Set CSS for the control.
        controlButton.classList.add('buttonStyle');

        controlButton.textContent = "Center Map";
        controlButton.title = "Click to recenter the map";
        controlButton.type = "button";
        // Setup the click event listeners: simply set the map to Chicago.
        controlButton.addEventListener("click", () => {
          map.setCenter(chicago);
        });
        return controlButton;
      }

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: { lat: 49.496675, lng: -102.65625 },
        });

        var georssLayer = new google.maps.KmlLayer({
          url: "http://api.flickr.com/services/feeds/geo/?g=322338@N20&lang=en-us&format=feed-georss",
        });
        georssLayer.setMap(map);

        // Create the DIV to hold the control.
        const centerControlDiv = document.createElement("div");
        // Create the control.
        const centerControl = createCenterControl(map);

        // Append the control to the DIV.
        centerControlDiv.appendChild(centerControl);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(
          centerControlDiv
        );
      }

      window.initMap = initMap;
    </script>
    <style>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      /** 
       * Always set the map height explicitly to define the size of the div element
       * that contains the map. 
       */
      #map {
        height: 100%;
      }

      /** 
       * Optional: Makes the sample page fill the window. 
       */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7967.19843124024!2d101.734869739789!3d3.199494987102843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38253567068d%3A0xb73ce055457b55c0!2sWangsa%20Maju%2C%2053300%20Kuala%20Lumpur%2C%20Federal%20Territory%20of%20Kuala%20Lumpur!5e0!3m2!1sen!2smy!4v1683678260329!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </body>
</html>