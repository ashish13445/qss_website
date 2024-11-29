<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import Modal from '../Components/Modal.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const isAddProjectModelOpen = ref(false);
const isUpdateProjectModelOpen = ref(false);
const isUpdateAreaModelOpen = ref(false);
const isAddAreaModelOpen = ref(false);

const title = ref('');
const area_name = ref('');
const description = ref('');
const projects = ref([]);
const selectedProject = ref(null);
const selectedArea = ref(null);

const openAddProjectModal = () => {
  isAddProjectModelOpen.value = true;
};

const closeAddProjectModal = () => {
  isAddProjectModelOpen.value = false;
  
};

const openAddAreaModal = (projects) => {
  isAddAreaModelOpen.value = true;
  
};

const closeAddAreaModal = () => {
  isAddAreaModelOpen.value = false;
  
};

const openUpdateProjectModal = (project) => {
  selectedProject.value = project;
  title.value = project.title;
  description.value = project.description;
  isUpdateProjectModelOpen.value = true;
};

const openUpdateAreaModal = (area) => {
  selectedArea.value = area;
  area_name.value = area.name;
  isUpdateAreaModelOpen.value = true;
};

const closeUpdateProjectModal = () => {
  isUpdateProjectModelOpen.value = false;
  title.value= '';
  description.value='';
};

const closeUpdateAreaModal = () => {
  isUpdateAreaModelOpen.value = false;
  area_name.value= '';
};

const addProject = () => {
  axios
    .post('/projects/add', {
      title: title.value,
      description: description.value,
    })
    .then((res) => {
      closeAddProjectModal();
      getProjects();
    });
};
const addArea = () => {
  axios
    .post('/area/add', {
      name: area_name.value,
      project_id: selectedProject.value
    })
    .then((res) => {
      closeAddAreaModal();
      getProjects();
    });
};

const updateProject = () => {
  if (!selectedProject.value) {
    return;
  }

  axios
    .post(`/projects/update/${selectedProject.value.id}`, {
      title: title.value,
      description: description.value,
    })
    .then((res) => {
      closeUpdateProjectModal();
      getProjects();
    });
};
const updateArea = () => {
  if (!selectedArea.value) {
    return;
  }

  axios
    .post(`/area/update/${selectedArea.value.id}`, {
      name: area_name.value,
    
    })
    .then((res) => {
      closeUpdateAreaModal();
      getProjects();
    });
};

const deleteProject = (id)=>{
    axios.post(`/projects/delete/${id}`)
    .then(()=>{
        alert('project with id: '+id + " deleted" );
        getProjects();
    })
}

const deleteArea = (id)=>{
    axios.post(`/area/delete/${id}`)
    .then(()=>{
        alert('area with id: '+id + " deleted" );
        getProjects();
    })
}

const getProjects = () => {
  axios.get('/projects/get').then((res) => {
    projects.value = res.data;
  });
};


onMounted(getProjects);

</script>

