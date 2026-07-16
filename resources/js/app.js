import * as bootstrap from 'bootstrap'
import moment from 'moment';
import { createApp } from 'vue';
import AuthorizedClients from './components/passport/AuthorizedClients.vue';
import Clients from './components/passport/Clients.vue';
import PersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';
import axios from 'axios';

window.axios = axios;
window.bootstrap = bootstrap;
window.moment = moment;
window.createApp = createApp;

// Mount each component directly onto its placeholder element, rather than
// running one root app over #app's innerHTML. The in-DOM template approach
// invokes Vue's runtime compiler (new Function / eval), which a strict CSP
// without 'unsafe-eval' blocks -- that left the dashboard blank. The .vue
// templates are precompiled by Vite, so mounting each component directly needs
// no runtime compilation and is CSP-safe.
const components = {
    'passport-authorized-clients': AuthorizedClients,
    'passport-clients': Clients,
    'passport-personal-access-tokens': PersonalAccessTokens,
};

for (const [selector, component] of Object.entries(components)) {
    document.querySelectorAll(selector).forEach((el) => {
        createApp(component).mount(el);
    });
}