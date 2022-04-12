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
          ENTREGAR RAMAL
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
            ENTREGA DE RAMAL</list-item
          >
          <form id="form" @submit.prevent="submit">
            <div class="grid grid-cols-12 gap-2">
              <div class="col-span-4">
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
              <div class="col-span-5">
                <label
                  for="tipo"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >TIPO DE RAMAL</label
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
                  <option value="MONOFASICO">MONOFÁSICO</option>
                  <option value="TRIFASICO">TRIFÁSICO</option>
                </select>
              </div>
               <div class="col-span-3">
                <label
                  for="metros"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >METROS</label
                >
                <input
                  required
                  v-model="form.metros"
                  style="width: 100%"
                  type="number"
                  name="metros"
                  id="metros"
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
              <th class="font-semibold text-xs uppercase">RAMAL (METROS)</th>
              <th class="font-semibold text-xs uppercase">TIPO DE RAMAL</th>
              <th class="font-semibold text-xs uppercase">DATA RECEBIMENTO</th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody
            v-for="entrega in entregas"
            :key="entrega.id"
            class="divide-y divide-gray-200"
          >
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.equipe.equipe }} </span>
              </td>
                <td class="text-xs px-2 py-2 text-center">
                    <span> {{ entrega.qtd_ramal }} </span>
                </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.tipo }} </span>
              </td>
 
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.created_at }} </span>
              </td>
              <td class="text-xs px-2 py-2">
                <a
                  :href="route('ramal.show', entrega.id)"
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
                  >VISUALIZAR</a
                >
              </td>
            </tr>
          </tbody>
        </table>
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

export default defineComponent({
  components: {
    AppLayout,
    Head,
    Link,
    ListItem,
    DialogModal,
    JetValidationErrors,
  },

  props: {
    equipes: Array,
    entregas: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        equipe: "",
        tipo: "",
        metros: "",

      }),

      showModal: false,
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("ramal.store"));
      this.showModal = false;
    },
  },
});
</script>