<script>
export default {
  name: "Login",

  data: () => ({
    password: "",
    email: "",
  }),

  computed: {
    loggedIn() {
      console.log(this.$store.state.login.status.loggedIn)
      return this.$store.state.login.status.loggedIn;
    },
  },

  created() {
    if (this.loggedIn) {
      this.$router.push("/dashBoard");
    }
  },

  methods: {
    handleLogin() {
      let user = {email: this.email, password: this.password}
      console.log(user)
      this.loading = true;
      this.$store.dispatch("login/login", user).then(
          () => {
            this.$router.push("/dashboard");
          },
          (error) => {
            this.loading = false;

            this.message =
                (error.response &&
                    error.response.data &&
                    error.response.data.message) ||
                error.message ||
                error.toString();
            console.log(this.message);
          }
      );
    },
  },
}
</script>

<template>
  <v-form @submit.prevent="handleLogin">
    <v-card>
      <v-card-title>
        Login
      </v-card-title>
      <v-card-item>
        <v-text-field
            v-model="email"
            label="Email"
            placeholder="Email address"
            type="email">
        </v-text-field>
        <v-text-field
            v-model="password"
            placeholder="placeholder"
            label="Password"
            :type="password">
        </v-text-field>
        <v-btn type="submit"> Log In</v-btn>
      </v-card-item>
    </v-card>
  </v-form>
</template>

<style scoped>

</style>