<template>
    <Link href="/listing">Listings</Link>&nbsp;
    <Link href="/listing/create">New listing</Link>&nbsp;

    <div v-if="flashSuccess" class="success">
      {{ flashSuccess }}
    </div>
    <slot></slot>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from "vue"

// page.props.flash
const page = usePage()

const flashSuccess = computed(() => {
  return page.props.flash.success
})

</script>

<style scoped>
  .success{
    background-color: green;
    color: white;
  }
</style>
