<script>
export default {
  name: "Navigation"
}
</script>

<template>
  <v-app-bar>
    <v-toolbar>
      <v-toolbar-title>
        TimeSheet
      </v-toolbar-title>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-view-dashboard-outline"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-calendar-blank-outline"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-account"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn to="/timeLogs">
          <v-icon icon="mdi mdi-chart-bar"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-clock-time-three-outline"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-cog-outline"/>
        </v-btn>
      </v-toolbar-items>
      <v-toolbar-items>
        <v-btn>
          <v-icon icon="mdi mdi-help-circle-outline"/>
        </v-btn>
      </v-toolbar-items>
    </v-toolbar>
  </v-app-bar>
</template>

<style scoped>

</style>