import './style.css'
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

import {createApp} from 'vue';
import App from './App.vue';
import router from './router';
import store from "./store";
import {createVuetify} from 'vuetify';
import {registerModules} from "./register-modules";

const vuetify = createVuetify({
    components,
    directives,
});

import loginModule from "./modules/login";
import dashboardModule from "./modules/dashboard";

registerModules({
    login: loginModule,
    dashboard: dashboardModule,
});


const app = createApp(App)
app.use(store)
app.use(router)
app.use(vuetify)
app.mount('#app')
