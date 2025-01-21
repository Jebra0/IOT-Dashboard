<template>

    <side-bare :user="user" :title="title"></side-bare>

    <v-container floid>
        <div class="other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="d-flex justify-center mb-2">Filtering</div>
            <v-row>
                <v-col cols="12" md="3">
                    <div style="">
                        <input v-model="searchRequest.date" style="background-color: #ebebeb; padding: 15px; width: 100%; border-bottom: 1px solid #938c8c" type="date">
                    </div>
                </v-col>
                <v-col cols="12" md="3">
                    <v-text-field v-model="searchRequest.ph"
                                  label="PH sensor"
                                  :error-messages="phErrors"
                                  @input="validatePh"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="3">
                    <v-text-field v-model="searchRequest.temp"
                                  label="Temperature sensor"
                                  :error-messages="tempErrors"
                                  @input="validateTemp"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="3">
                    <v-select
                        v-model="searchRequest.action"
                        label="Action"
                        :items="['Add', 'No']"
                    ></v-select>
                </v-col>
                <v-col  cols="12" class="d-flex justify-center mt-1">
                    <v-btn @click="search(searchRequest)" :disabled="!isFormValid">Search</v-btn>
                </v-col>
            </v-row>
        </div>

        <v-table class=" table other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <thead>
            <tr>
                <th class="text-center">
                    PH Sensor
                </th>
                <th class="text-center">
                    Temperature Sensor
                </th>
                <th class="text-center">
                    Time
                </th>
                <th class="text-center">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="(item, index) in data"
                :key="item.time"
                :class="index % 2 === 0 ? 'gray-row' : ''"
            >
                <td class="text-center">{{ item.ph_sensor.data }}</td>
                <td class="text-center">{{ item.temp_sensor.data }}</td>
                <td class="text-center">{{ this.formatDate(item.created_at) }}</td>
                <td :class="item.decision === 'No'? 'no text-center' : 'add text-center'">
                    {{ item.decision }}
                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script>

export default {
    props: {
        user: {},
        title : String,
    },
    data: ()=>{
        return {
            paginationData: {},
            searchRequest: {
                date: '',
                ph: '',
                temp: '',
                action: ''
            },
            phErrors: [],
            tempErrors: [],
            data: []
        }
    },
    computed: {
        isFormValid() {
            return this.phErrors.length === 0 && this.tempErrors.length === 0;
        }
    },
    methods: {
        async search(request){
            let res = await axios.post('/search', request);
            this.data = res.data.data;
            this.paginationData = res.data;

        },

        async fetchData(page) {
            const response = await axios.get(`/index?page=${page}`);
            this.data = response.data.data;
            this.paginationData = response.data;
            console.log(response.data.current_page)
        },

        validatePh() {
            this.phErrors = [];
            const ph = parseFloat(this.searchRequest.ph);
            if (isNaN(ph) || ph < 1 || ph > 14) {
                this.phErrors.push('pH must be a number between 1 and 14.');
            }
        },
        validateTemp() {
            this.tempErrors = [];
            const temp = parseFloat(this.searchRequest.temp);
            if (isNaN(temp)) {
                this.tempErrors.push('Temperature must be a valid number.');
            }
        },

        formatDate(dateString) {
            const date = new Date(dateString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        },
    },
    // Add a function to format the created_at date

    mounted() {
        this.fetchData();
    }
}
</script>
<style>
.table{
    font-size: 20px;
}
.add{
    background-color:  #32981a;
    color: white;
    padding: 10px;
}
.no{
    background-color: rgba(26, 25, 25, 0.77);
    color: white;
    padding: 10px;
}
</style>
