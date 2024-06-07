<template>
    <v-container floid>
        <div class="other-admins px-5 py-5 my-9 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <v-row>
                <v-col cols="2">
                    <div style="">
                        <input style="background-color: #ebebeb; padding: 15px; width: 100%; border-bottom: 1px solid #938c8c" type="date">
                    </div>
                </v-col>
                <v-col cols="3">
                    <v-text-field label="PH sensor"></v-text-field>
                </v-col>
                <v-col cols="3">
                    <v-text-field label="Temperature sensor"></v-text-field>
                </v-col>
                <v-col cols="2">
                    <v-select
                        label="Action"
                        :items="['Add', 'No']"
                    ></v-select>
                </v-col>
                <v-col cols="2">
                        <v-btn  class="" style="width: 100%; background-color: #32981a; color: white;height: 55px">Search</v-btn>
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
                <td class="text-center">{{ item.ph }}</td>
                <td class="text-center">{{ item.temp }}</td>
                <td class="text-center">{{ item.time }}</td>
                <td :class="item.action === 'no'? 'no text-center' : 'add text-center'">
                    {{ item.action }}
                </td>
            </tr>
            </tbody>
        </v-table>
    </v-container>
</template>

<script>
export default {
    data: ()=>{
        return {
            data: [
                {
                    ph: 7,
                    temp: 35,
                    time: '2024-4-5 5:30',
                    action: 'no'
                },
                {
                    ph: 12,
                    temp: 35,
                    time: '2024-4-5 5:30',
                    action: 'add'
                },
                {
                    ph: 8,
                    temp: 35,
                    time: '2024-4-5 5:30',
                    action: 'add'
                },
                {
                    ph: 3,
                    temp: 35,
                    time: '2024-4-5 5:30',
                    action: 'add'
                }
            ]
        }
    }
}
</script>
<style>
.table{
    font-size: 20px;
}
.add{
    background-color: #e52d2d;
    color: white;
    padding: 10px;
}
.no{
    background-color: #32981a;
    color: white;
    padding: 10px;
}
</style>
