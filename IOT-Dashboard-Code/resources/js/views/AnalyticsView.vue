<template>
    <div class="other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <v-row class="d-flex justify-center">
            <v-col cols="6">
                <div style="">
                    <input style="background-color: #ebebeb; padding: 15px; width: 100%; border-bottom: 1px solid #938c8c" type="date">
                </div>
            </v-col>
            <v-col cols="2">
                <v-btn  class="" style="width: 100%; background-color: #32981a; color: white;height: 55px">Search</v-btn>
            </v-col>
        </v-row>
    </div>

   <v-container floid class=" px-9 py-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">

       <v-row>
           <v-col cols="6">
               Choose Chart
               <v-radio-group v-model="charts">
               <v-radio label="Line Charts" value="Line"></v-radio>
               <v-radio label="Pie Charts" value="Pie"></v-radio>
               <v-radio label="Bar Charts" value="Bar"></v-radio>
               </v-radio-group>
           </v-col>
           <v-col cols="6">
               <div v-if="charts === 'Line'">
                   <line-chart  :chart-data="data" :chart-options="options"></line-chart>
               </div>
               <div v-else-if="charts === 'Pie'">
                   <DoughnutChart />
               </div>
               <div v-else-if="charts === 'Bar'">
                   <BarChart />
               </div>
           </v-col>
       </v-row>
   </v-container>
</template>
<script>
import LineChart from "@/components/LineChart.vue";
import BarChart from "@/components/BarChart.vue";
import DoughnutChart from "@/components/DoughnutChart.vue";
export default {
    data() {
        return {
            charts: 'Line',
            loaded: false,
            data: {
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
            options: {
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            },
        }
    },
    components:{
        LineChart,
        BarChart,
        DoughnutChart
    }
}

</script>
