<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="tracking-widest font-bold text-lg text-gray-800 leading-tight">
        Registro de Serviços
      </h2>
      <DialogModal :show="showModal">
        <template #content>
          <list-item
            class="
              mb-8
              items-center
              px-4
              py-2
              bg-gray-800
              border border-transparent
              rounded-md
              font-semibold
              text-xs text-white
              uppercase
              tracking-widest
            "
          >
            ENTREGA DE SERVIÇOS</list-item
          >
          <form id="form" @submit.prevent="submit">
            <div class="grid grid-cols-12 gap-2">
              <div class="col-span-3">
                <label
                  for="uc"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >uc</label
                >
                <input
                  required
                  v-model="form.uc"
                  style="width: 100%"
                  type="text"
                  name="uc"
                  id="uc"
                  class="
                    mt-1
                    focus:bg-white focus:border-blue-400
                    shadow-sm
                    text-xs text-black
                    tracking-widest
                    border-gray-200
                    bg-gray-100
                    rounded-md
                  "
                />
              </div>
              <div class="col-span-2">
                <label
                  for="codigo"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >CÓDIGO</label
                >
                <select
                  required
                  v-model="form.codigo"
                  style="width: 100%"
                  name="codigo"
                  id="codigo"
                  class="
                    mt-1
                    focus:bg-white focus:border-blue-400
                    shadow-sm
                    text-xs text-black
                    tracking-widest
                    border-gray-200
                    bg-gray-100
                    rounded-md
                  "
                >
                  <option v-for="codigo in codigos" :key="codigo.id" :value="codigo.id">
                    {{ codigo.codigo }}
                  </option>
                </select>
              </div>
               <div class="col-span-4">
                <label
                  for="responsavel"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >RESPONSÁVEL</label
                >
                <select
                  required
                  v-model="form.responsavel"
                  style="width: 100%"
                  name="responsavel"
                  id="responsavel"
                  class="
                    mt-1
                    focus:bg-white focus:border-blue-400
                    shadow-sm
                    text-xs text-black
                    tracking-widest
                    border-gray-200
                    bg-gray-100
                    rounded-md
                  "
                >
                  <option v-for="usuario in usuarios" :key="usuario.id" :value="usuario.id">
                    {{ usuario.name }}
                  </option>
                </select>
              </div>
             
            </div>
          </form>
        </template>

        <template #footer>
          <div class="col-span-12 flex justify-end">
            <a
              @click="showModal = false"
              class="
                inline-flex
                items-center
                px-4
                py-2
                bg-red-700
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
                hover:bg-red-400
                active:bg-red-600
                focus:outline-none focus:bg-red-400 focus:shadow-outline-gray
                transition
                ease-in-out
                duration-150
              "
              >Cancelar</a
            >
            <button
              form="form"
              type="submit"
              class="
                ml-2
                inline-flex
                items-center
                px-4
                py-2
                bg-green-700
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
                hover:bg-green-400
                active:bg-green-600
                focus:outline-none focus:bg-green-400 focus:shadow-outline-gray
                transition
                ease-in-out
                duration-150
              "
            >
              Confirmar
            </button>
          </div>
        </template>
      </DialogModal>
    </template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <form id="formPesquisa" @submit.prevent="submitPesquisa">
        <div class="grid grid-cols-12">
          <div class="flex justify-end col-span-2">
            <div
              class="
                input-group
                relative
                flex flex-wrap
                items-stretch
                w-full
                mb-1
              "
            >
              <input
                type="search"
                v-model="formPesquisa.pesquisar"
                class="
                  mt-6
                  form-control
                  relative
                  flex-auto
                  min-w-0
                  block
                  w-full
                  px-3
                  py-1.5
                  text-xs
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700
                  focus:bg-white
                  focus:border-blue-600
                  focus:outline-none
                "
                placeholder="Pesquisar"
                aria-label="Search"
                aria-describedby="button-addon2"
              />
            </div>
          </div>

          <div class="col-span-7">
            <button
              form="formPesquisa"
              type="submit"
              class="
                mt-6
                ml-2
                btn
                py-0.5
                inline-block
                px-3
                bg-blue-800
                text-white
                rounded
                shadow-mdcd
                hover:bg-blue-600 hover:shadow-lg
                focus:bg-blue-600
                focus:shadow-lg
                focus:outline-none
                focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out
                flex
                items-center
              "
            >
              <magnify-icon />
            </button>
          </div>
          <div class="mt-6 flex justify-end col-span-3">
            <a
              @click="showModal = true"
              type="submit"
              class="
                mb-1
                ml-2
                inline-flex
                items-center
                px-4
                bg-gray-800
                border border-transparent
                rounded-md
                font-semibold
                text-xs text-white
                uppercase
                tracking-widest
                hover:bg-gray-700
                active:bg-gray-900
                focus:outline-none
                focus:border-gray-900
                focus:shadow-outline-gray
                transition
                ease-in-out
                duration-150
              "
            >
              REGISTRAR
            </a>
          </div>
        </div>
      </form>

      <div class="overflow-x-auto w-full">
        <table
          class="
            mx-auto
            max-w-7xl
            w-full
            whitespace-nowrap
            rounded-lg
            bg-white
            divide-y divide-gray-300
            overflow-hidden
          "
        >
          <thead class="bg-gray-900">
            <tr class="text-white text-center">
              <th class="font-semibold text-xs uppercase">UC</th>
              <th class="font-semibold text-xs uppercase">DATA ENTREGUE</th>
              <th class="font-semibold text-xs uppercase">CÓDIGO</th>
              <th class="font-semibold text-xs uppercase">RESPONSÁVEL</th>
              <th class="font-semibold text-xs uppercase">STATUS</th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody
            v-for="servico in servicos.data"
            :key="servico.id"
            class="divide-y divide-gray-200"
          >
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ servico.uc }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ servico.created_at }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ servico.codigo.codigo }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span>
                  {{ servico.user.name }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span
                  :class="{
                   'bg-blue-600 text-white p-1 rounded':
                      servico.status === 'PENDENTE',
                    'bg-red-600 text-white p-1 rounded':
                      servico.status === 'RETORNO',
                    'bg-yellow-600 text-white p-1 rounded':
                      servico.status === 'RETORNO',
                    'bg-green-600 text-white p-1 rounded':
                      servico.status === 'BAIXADO',
                  }"
                >
                  {{servico.status}}
                </span>
              </td>
              <td class="text-xs px-2 py-2">
                <Link
                  :href="route('servicos.show', servico.id)"
                  class="
                    ml-3
                    hover:underline
                    bg-blue-100
                    text-blue-800 text-xs
                    font-semibold
                    mr-2
                    px-2.5
                    py-0.5
                    rounded
                    dark:bg-red-200 dark:text-red-900
                  "
                  >VISUALIZAR</Link
                >
              </td>
            </tr>
          </tbody>
        </table>
      </div>
       <div class="mt-2 flex flex-col items-center">
        <!-- Help text -->
        <span class="text-sm text-gray-700 dark:text-gray-400">
          Visualizando
          <span class="font-semibold text-gray-900 dark:text-white">{{
            servicos.current_page
          }}</span>
          de
          <span class="font-semibold text-gray-900 dark:text-white">{{
            servicos.last_page
          }}</span>
          Páginas
        </span>
        <!-- Buttons -->
        <div class="inline-flex xs:mt-0">
          <Link
            :href="servicos.prev_page_url"
            class="
              py-2
              px-4
              text-sm
              font-medium
              text-white
              bg-blue-800
              rounded-l
              hover:bg-blue-900
              dark:bg-blue-800
              dark:border-blue-700
              dark:text-blue-400
              dark:hover:bg-blue-700
              dark:hover:text-white
            "
          >
            Anterior
          </Link>
          <Link
            :href="servicos.next_page_url"
            class="
              py-2
              px-4
              text-sm
              font-medium
              text-white
              bg-blue-800
              rounded-r
              border-0 border-l border-blue-700
              hover:bg-blue-900
              dark:bg-blue-800
              dark:border-blue-700
              dark:text-blue-400
              dark:hover:bg-blue-700
              dark:hover:text-white
            "
          >
            Próximo
          </Link>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ListItem from "@/Components/ListItem";
import DialogModal from "@/Jetstream/DialogModal";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";

export default defineComponent({
  components: {
    AppLayout,
    Head,
    Link,
    ListItem,
    DialogModal,
    JetValidationErrors,
    MagnifyIcon,
  },

  props: {
    servicos: Array,
    codigos: Array,
    usuarios: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        uc: "",
        codigo: "",
        responsavel: "",
      }),

      showModal: false,

      formPesquisa: this.$inertia.form({
        pesquisar: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("servicos.store"));
      this.showModal = false;
    },
    submitPesquisa() {
      this.formPesquisa.get(this.route("servicos.index"));
    },
  },
});
</script>