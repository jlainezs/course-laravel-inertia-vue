<template>
  <form @submit.prevent="filter">
    <div class="mb-8 mt-4 flex flex-wrap gap-2">
      <div class="flex flex-nowrap items-center">
        <input type="text" placeholder="Price from"
               v-model.number="filterForm.priceFrom"
               class="input-filter-l w-28" />
        <input type="text" placeholder="Price to"
               v-model.number="filterForm.priceTo"
               class="input-filter-r w-28" />
      </div>
      <div class="flex flex-nowrap items-center">
        <select class="input-filter-l w-28" v-model.number="filterForm.beds">
          <option :value="null">Beds</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
        <select class="input-filter-r w-28" v-model.number="filterForm.baths">
          <option :value="null">Baths</option>
          <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
          <option>6+</option>
        </select>
      </div>
      <div class="flex flex-nowrap items-center">
        <input type="text" placeholder="Area from"
               v-model.number="filterForm.areaFrom"
               class="input-filter-l w-28"/>
        <input type="text" placeholder="Area to"
               v-model.number="filterForm.areaTo"
               class="input-filter-r w-28"/>
      </div>
      <button type="submit" class="btn-normal">Filter</button>
      <button type="reset" @click="reset">Clear</button>
    </div>
  </form>
</template>


<script setup>
import { useForm } from "@inertiajs/vue3"

const props = defineProps({
  filters: Object
})

const filter = () => {
  filterForm.get(
    route('listing.index'),
    {
      preserveState: true,
      preserveScroll: true,
    }
  )
}
const clear = () => {
  filrerForm.priceFrom = null
  filrerForm.priceTo = null
  filrerForm.beds = null
  filrerForm.baths = null
  filrerForm.areaFrom = null
  filrerForm.areaTo =  null
  filter()
}
const filterForm = useForm({
  priceFrom: props.filters.priceFrom ?? null,
  priceTo: props.filters.priceTo ?? null,
  beds: props.filters.beds ?? null,
  baths: props.filters.baths ?? null,
  areaFrom: props.filters.areaFrom ?? null,
  areaTo: props.filters.areaTo ?? null,
})
</script>
