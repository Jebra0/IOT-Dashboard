<template>
    <v-card>
        <v-layout>
            <v-app-bar
                color="white"
                prominent
            >
                <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

                <v-toolbar-title>{{title}}</v-toolbar-title>

                <iframe src="https://free.timeanddate.com/clock/i9cvc1tf/n53/tleg/fs20/ftb/bo2/pa5/th2"
                        width="128"
                        height="35"
                        class="time d-flex justify-content-center"
                ></iframe>

            </v-app-bar>
            <v-navigation-drawer
                v-model="drawer"
                temporary
            >
                <v-list>
                    <v-list-item
                        :subtitle="user.email"
                        :title="user.name"
                        @click="navigateToProfile"
                    >
                        <template v-slot:prepend>
                            <v-icon size="35" class="pr-3">mdi-account-circle</v-icon>
                        </template>
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list density="compact" nav>
                    <v-list-item title="Dashboard" value="dashboard" @click="navigateToDashboard">
                        <template v-slot:prepend>
                            <v-icon size="35" class="pr-3">mdi-monitor-dashboard</v-icon>
                        </template>
                    </v-list-item>
                    <v-list-item  title="Analytics" @click="navigateToAnalytics">
                        <template v-slot:prepend>
                            <v-icon size="35" class="pr-3">mdi-poll</v-icon>
                        </template>
                    </v-list-item>
                    <v-list-item title="Action Log" @click="navigateToActions">
                        <template v-slot:prepend>
                            <v-icon size="35" class="pr-3">mdi-history</v-icon>
                        </template>
                    </v-list-item>
                    <v-list-item title="Log Out" @click="logOut">
                        <template v-slot:prepend>
                            <v-icon size="35" class="pr-3">mdi-logout</v-icon>
                        </template>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>
        </v-layout>
    </v-card>
</template>
<script>
import axios from "axios";

export default {
    props: {
        user: {},
        title : String,
    },
    data() {
        return {
            drawer: false,
        }
    },
    methods: {
        async navigateToProfile() {
            await axios.get('/profile').then(window.location.href = '/profile');
        },
        async navigateToDashboard() {
            await axios.get('/dashboard').then(window.location.href = '/dashboard');
        },
        async navigateToAnalytics() {
            await axios.get('/analytics').then(window.location.href = '/analytics');
        },
        async navigateToActions() {
            await axios.get('/actions').then(window.location.href = '/actions');
        },
        async logOut() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')
                .getAttribute('content');

           await axios.post('/logout', this.user, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
            }).then(window.location.href = '/login');
        }
    }
}
</script>
<style >
.time{
    margin-right: 20px;
}
</style>
