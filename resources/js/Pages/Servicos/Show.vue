<template>
  <app-layout title="Dashboard">
    <template #header>
      <div class="flex justify-end">
        <Link
          :href="route('servicos.index')"
          class="
            inline-flex
            items-center
            px-4
            py-1
            bg-blue-800
            border border-transparent
            rounded-md
            font-semibold
            text-xs text-white
            uppercase
            tracking-widest
            hover:bg-blue-600
            active:bg-blue-900
            focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
            transition
            ease-in-out
            duration-150
          "
          >VOLTAR</Link
        >
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
            EDIÇÃO DE SERVIÇO</list-item
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
                  >UC</label
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
                  for="codigo_id"
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
                  v-model="form.codigo_id"
                  style="width: 100%"
                  name="codigo_id"
                  id="codigo_id"
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
                    v-for="codigo in codigos"
                    :key="codigo.id"
                    :value="codigo.id"
                  >
                    {{ codigo.codigo }}
                  </option>
                </select>
              </div>
              <div class="col-span-4">
                <label
                  for="usuario_id"
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
                  v-model="form.responsavel_id"
                  style="width: 100%"
                  name="usuario_id"
                  id="usuario_id"
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
                    v-for="usuario in usuarios"
                    :key="usuario.id"
                    :value="usuario.id"
                  >
                    {{ usuario.name }}
                  </option>
                </select>
              </div>
              <div class="col-span-3">
                <label
                  for="status"
                  class="
                    block
                    text-xs text-black
                    uppercase
                    font-bold
                    tracking-widest
                  "
                  >STATUS</label
                >
                <select
                  required
                  v-model="form.status"
                  style="width: 100%"
                  name="status"
                  id="status"
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
                  <option value="PENDENTE">PENDENTE</option>
                  <option value="RETORNO">RETORNO</option>
                  <option value="AGUARDANDO">AGUARDANDO</option>
                  <option value="BAIXADO">BAIXADO</option>
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
      <div class="mt-6 overflow-x-auto w-full">
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
              <th class="font-semibold text-xs uppercase">ENTREGUE POR</th>
              <th class="font-semibold text-xs uppercase">STATUS</th>
              <th class="font-semibold text-xs uppercase">
                ULTIMA ATUALIZAÇÃO
              </th>
              <th class="font-semibold text-xs uppercase px-2 py-2">AÇÕES</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <tr class="text-center">
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.uc }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.created_at }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.codigo.codigo }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.user.name }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.user_lancador.name }} </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span
                  :class="{
                    'bg-blue-600 text-white p-1 rounded':
                      servico.status === 'PENDENTE',
                    'bg-red-600 text-white p-1 rounded':
                      servico.status === 'RETORNO',
                    'bg-gray-600 text-white p-1 rounded':
                      servico.status === 'AGUARDANDO',
                    'bg-green-600 text-white p-1 rounded':
                      servico.status === 'BAIXADO',
                  }"
                >
                  {{ servico.status }}
                </span>
              </td>
              <td class="text-xs px-2 py-2 text-center">
                <span> {{ servico.updated_at }} </span>
              </td>
              <td class="text-xs px-2 py-2">
                <button
                  @click="showModal = true"
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
                >
                  EDITAR
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex justify-end">
          <button
            @click="showModalDelete = true"
            class="
              mt-4
              inline-flex
              items-center
              px-4
              py-1
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
          >
            Excluir
          </button>
          <DialogModal :show="showModalDelete">
            <template #content>
              <form id="formDelete" @submit.prevent="submitDelete">
                <div class="p-2 x-2 text-center">
                  <span
                    class="
                      font-semibold
                      text-xs text-gray-600
                      uppercase
                      tracking-widest
                    "
                    >Tem certeza que deseja excluir o serviço:</span
                  >
                </div>
              </form>
            </template>
            <template #footer>
              <div class="col-span-12 flex justify-end">
                <a
                  @click="showModalDelete = false"
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
                    focus:outline-none
                    focus:bg-red-400
                    focus:shadow-outline-gray
                    transition
                    ease-in-out
                    duration-150
                  "
                  >Cancelar</a
                >
                <button
                  form="formDelete"
                  type="submit"
                  class="
                    ml-3
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
                    focus:outline-none
                    focus:bg-green-400
                    focus:shadow-outline-gray
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
    servico: Object,
    codigos: Array,
    usuarios: Array,
  },
  data() {
    return {
      form: this.$inertia.form({
        ...this.servico,
      }),

      showModal: false,
      formDelete: this.$inertia.form({
        ...this.servico,
      }),

      showModalDelete: false,
    };
  },
  methods: {
    submit() {
      this.form.put(this.route("servicos.update", this.servico.id));
      this.showModal = false;
    },
    submitDelete() {
      this.formDelete.delete(this.route("servicos.destroy", this.servico.id));
      this.showModalDelete = false;
    },
  },
});
</script>
