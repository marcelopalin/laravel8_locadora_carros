<template>
  <v-container>
    <div>
      <v-row no-gutters>
        <v-col cols="4">
          <v-alert border="right" color="blue-grey" dark>
            <span class="pr-6"
              >Clique aqui para abrir localização do Evento no seu Waze:</span
            >

            <!-- https://fonts.google.com/icons?selected=Material+Icons -->
            <v-avatar class="mx-auto" color="orange" size="62">
              <a
                href="https://waze.com/pt-BR/editor?env=row&lat=-20.86521&lon=-49.34607&marker=true&s=1125899977202965&zoomLevel=20"
                target="_blank"
              >
                <v-icon dark> place </v-icon></a
              >
            </v-avatar>
          </v-alert>
        </v-col>
        <v-col class="pl-6" cols="5">
          <v-alert
            color="primary"
            dark
            icon="mdi-vuetify"
            border="left"
            prominent
          >
            Local do Evento: R. Manoel Gabriel de Oliveira, 284 (lat=-20.86521, lon=-49.34607)
          </v-alert>
        </v-col>
      </v-row>
    </div>

    <v-row no-gutters>
      <gmap-map :center="center" :zoom="13" style="width: 90%; height: 600px">
        <gmap-info-window
          :options="infoOptions"
          :position="infoWindowPos"
          :opened="infoWinOpen"
          @closeclick="infoWinOpen = false"
        >
        </gmap-info-window>

        <gmap-marker
          :key="i"
          v-for="(m, i) in markers"
          :position="m.position"
          :clickable="true"
          @click="toggleInfoWindow(m, i)"
        ></gmap-marker>
      </gmap-map>
    </v-row>
  </v-container>
</template>

<script>
// https://diegoazh.github.io/gmap-vue/#testing
export default {
  name: "GoobleMap",
  components: {},
  data: () => ({
    center: {
      lat: -20.81987,
      lng: -49.36505,
    },
    infoWindowPos: null,
    infoWinOpen: false,
    currentMidx: null,

    infoOptions: {
      content: "",
      //optional: offset infowindow so it visually sits nicely on top of our marker
      pixelOffset: {
        width: 0,
        height: -65,
      },
    },
    markers: [
      {
        position: {
          lat: -20.79075,
          lng: -49.35533,
        },
        infoText: "<strong>TG 02-033</strong>",
      },
      {
        position: {
          lat: -20.86489,
          lng: -49.34601,
        },
        infoText: "<strong>Chácara: R. Manoel Gabriel de Oliveira, 284 (lat=-20.86521, lon=-49.34607)</strong>",
      },
    ],
  }),
  methods: {
    toggleInfoWindow: function (marker, idx) {
      this.infoWindowPos = marker.position;
      this.infoOptions.content = marker.infoText;

      //check if its the same marker that was selected if yes toggle
      if (this.currentMidx == idx) {
        this.infoWinOpen = !this.infoWinOpen;
      }

      //if different marker set infowindow to open and reset current marker index
      else {
        this.infoWinOpen = true;
        this.currentMidx = idx;
      }
    },
  },
};
</script>
