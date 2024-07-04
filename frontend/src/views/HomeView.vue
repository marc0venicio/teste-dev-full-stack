<template>
  <div>
    <h1>Inicio</h1>
    <v-data-table :headers="headers" :items="users" class="elevation-1">
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Users</v-toolbar-title>
        </v-toolbar>
      </template>
      <template v-slot:item.action="{ item }">
        <v-btn icon >
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon @click="deleteUser(item.id)">
          <v-icon>mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const users = ref([]);
const headers = ref([
  { text: 'ID', value: 'id' },
  { text: 'Nome', value: 'name' },
  { text: 'Email', value: 'email' },
  { text: 'Ações', value: 'action', sortable: false },
]);

const router = useRouter();


const fetchUsers = async () => {
  try {
    const response = await axios.get('http://localhost/api/v1/user');
    users.value = response.data.data;
  } catch (error) {
    console.error('Erro ao buscar dados da API:', error);
  }
};

// const editUser = (user: any) => {
//   router.push({ name: 'EditUser', params: { id: user.id } });
// };

const deleteUser = async (id: number) => {
  try {
    await axios.delete(`http://localhost/api/v1/user/${id}`);
    users.value = users.value.filter(user => user.id !== id);
  } catch (error) {
    console.error('Erro ao deletar usuário:', error);
  }
};

onMounted(fetchUsers);
</script>
