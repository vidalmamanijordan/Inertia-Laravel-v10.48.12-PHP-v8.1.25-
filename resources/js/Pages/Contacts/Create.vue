<template>
  <AppLayout title="Contacts">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Contacts
        </h2>
    </template>
    <span>In this view you can create a contact</span>
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
  components: {
    AppLayout
  }
}
</script>

<style></style>
