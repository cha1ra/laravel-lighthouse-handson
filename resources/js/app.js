require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import { ApolloClient, createHttpLink, InMemoryCache } from '@apollo/client/core'
import { DefaultApolloClient } from '@vue/apollo-composable'

// HTTP connection to the API
const httpLink = createHttpLink({
  // You should use an absolute URL here
  uri: 'http://localhost/graphql',
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache,
})

const el = document.getElementById('app');

createApp({
    setup () {
      provide(DefaultApolloClient, apolloClient)
    },
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });
