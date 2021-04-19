<template>
  <div class="flex flex-col divide-y divide-gray bg-white overflow-auto" style="height: 200px;">
    <div v-for="(date, index) in dates" class="text-center text-black py-1" :key="index">
      {{ date }}
    </div>
  </div>
</template>

<script>
import moment from 'moment'

export default {
  name: 'DateList',

  data: () => ({
    dates: []
  }),

  mounted () {
    const startDate = '2020-08-01'
    const diff = moment().diff(moment(startDate), 'months')
    for (let i = diff; i >= 0; i -= 1) {
      this.dates.push(moment(startDate).add(i, 'months').format('YYYY-MM'))
    }
  }
}
</script>
