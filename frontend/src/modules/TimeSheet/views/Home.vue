<script>
import Navigation from "@/components/Navigation/Navigation.vue";
import moment from "moment";


export default {
  name: "Home",
  components: {Navigation},

  data: () => ({


    startDate: new Date(new Date().getFullYear(), new Date().getMonth(), 1),
    endDate: new Date(),
    employerData: [],
    internalDateEnd: null,
    internalDateStart: null,
    componentKey: 0,
    headers: [
      {title: 'Name', value: "employerName"},
      {title: 'Datum', value: "date"},
      {title: 'Uhrzeit', key: 'uhrzeit', sortable: false},
      {title: 'Duration', key: 'duration', sortable: false},
      //  {title: 'Status', key: 'actions', sortable: false},
    ],
    loading: true,
    totalItems: 1,
  }),

  methods: {

    forceRerender() {
      this.componentKey += 1;
      console.log(this.componentKey);
    },

    async getEmployerRecords() {
      this.loading = true;
      let date = {
        startDate: moment(this.startDate).format("YYYY-M-D HH:mm:ss"),
        endDate: moment(this.endDate).format("YYYY-M-D HH:mm:ss"),
      }
      await this.$store.dispatch("timeLog/getTheLatestTimeLogOfEmployerBaseOnMonth", date);
      this.employerData = this.$store.state.timeLog.employerTimeRecords;
      this.loading = false;
    },
  },

  computed: {
    FormattedDateEnd() {
      if (this.internalDateEnd != null) {
        this.endDate = this.internalDateEnd;

      }
      this.getEmployerRecords();
      return new Date(this.endDate).toLocaleDateString();
    },

    FormattedDateStart() {
      if (this.internalDateStart != null) {
        this.startDate = this.internalDateStart;
      }
      this.getEmployerRecords();
      return new Date(this.startDate).toLocaleDateString();
    }
  },

  mounted() {
    this.getEmployerRecords();
  },

}
</script>

<template>
  <v-app>
    <Navigation/>
    <v-main>
      <v-row>
        <v-menu
        >
          <template v-slot:activator="{ props }">
            <v-btn
                color="primary"
                v-bind="props"

            >
              {{ FormattedDateStart }}
            </v-btn>
          </template>
          <v-date-picker
              v-model="internalDateStart">
          </v-date-picker>

        </v-menu>
        <v-menu
        >
          <template v-slot:activator="{ props }">
            <v-btn
                color="primary"
                v-bind="props"

            >
              {{ FormattedDateEnd }}
            </v-btn>
          </template>
          <v-date-picker
              v-model="internalDateEnd">
          </v-date-picker>

        </v-menu>
      </v-row>
      <v-data-table-server
          :headers="headers"
          :items="employerData"
          items-length="10"
          :loading
          :key="componentKey">

      </v-data-table-server>
    </v-main>
  </v-app>
</template>

<style scoped>

</style>