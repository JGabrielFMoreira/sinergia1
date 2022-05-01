<template>
  <app-layout title="Dashboard">
    <template #header>
      <div class="flex justify-end">
        <button
          @click="showModal = true"
          type="submit"
          class="
            ml-2
            inline-flex
            items-center
            px-4
            py-1
            bg-gray-800
            border border-transparent
            rounded-md
            font-semibold
            text-xs text-white
            uppercase
            tracking-widest
            hover:bg-gray-700
            active:bg-gray-900
            focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
            transition
            ease-in-out
            duration-150
          "
        >
          NOVO ATENDIMENTO
        </button>
      </div>
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
            REGISTRO DE ATENDIMENTOS</list-item
          >
          <form id="form" @submit.prevent="submit">
            <div class="grid grid-cols-12 gap-2">
              <div class="col-span-3">
                <label
                  for="equipe"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >EQUIPE</label
                >
                <select
                  required
                  v-model="form.equipe"
                  style="width: 100%"
                  name="equipe"
                  id="equipe"
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
                  <option
                    v-for="equipe in equipes"
                    :key="equipe.id"
                    :value="equipe.id"
                  >
                    {{ equipe.equipe }}
                  </option>
                </select>
              </div>
              <div class="col-span-3">
                <label
                  for="tipo"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >TIPO ATENDIMENTO</label
                >
                <select
                  required
                  v-model="form.tipo"
                  style="width: 100%"
                  name="tipo"
                  id="tipo"
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
                  <option value="CONSUMO">CONSUMO</option>
                  <option value="DEBITO">DÉBITO</option>
                </select>
              </div>
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
                  >UC ATENDIDA</label
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
              <div class="col-span-3">
                <label
                  for="os"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >OS ATRIBUÍDA ?</label
                >
                <select
                  required
                  v-model="form.os"
                  style="width: 100%"
                  name="os"
                  id="os"
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
                  <option value="SIM">SIM</option>
                  <option value="NAO">NÃO</option>
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

    <div class="min-h-screen bg-gray-200 py-5">
      <form id="formPesquisa" @submit.prevent="submitPesquisa">
        <div class="grid grid-cols-12">
          <div class="col-span-9"></div>
          <div class="col-span-1">
            <div
              class="
                ml-2
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
                  form-control
                  relative
                  flex-auto
                  min-w-0
                  block
                  w-full
                  px-3
                  py-1
                  text-xs
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-400
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

          <div class="col-span-1">
            <button
              form="formPesquisa"
              type="submit"
              class="
                
                mt-0.5
                ml-3
                btn
                inline-block
                px-3
                bg-gray-800
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-mdcd c:
                hover:bg-gray-900 hover:shadow-lg
                focus:bg-gray-600
                focus:shadow-lg
                focus:outline-none
                focus:ring-0
                active:bg-gray-800 active:shadow-lg
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
        </div>
      </form>

      <div class="overflow-x-auto w-full">
        <table
          class="
            mx-auto
            max-w-5xl
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
              <th class="font-semibold text-xs uppercase">EQUIPE</th>
              <th class="font-semibold text-xs uppercase">ATENDENTE</th>
              <th class="font-semibold text-xs uppercase">TIPO</th>
              <th class="font-semibold text-xs uppercase px-2 py-2">
                UC CONSULTADA
              </th>
              <th class="font-semibold text-xs uppercase px-2 py-2">
                DATA ATENDIMENTO
              </th>
              <th class="font-semibold text-xs uppercase px-2 py-2">
                OS ATRIBUÍDA ?
              </th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody
            v-for="atendimento in atendimentos.data"
            :key="atendimento.id"
            class="divide-y divide-gray-200"
          >
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ atendimento.equipe.equipe }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ atendimento.user.name }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ atendimento.tipo_atendimento }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ atendimento.uc_atendida }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ atendimento.created_at }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span
                  :class="{
                    'bg-green-600 text-white p-1 rounded':
                      atendimento.os_atribuida === 'SIM',
                    'bg-red-600 text-white p-1 rounded':
                      atendimento.os_atribuida === 'NAO',
                  }"
                >
                  {{ atendimento.os_atribuida }}
                </span>
              </td>

              <td class="text-xs px-2 py-2">
                <a
                  :href="route('atendimento.show', atendimento.id)"
                  class="
                    text-blue-800 text-xs

                  "
                  ><eye-plus-icon/></a
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
            atendimentos.current_page
          }}</span>
          de
          <span class="font-semibold text-gray-900 dark:text-white">{{
            atendimentos.last_page
          }}</span>
          Páginas
        </span>
        <!-- Buttons -->
        <div class="inline-flex xs:mt-0">
          <a
            :href="atendimentos.prev_page_url"
            class="
              py-2
              px-4
              text-sm
              font-medium
              text-white
              bg-gray-800
              rounded-l
              hover:bg-gray-900
              dark:bg-gray-800
              dark:border-gray-700
              dark:text-gray-400
              dark:hover:bg-gray-700
              dark:hover:text-white
            "
          >
            Anterior
          </a>
          <a
            :href="atendimentos.next_page_url"
            class="
              py-2
              px-4
              text-sm
              font-medium
              text-white
              bg-gray-800
              rounded-r
              border-0 border-l border-gray-700
              hover:bg-gray-900
              dark:bg-gray-800
              dark:border-gray-700
              dark:text-gray-400
              dark:hover:bg-gray-700
              dark:hover:text-white
            "
          >
            Próximo
          </a>
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
import EyePlusIcon from "vue-material-design-icons/EyePlus.vue";
import MagnifyIcon from "vue-material-design-icons/Magnify.vue";

export default defineComponent({
  components: {
    AppLayout,
    Head,
    Link,
    ListItem,
    DialogModal,
    JetValidationErrors,
    EyePlusIcon,
    MagnifyIcon,
  },

  props: {
    atendimentos: Array,
    equipes: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        equipe: "",
        tipo: "",
        uc: "",
        os: "",
      }),

      showModal: false,

      formPesquisa: this.$inertia.form({
        pesquisar: "",
      }),
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("atendimento.store"));
      this.showModal = false;
    },
    submitPesquisa() {
      this.formPesquisa.get(this.route("atendimento.index"));
    },
  },
});
</script>