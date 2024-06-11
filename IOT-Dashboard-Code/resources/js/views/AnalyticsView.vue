<template>
    <div class="other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <v-row class="d-flex justify-center">
            <v-col cols="3">
                <v-select
                    label="Select"
                    :items="dates"
                ></v-select>
            </v-col>
            <v-col  cols="2">
                <v-btn @click="getDataAndDates()" style="width: 100%; background-color: #32981a; color: white;height: 55px">Search</v-btn>
            </v-col>

        </v-row>
    </div>

   <v-container floid class=" px-9 py-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">

       <v-row>
           <v-col cols="6">
               Choose Chart
               <v-radio-group v-model="charts">
               <v-radio label="PH Over Time" value="phBar"></v-radio>
               <v-radio label="PH with Action" value="Line"></v-radio>
               <v-radio label="Temperature Over Time" value="TempBar"></v-radio>
               <v-radio label="Average of PH, TEMP and Action values { the average of each }" value="Pie"></v-radio>
               </v-radio-group>
           </v-col>
           <v-col cols="6">
               <div v-if="charts === 'phBar'">
                   <BarChart :chart-data="phBarData" :chart-options="phBarOptions"/>
                   {{chartDescription = "this is row chart 1"}}
               </div>
               <div v-if="charts === 'Line'">
                   <line-chart  :chart-data="actionPhData" :chart-options="actionPhOptions"></line-chart>
                   {{ chartDescription = "this is row chart 2" }}
               </div>
               <div v-if="charts === 'TempBar'">
                   <BarChart :chart-data="tempBarData" :chart-options="tempBarOptions"/>
                   {{ chartDescription = "this is row chart 3" }}
               </div>
               <div v-else-if="charts === 'Pie'">
                    <DoughnutChart :chart-data="avgPiData" :chart-options="avgPiOptions" />
               </div>
               <div></div>
           </v-col>
       </v-row>
   </v-container>
</template>
<script>
import LineChart from "@/components/LineChart.vue";
import BarChart from "@/components/BarChart.vue";
import DoughnutChart from "@/components/DoughnutChart.vue"
import {Doughnut} from "vue-chartjs";

export default {
    data() {
        return {
            chartDescription: "DoughnutChart",

            dates: [],

            charts: 'Line',
            loaded: false,

            actionPhData: {
                labels: [1, 2, 3, 4,5,6,7,8],
                datasets: [
                    {
                        label: 'PH Sensor ( Data / Time )',
                        borderColor: '#04fc04',
                        backgroundColor: 'black',
                        data: [7, 5, 8, 1,5,4.5,6,8],
                    }
                ],
            },
            actionPhOptions: {
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            },

            phBarData: {
                labels: [1,2,3,4,5,6,7,8 ],
                datasets: [ { data: [1,2,3,4,5,6,7,8 ] } ]
            },
            phBarOptions: {
                responsive: true
            },

            tempBarData: {
                labels: [1,2,3,4,5,6,7,8 ],
                datasets: [ { data: [1,2,3,4,5,6,7,8 ] } ]
            },
            tempBarOptions: {
                responsive: true
            },


            avgPiData: {
                labels: ['PH', 'Temperature', 'Action'],
                datasets: [
                    {
                        backgroundColor: ['rgba(4,252,4,0.7)', '#3d3d3d', 'rgba(220,12,12,0.7)'],
                        data: [7.4, 40, 15]
                    }
                ]
            },
            avgPiOptions: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    components:{
        LineChart,
        BarChart,
        DoughnutChart
    },
    methods: {
        async get_dates(day){
            // night and day selection.
            let response;
            if(day == null){
                response = await axios.get(`/get-dates`);
            }else {
               response = await axios.get(`/get-dates/${day}`);
            }
           this.dates = response.data.dates;
        },
        getDataAndDates(){
            // get data with today as defualt
            // get the data for the charts
            // recursive the get-dates functon by passig to it the sellected date
        },
    },
    mounted() {
        this.get_dates();
    }
}

</script>