<template>
  <Head title="Projects" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
          <div class="flex ">
                <PrimaryButton  @click="openAddProjectModal()" class="mr-4">
                <i class="material-icons mx-1">add</i>
                <span>Add Project</span>
                </PrimaryButton>
              <PrimaryButton  @click="openAddAreaModal(projects)">
                <i class="material-icons mx-1">add</i>
                <span>Add Area</span>
              </PrimaryButton>
          </div>


          <!-- Add Project Modal -->
          <Modal :show="isAddProjectModelOpen" @close="closeAddProjectModal">
            <div class="modal-content p-5">
              <span class="close" @click="closeAddProjectModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

              <!-- Regularize form -->
              <form @submit.prevent="addProject">
            
            <div class="mt-4">
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="title"
                    required
                    autofocus
                />

                <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    v-model="description"
                    class="mt-1 block w-full"
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            

            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4"
                 
                 >
                    Add Project
                </PrimaryButton>
            </div>
        </form>
            </div>
          </Modal>

          <!-- Update Project Modal -->
          <Modal :show="isUpdateProjectModelOpen" @close="closeUpdateProjectModal">
            <div class="modal-content p-5">
              <span class="close" @click="closeUpdateProjectModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

             
                

              <!-- Regularize form -->
              <form @submit.prevent="updateProject">
            
            <div class="mt-4">
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="title"
                    required
                    autofocus
                />

                <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
            </div>

            <div class="mt-4">
                <InputLabel for="description" value="Description" />

                <TextInput
                    id="description"
                    type="text"
                    v-model="description"
                    class="mt-1 block w-full"
                />

                <!-- <InputError class="mt-2" :message="form.errors.email" /> -->
            </div>

            

            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4"
                 
                 >
                    Update
                </PrimaryButton>
            </div>
        </form>
            </div>
          </Modal>

          <!-- --------------add area modal -------------------- -->

          <Modal :show="isAddAreaModelOpen" @close="closeAddAreaModal">
            <div class="modal-content p-5">
              <span class="close" @click="closeAddAreaModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

              <!-- Regularize form -->
              <form @submit.prevent="addArea">

              <div class="mt-4">
                

                <select class="mt-1 block w-full" v-model="selectedProject">
                  <option value="">Select Project</option>
                  <option v-for="project in projects" :value=" project.id">{{ project.title }}</option>

                </select>
                

                <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
            </div>    
            
            <div class="mt-4">
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="area_name"
                    required
                    autofocus
                />

                <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
            </div>

        
            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4"
                 
                 >
                    Add Area
                </PrimaryButton>
            </div>
        </form>
            </div>
          </Modal>

          <!-- Update Area Modal -->

          <Modal :show="isUpdateAreaModelOpen" @close="closeUpdateAreaModal">
            <div class="modal-content p-5">
              <span class="close" @click="closeUpdateAreaModal"><i class="material-icons" style="cursor: pointer;">close</i></span>

             
                

              <!-- Regularize form -->
              <form @submit.prevent="updateArea">
            
            <div class="mt-4">
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="area_name"
                    required
                    autofocus
                />

                <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
            </div>
            

            <div class="flex items-center justify-end mt-4">


                <PrimaryButton class="ms-4"
                 
                 >
                    Update
                </PrimaryButton>
            </div>
        </form>
            </div>
          </Modal>
          <!-- ... (rest of your code) -->
          <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-bold font-light text-center">
          <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
            <tr class="bg-indigo-400 text-white">
              <th scope="col" class="px-6 py-4 border border-indigo-900">Id</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Title</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Areas</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="project in projects"
              class="border border-indigo-900 transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
              <td class="whitespace-nowrap px-6 py-4 font-extrabold border border-indigo-900">{{project.id}}</td>
              <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{project.title}}</td>
              <td class="whitespace-nowrap  border border-indigo-900">
                <table class="min-w-full text-left text-bold font-light text-center">
          <thead class="border border-indigo-900  font-medium dark:border-neutral-500">
            <tr class="bg-indigo-400 text-white">
              <th scope="col" class="px-6 py-4 border border-indigo-900">Name</th>
              <th scope="col" class="px-6 py-4 border border-indigo-900">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="area in project.areas" >
              <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">{{area.name}}</td>
              <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">
                <span><i class="pi pi-wrench mr-3" style="font-size:1.5rem; cursor: pointer;" v-tooltip="'edit area'" @click="openUpdateAreaModal(area)"></i></span>
                <span><i class="pi pi-trash" style="font-size:1.5rem;cursor: pointer;color: rgb(125, 1, 1);" v-tooltip="'delete area'" @click="deleteArea(area.id)"></i></span>
              </td>
            </tr>
          </tbody>

                </table>
              </td>

              <td class="whitespace-nowrap px-6 py-4 border border-indigo-900">
                <span><i class="pi pi-wrench mr-3" style="cursor: pointer;font-size: 1.5rem;" v-tooltip="'edit project'" @click="openUpdateProjectModal(project)"></i></span>
                <span><i class="pi pi-trash" style="font-size:1.5rem;cursor: pointer;color: rgb(125, 1, 1);" v-tooltip="'delete project'" @click="deleteProject(project.id)"></i></span>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
   
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
