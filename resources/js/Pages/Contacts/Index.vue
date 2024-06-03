<template>
  <AppLayout title="Contacts">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <!-- Search -->
      <div class="mb-2">
        <form action="" class="relative mx-auto w-max bg-white rounded-full border">
          <input v-model="search" type="search" placeholder="Ingrese texto a buscar"
            class="peer cursor-pointer relative z-10 h-12 w-12 rounded-full border bg-transparent pl-12 outline-none focus:w-full focus:cursor-text focus:border-blue-300 focus:pl-16 focus:pr-4" />
          <svg xmlns="http://www.w3.org/2000/svg"
            class="absolute inset-y-0 my-auto h-8 w-12 border-r border-transparent stroke-gray-500 px-3.5 peer-focus:border-blue-300 peer-focus:stroke-blue-500"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </form>
      </div>
      <!-- table -->
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="p-4">
                <div class="flex items-center">
                  <input id="checkbox-all-search" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="checkbox-all-search" class="sr-only">checkbox</label>
                </div>
              </th>
              <th scope="col" class="px-6 py-3">
                Nombres
              </th>
              <th scope="col" class="px-6 py-3">
                Organización
              </th>
              <th scope="col" class="px-6 py-3">
                Ciudad
              </th>
              <th scope="col" class="px-6 py-3">
                Teléfono
              </th>
              <th scope="col" class="px-6 py-3">
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="contact in contacts.data" :key="'contact-' + contact.id"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="w-4 p-4">
                <div class="flex items-center">
                  <input id="checkbox-table-search-1" type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
              </td>
              <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                <div class="ps-3">
                  <div class="text-base font-semibold">{{ contact.first_name }}</div>
                  <div class="font-normal text-gray-500">{{ contact.last_name }}</div>
                </div>
              </th>
              <td class="px-6 py-4">
                {{ contact.organization.name }}
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center">
                  {{ contact.city }}
                </div>
              </td>
              <td class="px-6 py-4">
                {{ contact.phone }}
              </td>
              <td class="px-6 py-4">
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                  <i class="fa-solid fa-chevron-right"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- Paginations -->
        <Pagination :pagination="contacts"></Pagination>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from '@/Shared/Pagination.vue';
import pickBy from 'lodash/pickBy';

export default {
  components: {
    AppLayout,
    Pagination
  },

  data() {
    return {
      search: this.filters.search || ''
    }
  },

  watch: {
    search($value) {
      this.$inertia.get('/contacts', pickBy({ search: $value }), { preserveState: true })
    }
  },

  props: {
    filters: Object,
    contacts: Object
  }
}
</script>

<style></style>
