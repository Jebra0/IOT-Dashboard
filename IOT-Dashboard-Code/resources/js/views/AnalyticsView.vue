<template>
    <div class="other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <v-row class="d-flex justify-center">
            <v-col cols="3">
                <div style="">
                    <label>Start Date</label>
                    <input style="background-color: #ebebeb; padding: 15px; width: 100%; border-bottom: 1px solid #938c8c" type="date">
                </div>
            </v-col>
            <v-col cols="3">
                <div style="">
                    <label>End Date</label>
                    <input style="background-color: #ebebeb; padding: 15px; width: 100%; border-bottom: 1px solid #938c8c" type="date">
                </div>
            </v-col>
            <v-col cols="2">
                <v-btn  class="mt-6" style="width: 100%; background-color: #32981a; color: white;height: 55px">Search</v-btn>
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
                   <BarChart :chart-data="barData" :chart-options="barOptions"/>
                   {{chartDescription = "this is row chart 1"}}
               </div>
               <div v-if="charts === 'Line'">
                   <line-chart  :chart-data="phData" :chart-options="phOptions"></line-chart>
                   {{ chartDescription = "this is row chart 2" }}
               </div>
               <div v-if="charts === 'TempBar'">
                   <BarChart :chart-data="barData" :chart-options="barOptions"/>
                   {{ chartDescription = "this is row chart 3" }}
               </div>
               <div v-else-if="charts === 'Pie'">
                    <DoughnutChart :chart-data="piData" :chart-options="piOptions" />
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

            charts: 'Line',
            loaded: false,

            phData: {
                labels: [1, 2, 3, 5],
                datasets: [
                    {
                        label: 'PH Sensor ( Data / Time )',
                        borderColor: '#04fc04',
                        backgroundColor: 'black',
                        data: [7, 5, 8, 1],
                    }
                ],
            },
            phOptions: {
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            },

            barData: {
                labels: [ 'Ph', 'February', 'March' ],
                datasets: [ { data: [40, 20, 12] } ]
            },
            barOptions: {
                responsive: true
            },

            piData: {
                labels: ['PH', 'Temperature', 'Action'],
                datasets: [
                    {
                        backgroundColor: ['rgba(4,252,4,0.7)', '#3d3d3d', 'rgba(220,12,12,0.7)'],
                        data: [7.4, 40, 15]
                    }
                ]
            },
            piOptions: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    components:{
        LineChart,
        BarChart,
        DoughnutChart
    }
}

</script>
