<template>
  <AppLayout title="Contacts">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <span>In this view you can edit a contact</span>
      <pre>
    {{ contact }}
  </pre>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
  components: {
    AppLayout
  },
  props: {
    contact: {
      type: Array,
      required: true
    }
  }
}
</script>

<style></style>
