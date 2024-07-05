<template>
  <div style="color: #000; margin: 20px;">
    <v-container>
      <v-row>
        <v-col>
          <v-typography class="headline">Dashboard de Usuários</v-typography>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-text-field v-model="search" label="Buscar" @input="applyFilter" />
        </v-col>
        <v-col>
          <v-btn style="height: 55px;" color="primary" @click="openModal(null)">Novo Usuário</v-btn>
        </v-col>
      </v-row>
      <v-row>
        <v-col>
          <v-data-table-server
            v-model:items-per-page="pagination.perPage"
            :headers="headers"
            :items="filteredUsers"
            :items-length="pagination.total"
            :loading="loading"
            item-value="id"
            @update:options="fetchUsers"
            class="custom-table"
          >
            <template v-slot:item.action="{ item }">
              <v-btn icon @click="openModal(item)">
                <v-icon>mdi-pencil</v-icon>
              </v-btn>
              <v-btn icon @click="deleteUser(item.id)">
                <v-icon>mdi-delete</v-icon>
              </v-btn>
            </template>
          </v-data-table-server>
        </v-col>
      </v-row>
    </v-container>

    <v-dialog v-model="modalVisible" max-width="600">
      <v-card>
        <v-card-title>{{ modalTitle }}</v-card-title>
        <v-card-text>
          <v-form @submit.prevent="saveUser">
            <v-text-field v-model="editedUser.name" label="Nome" required></v-text-field>
            <v-text-field v-model="editedUser.email" label="Email" type="email" required></v-text-field>
            <v-text-field v-model="editedUser.cpf" label="CPF" required></v-text-field>
            <v-text-field v-model="editedUser.password" label="Senha" type="password" required></v-text-field>
            
            <v-btn color="primary" type="submit">Salvar</v-btn>
          </v-form>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import { debounce } from 'lodash-es';

const users = ref([]);
const headers = ref([
  { title: 'ID', value: 'id', align: 'start', sortable: true },
  { title: 'Nome', value: 'name', align: 'start', sortable: true },
  { title: 'Email', value: 'email', align: 'start', sortable: true },
  { title: 'Ações', value: 'action', align: 'end', sortable: false },
]);

const pagination = ref({
  page: 1,
  perPage: 5,
  total: 0,
});

const loading = ref(false);
const search = ref('');

const modalVisible = ref(false);
const modalTitle = ref('');
const editedUser = ref({
  id: null,
  name: '',
  email: '',
  cpf: '',
  password: '',
});

const fetchUsers = async ({ page, itemsPerPage, sortBy }: { page: number; itemsPerPage: number; sortBy?: any }) => {
  loading.value = true;
  try {
    const response = await axios.get(`http://localhost/api/v1/user?page=${page}&per_page=${itemsPerPage}`);
    users.value = response.data.data;
    pagination.value.total = response.data.total;
    pagination.value.page = page;
    pagination.value.perPage = itemsPerPage;
  } catch (error) {
    console.error('Erro ao buscar dados da API:', error);
  } finally {
    loading.value = false;
  }
};

const deleteUser = async (id: number) => {
  try {
    await axios.delete(`http://localhost/api/v1/user/${id}`);
    await fetchUsers({ page: pagination.value.page, itemsPerPage: pagination.value.perPage });
  } catch (error) {
    console.error('Erro ao deletar usuário:', error);
  }
};

const saveUser = async () => {
  try {
    if (editedUser.value.id) {
      await axios.put(`http://localhost/api/v1/user/${editedUser.value.id}`, editedUser.value);
    } else {
      await axios.post(`http://localhost/api/v1/user`, editedUser.value);
    }
    modalVisible.value = false;
    await fetchUsers({ page: pagination.value.page, itemsPerPage: pagination.value.perPage });
  } catch (error) {
    console.error('Erro ao salvar usuário:', error);
  }
};

const openModal = (user: any) => {
  if (user) {
    modalTitle.value = 'Editar Usuário';
    editedUser.value = { ...user };
  } else {
    modalTitle.value = 'Novo Usuário';
    editedUser.value = { id: null, name: '', email: '', cpf: '', password: '' };
  }
  modalVisible.value = true;
};

const applyFilter = debounce(() => {
  fetchUsers({ page: 1, itemsPerPage: pagination.value.perPage });
}, 300);

const filteredUsers = ref([]);

onMounted(() => {
  fetchUsers({ page: pagination.value.page, itemsPerPage: pagination.value.perPage });
});

watch([users, search], () => {
  filteredUsers.value = users.value.filter((user) =>
    user.name.toLowerCase().includes(search.value.toLowerCase())
  );
});
</script>

<style scoped>
.custom-table {
  border: 1px solid #ccc;
  border-radius: 5px;
  overflow: hidden;
}

.action-button {
  margin-left: 10px;
}
</style>