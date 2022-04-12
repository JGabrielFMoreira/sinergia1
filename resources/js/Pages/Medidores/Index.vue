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
          ENTREGAR MEDIDORES
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
            ENTREGA DE MEDIDORES</list-item
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
              <div class="col-span-4">
                <label
                  for="tipo"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >TIPO DE MEDIDOR</label
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
                  <option value="BIFASICO">BIFÁSICO</option>
                  <option value="TRIFASICO">TRIFÁSICO</option>
                </select>
              </div>
              <div class="col-span-4"></div>
              <div class="mt-8 col-span-3">
                <label
                  for="medidor_1"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 1</label
                >
                <input
                  required
                  v-model="form.medidor_1"
                  style="width: 100%"
                  type="text"
                  name="medidor_1"
                  id="medidor_1"
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
              <div class="mt-8 col-span-3">
                <label
                  for="medidor_2"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 2</label
                >
                <input
                  v-model="form.medidor_2"
                  style="width: 100%"
                  type="text"
                  name="medidor_2"
                  id="medidor_2"
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
              <div class="mt-8 col-span-3">
                <label
                  for="medidor_3"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 3</label
                >
                <input
                  v-model="form.medidor_3"
                  style="width: 100%"
                  type="text"
                  name="medidor_3"
                  id="medidor_3"
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
              <div class="mt-8 col-span-3">
                <label
                  for="medidor_4"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 4</label
                >
                <input
                  v-model="form.medidor_4"
                  style="width: 100%"
                  type="text"
                  name="medidor_4"
                  id="medidor_4"
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
                  for="medidor_5"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 5</label
                >
                <input
                  v-model="form.medidor_5"
                  style="width: 100%"
                  type="text"
                  name="medidor_5"
                  id="medidor_5"
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
                  for="medidor_6"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 6</label
                >
                <input
                  v-model="form.medidor_6"
                  style="width: 100%"
                  type="text"
                  name="medidor_6"
                  id="medidor_6"
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
                  for="medidor_7"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 7</label
                >
                <input
                  v-model="form.medidor_7"
                  style="width: 100%"
                  type="text"
                  name="medidor_7"
                  id="medidor_7"
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
                  for="medidor_8"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 8</label
                >
                <input
                  v-model="form.medidor_8"
                  style="width: 100%"
                  type="text"
                  name="medidor_8"
                  id="medidor_8"
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
                  for="medidor_9"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 9</label
                >
                <input
                  v-model="form.medidor_9"
                  style="width: 100%"
                  type="text"
                  name="medidor_9"
                  id="medidor_9"
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
                  for="medidor_10"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 10</label
                >
                <input
                  v-model="form.medidor_10"
                  style="width: 100%"
                  type="text"
                  name="medidor_10"
                  id="medidor_10"
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
                  for="medidor_11"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 11</label
                >
                <input
                  v-model="form.medidor_11"
                  style="width: 100%"
                  type="text"
                  name="medidor_11"
                  id="medidor_11"
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
                  for="medidor_12"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >MEDIDOR 12</label
                >
                <input
                  v-model="form.medidor_12"
                  style="width: 100%"
                  type="text"
                  name="medidor_12"
                  id="medidor_12"
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
              <th class="font-semibold text-xs uppercase">FISCAL</th>
              <th class="font-semibold text-xs uppercase">
                MEDIDORES RECEBIDOS
              </th>
              <th class="font-semibold text-xs uppercase">TIPO DE MEDIDOR</th>
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
                <span> {{ entrega.equipe.encarregado.name }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.qtd_md }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.tipo_md }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ entrega.created_at }} </span>
              </td>
              <td class="text-xs px-2 py-2">
                <a
                  :href="route('medidores.show', entrega.id)"
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
    entregas: Array,
    equipes: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        equipe: "",
        tipo: "",
        medidor_1: "",
        medidor_2: "",
        medidor_3: "",
        medidor_4: "",
        medidor_5: "",
        medidor_6: "",
        medidor_7: "",
        medidor_8: "",
        medidor_9: "",
        medidor_10: "",
        medidor_11: "",
        medidor_12: "",
      }),

      showModal: false,
    };
  },
  methods: {
    submit() {
      this.form.post(this.route("medidores.store"));
      this.showModal = false;
    },
  },
});
</script>