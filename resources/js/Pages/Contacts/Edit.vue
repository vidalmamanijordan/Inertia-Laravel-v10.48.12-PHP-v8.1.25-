<template>
  <AppLayout title="Contacts">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
      </h2>
    </template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
      <h1 class="text-3xl font-semibold text-gray-700 mb-3">
        <span class="text-blue-500">Contactos</span> / Actualizar
      </h1>
      <div class="bg-white px-6 py-8 rounded-lg shadow">
        <!-- Inputs -->
        <div class="grid grid-cols-2 gap-6">
          <div class="relative">
            <input v-model="form.first_name" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Nombres" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Nombres
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.first_name" class="text-sm text-red-500">{{
              this.$page.props.errors.first_name }}</span>
          </div>
          <div class="relative">
            <input v-model="form.last_name" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Apellidos" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Apellidos
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.last_name" class="text-sm text-red-500">{{
              this.$page.props.errors.last_name }}</span>
          </div>
          <div class="relative">
            <select v-model="form.organization_id" id="small"
              class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected disabled>Seleccione una Organización</option>
              <option v-for="organization in organizations" :key="'country-' + organization.id"
                :value="organization.id">
                {{ organization.name }}
              </option>
            </select>
            <span v-if="this.$page.props.errors && this.$page.props.errors.organization_id"
              class="text-sm text-red-500">{{
                this.$page.props.errors.organization_id }}</span>
          </div>
          <div class="relative">
            <input v-model="form.email" type="email"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Email" />
            <label for="floatingInput"
              class="text-bl pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Email
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.email" class="text-sm text-red-500">{{
              this.$page.props.errors.email }}</span>
          </div>
          <div class="relative">
            <input v-model="form.phone" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Celular" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Celular
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.phone" class="text-sm text-red-500">{{
              this.$page.props.errors.phone }}</span>
          </div>
          <div class="relative">
            <input v-model="form.address" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Dirección" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Dirección
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.address" class="text-sm text-red-500">{{
              this.$page.props.errors.address }}</span>
          </div>
          <div class="relative">
            <input v-model="form.city" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Ciudad" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Ciudad
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.city" class="text-sm text-red-500">{{
              this.$page.props.errors.city }}</span>
          </div>
          <div class="relative">
            <input v-model="form.state" type="text"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Estado" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Estado
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.state" class="text-sm text-red-500">{{
              this.$page.props.errors.state }}</span>
          </div>
          <div class="relative">
            <select v-model="form.country_id" id="small"
              class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option value="" selected disabled>Seleccione un País</option>
              <option v-for="country in countries" :key="'country-' + country.id" :value="country.id">
                {{ country.name }}
              </option>
            </select>
            <span v-if="this.$page.props.errors && this.$page.props.errors.country_id" class="text-sm text-red-500">{{
              this.$page.props.errors.country_id }}</span>
          </div>
          <div class="relative">
            <input v-model="form.postal_code" type="number"
              class="peer m-0 block h-[38px] w-full rounded border border-solid border-secondary-500 bg-transparent bg-clip-padding px-3 py-2 text-base font-normal leading-tight text-neutral-700 transition duration-200 ease-linear placeholder:text-transparent focus:border-primary focus:pb-[0.375rem] focus:pt-[1.125rem] focus:text-neutral-700 focus:outline-none peer-focus:text-primary dark:border-neutral-400 dark:text-white dark:autofill:shadow-autofill dark:focus:border-primary dark:peer-focus:text-primary [&:not(:placeholder-shown)]:pb-[0.375rem] [&:not(:placeholder-shown)]:pt-[1.125rem]"
              id="floatingInput" placeholder="Código Postal" />
            <label for="floatingInput"
              class="pointer-events-none absolute left-0 top-0 origin-[0_0] border border-solid border-transparent px-3 py-2 text-blue-500 transition-[opacity,_transform] duration-200 ease-linear peer-focus:-translate-y-2 peer-focus:translate-x-[0.15rem] peer-focus:scale-[0.85] peer-focus:text-primary peer-[:not(:placeholder-shown)]:-translate-y-2 peer-[:not(:placeholder-shown)]:translate-x-[0.15rem] peer-[:not(:placeholder-shown)]:scale-[0.85] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">
              Código Postal
            </label>
            <span v-if="this.$page.props.errors && this.$page.props.errors.postal_code" class="text-sm text-red-500">{{
              this.$page.props.errors.postal_code }}</span>
          </div>
        </div>
        <div class="flex justify-end">
          <button @click="destroy"
            class="mr-3 mt-2 flex-shrink-0 text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800 dark:hover:bg-red-500">
            Eliminar
          </button>
          <button @click="update"
            class="mt-2 flex-shrink-0 text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
            Actualizar
          </button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
  components: {
    AppLayout
  },

  data() {
    return {
      form: this.contact
    }
  },

  props: {
    organizations: Array,
    countries: Array,
    contact: {
      type: Array,
      required: true
    }
  },

  methods: {
    update() {
      this.$inertia.put(this.route('contacts.update', this.contact), this.form);
    },
    destroy() {
      this.$inertia.delete(this.route('contacts.destroy', this.contact));
    }
  },
}
</script>

<style></style>
