<template>
    <vl-map :load-tiles-while-animating="true" :load-tiles-while-interacting="true"
            data-projection="EPSG:4326" style="height: 300px;">
        <vl-view :zoom.sync="zoom" :center.sync="center" :rotation.sync="rotation"></vl-view>

        <vl-geoloc @update:position="geolocPosition = $event">
            <template slot-scope="geoloc">
                <vl-feature v-if="geoloc.position" id="position-feature">
                    <vl-geom-point :coordinates="geoloc.position"></vl-geom-point>
                    <vl-style-box>
                        <vl-style-icon src="_media/marker.png" :scale="0.4" :anchor="[0.5, 1]"></vl-style-icon>
                    </vl-style-box>
                </vl-feature>
            </template>
        </vl-geoloc>

        <vl-layer-tile id="osm">
            <vl-source-osm></vl-source-osm>
        </vl-layer-tile>
    </vl-map>
</template>


<script>
    export default {
        data() {
            return {
                zoom: 18,
                center: [0, 0],
                rotation: 0,
                geolocPosition: undefined,
            }
        },
        watch: {
            userPosition: function() {
                this.center = this.getUserPosition();
            }
        },
        computed: {
            userPosition: function() {
                return this.geolocPosition
            }
        },
        methods: {
            getUserPosition: function() {
                return this.geolocPosition;
            }
        }
    }
</script>
