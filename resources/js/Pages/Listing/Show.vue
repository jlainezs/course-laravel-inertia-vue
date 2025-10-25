<template>
  <div class="flex flex-col-reverse md:grid grid-cols-12 gap-4">
    <Box class="md:col-span-7 flex items-center w-full">
      <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
        <img v-for="image in listing.images" :key="image.id" :src="image.src" />
      </div>
      <div v-else class="w-full text-center font-medium text-gray-500">
        No images
      </div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>
        <template #header>
          Basic info
        </template>
        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>
      <Box>
        <template #header>
          Monthly payment
        </template>
        <div>
          <label>Interest rate ({{ interestRate }}%)</label>
          <input type="range"
                 min="0.1" maxlength="30" step="0.1" v-model.number="interestRate"
                 class="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer"
            />
          <label>Duration ({{ duration }} years)</label>
          <input type="range"
                 min="3" maxlength="35" step="1" v-model.number="duration"
                 class="w-full h-4 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer"
            />
          <div class="text-gray-600 dark:text-gray-300 mt-2">
            <div class="text-gray-400">Your monthly payment</div>
            <Price :price="monthlyPayment" class="text-3xl" />
          </div>

          <div class="mt-2 text-gray-500">
            <div class="flex justify-between">
              <div>Total paid</div>
              <div>
                <Price :price="totalPaid" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Principal paid</div>
              <div>
                <Price :price="listing.price" class="font-medium" />
              </div>
            </div>
            <div class="flex justify-between">
              <div>Interest paid</div>
              <div>
                <Price :price="totalInterest" class="font-medium" />
              </div>
            </div>
          </div>
        </div>
      </Box>
      <MakeOffer
        @offer-updated="offer = $event"
        v-if="user && !offerMade"
        :listing-id="listing.id"
        :price="listing.price" />
      <OfferMade
        v-if="user && offerMade"
        :offer="offerMade" />
    </div>
  </div>
</template>
<script setup>
  import ListingAddress from "@/Components/ListingAddress.vue"
  import ListingSpace from "@/Components/ListingSpace.vue"
  import Price from "@/Components/Price.vue"
  import Box from "@/Components/UI/Box.vue"
  import { useMonthlyPayment } from "@/Composables/useMonthlyPayment.js"
  import {computed, ref} from "vue"
  import MakeOffer from "@/Pages/Listing/Show/Components/MakeOffer.vue"
  import {usePage} from "@inertiajs/vue3";
  import OfferMade from "@/Pages/Listing/Show/Components/OfferMade.vue";

  const interestRate = ref(2.5)
  const duration = ref(25)
  const page = usePage()

  const user = computed(() => {
    return page.props.user
  })

  const props = defineProps({
    listing: Object,
    offerMade: Object,
  })

  const offer = ref(props.listing.price)

  const {monthlyPayment, totalPaid, totalInterest } = useMonthlyPayment(offer, interestRate, duration)


</script>

<style scoped>

</style>
